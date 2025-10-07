<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supportedLocales = ['fr', 'en', 'ar'];

        $locale = session('locale');

        if (! $locale || ! in_array($locale, $supportedLocales, true)) {
            $locale = 'fr';
            session(['locale' => $locale]);
        }

        app()->setLocale($locale);

        // Dynamically load nested translation files under lang/{locale}/pages/**/*
        $this->loadNestedPageTranslations($locale);

        return $next($request);
    }

    /**
     * Load nested translation PHP files into the translator so that
     * dot keys like 'pages.admin.login.title' resolve using the
     * folder structure lang/{locale}/pages/admin/login.php.
     */
    protected function loadNestedPageTranslations(string $locale): void
    {
        $baseDir = base_path('lang/'.$locale.'/pages');
        if (!is_dir($baseDir)) {
            return;
        }

        $files = File::allFiles($baseDir);
        if (empty($files)) {
            return;
        }

        $lines = [];

        foreach ($files as $file) {
            if ($file->getExtension() !== 'php') {
                continue;
            }

            /** @var array<string,mixed> $data */
            $data = include $file->getPathname();
            if (!is_array($data)) {
                continue;
            }

            // Build key prefix from relative path after 'pages' directory
            $relative = trim(str_replace($baseDir, '', $file->getPathname()), DIRECTORY_SEPARATOR);
            $withoutExt = preg_replace('/\\.php$/', '', $relative);
            $segments = array_values(array_filter(explode(DIRECTORY_SEPARATOR, $withoutExt)));
            $prefix = 'pages'.(count($segments) ? '.' . implode('.', $segments) : '');

            $this->flattenInto($lines, $prefix, $data);
        }

        if (!empty($lines)) {
            app('translator')->addLines($lines, $locale);
        }
    }

    /**
     * Recursively flatten an array of translations into dot notation
     * under the provided prefix.
     *
     * @param array<string,string> $collector
     * @param array<string,mixed> $data
     */
    protected function flattenInto(array &$collector, string $prefix, array $data): void
    {
        foreach ($data as $key => $value) {
            $fullKey = $prefix . '.' . $key;
            if (is_array($value)) {
                $this->flattenInto($collector, $fullKey, $value);
            } else {
                $collector[$fullKey] = $value;
            }
        }
    }
}


