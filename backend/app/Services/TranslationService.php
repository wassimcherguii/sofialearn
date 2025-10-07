<?php

namespace App\Services;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;

class TranslationService
{
    /**
     * Fallback order for locales when translated value is missing.
     * First element should be the app default (fr).
     *
     * @var array<int,string>
     */
    protected array $fallbackOrder = ['fr', 'en', 'ar'];

    /**
     * Return the active application locale (e.g. 'fr', 'en', 'ar').
     */
    public function getActiveLocale(): string
    {
        return (string) app()->getLocale();
    }

    /**
     * Build the translated column name for a base attribute.
     * Example: ('name', 'en') => 'name_en'.
     */
    public function getTranslatedColumn(string $baseAttribute, ?string $locale = null): string
    {
        $localeToUse = $locale ?: $this->getActiveLocale();
        return $baseAttribute . '_' . $localeToUse;
    }

    /**
     * Get a translated value from a model/array by base attribute with fallback logic.
     * Example: getValue($course, 'name') tries name_{active}, then fallbacks.
     *
     * @param Model|array|Arrayable $source
     */
    public function getValue(Model|array|Arrayable $source, string $baseAttribute): mixed
    {
        $data = $source instanceof Arrayable ? $source->toArray() : $source;
        $data = $data instanceof Model ? $data->getAttributes() : $data;

        $localesToTry = array_unique(array_merge([
            $this->getActiveLocale(),
        ], $this->fallbackOrder));

        foreach ($localesToTry as $locale) {
            $key = $baseAttribute . '_' . $locale;
            if (array_key_exists($key, $data) && $data[$key] !== null && $data[$key] !== '') {
                return $data[$key];
            }
        }

        return null;
    }

    /**
     * Generate select aliases for a query so results expose unified names.
     * Example: selectAliases(['name','description']) returns:
     *   [ 'name_fr as name', 'description_fr as description' ] (depending on active locale)
     * Call like: Model::select(array_merge(['id'], $ts->selectAliases(['name'])))->get();
     *
     * @param array<int,string> $baseAttributes
     * @return array<int,string>
     */
    public function selectAliases(array $baseAttributes, ?string $locale = null): array
    {
        $localeToUse = $locale ?: $this->getActiveLocale();

        return array_map(function (string $base) use ($localeToUse) {
            $column = $base . '_' . $localeToUse;
            return $column . ' as ' . $base;
        }, $baseAttributes);
    }

    /**
     * Map a collection of items to include unified translated keys.
     * It preserves original attributes and adds/overwrites unified base keys.
     *
     * @param iterable<Model|array|Arrayable> $items
     * @param array<int,string> $baseAttributes
     * @return array<int,array<string,mixed>>
     */
    public function mapWithTranslations(iterable $items, array $baseAttributes): array
    {
        $result = [];
        foreach ($items as $item) {
            $row = $item instanceof Arrayable ? $item->toArray() : ($item instanceof Model ? $item->getAttributes() : (array) $item);
            foreach ($baseAttributes as $base) {
                $row[$base] = $this->getValue($row, $base);
            }
            $result[] = $row;
        }
        return $result;
    }
}


