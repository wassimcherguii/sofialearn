import { Button, Container, Flex, Heading, Text, Card, Separator, IconButton, Tooltip, Grid, Section } from '@radix-ui/themes';
import { useState } from 'react';
import { GlobeIcon, StarIcon, ChatBubbleIcon, PersonIcon, RocketIcon, BookOpenIcon, QuestionMarkCircledIcon } from '@radix-ui/react-icons';

const LANGUAGES = [
  { code: 'fr', label: 'Français' },
  { code: 'ar', label: 'العربية' },
  { code: 'en', label: 'English' },
];

const FEATURES = [
  { icon: <BookOpenIcon width={32} height={32} />, title: 'Cours variés', desc: 'Apprenez plusieurs langues avec des cours interactifs.' },
  { icon: <RocketIcon width={32} height={32} />, title: 'Suivi de progression', desc: 'Visualisez votre avancement et atteignez vos objectifs.' },
  { icon: <ChatBubbleIcon width={32} height={32} />, title: 'Chat en temps réel', desc: 'Discutez avec vos enseignants et camarades instantanément.' },
  { icon: <StarIcon width={32} height={32} />, title: 'Examens & Quiz', desc: 'Testez vos connaissances avec des quiz et examens.' },
  { icon: <PersonIcon width={32} height={32} />, title: 'Gestion des rôles', desc: 'Admins, enseignants et étudiants, chacun son espace.' },
  { icon: <GlobeIcon width={32} height={32} />, title: 'Multilingue', desc: 'Plateforme disponible en plusieurs langues.' },
];

const HOW_IT_WORKS = [
  { step: 1, title: 'Inscription', desc: 'Créez un compte en tant qu’étudiant, enseignant ou administrateur.' },
  { step: 2, title: 'Choisissez un cours', desc: 'Explorez et inscrivez-vous aux cours qui vous intéressent.' },
  { step: 3, title: 'Apprenez & Interagissez', desc: 'Suivez les leçons, participez aux quiz et discutez en temps réel.' },
  { step: 4, title: 'Progressez', desc: 'Suivez votre avancement et obtenez des certifications.' },
];

const TESTIMONIALS = [
  { name: 'Marie Dupont', role: 'Étudiante', quote: 'Une expérience d’apprentissage exceptionnelle, élégante et efficace.' },
  { name: 'Jean Martin', role: 'Enseignant', quote: 'La gestion des cours et l’interaction avec les étudiants sont un vrai plaisir.' },
  { name: 'Sophie Bernard', role: 'Administratrice', quote: 'La plateforme facilite la gestion et le suivi de tous les utilisateurs.' },
];

const FAQS = [
  { q: 'Comment m’inscrire ?', a: 'Cliquez sur “S’inscrire” et suivez les instructions pour créer votre compte.' },
  { q: 'Puis-je changer la langue de la plateforme ?', a: 'Oui, utilisez le sélecteur de langue en haut de la page.' },
  { q: 'Comment suivre ma progression ?', a: 'Votre tableau de bord affiche votre avancement pour chaque cours.' },
  { q: 'Comment contacter un enseignant ?', a: 'Utilisez le chat en temps réel intégré à chaque cours.' },
];

export default function App() {
  const [lang, setLang] = useState('fr');

  return (
    <div className="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-[#f8f6f4] to-[#f3e9e6]">
      {/* Hero Section */}
      <Container size="3" className="w-full">
        <Card className="w-full max-w-3xl mt-12 mb-8 shadow-2xl border border-crimson-300 mx-auto">
          <Flex direction="column" align="center" gap="4" className="p-10">
            <Flex justify="between" align="center" className="w-full mb-2">
              <Heading size="6" className="text-crimson-800 font-serif tracking-wide">Sofia Learning</Heading>
              <Flex gap="2" align="center">
                <Tooltip content="Changer la langue">
                  <IconButton variant="soft" color="crimson" size="2" radius="full">
                    <GlobeIcon />
                  </IconButton>
                </Tooltip>
                <select
                  value={lang}
                  onChange={e => setLang(e.target.value)}
                  className="ml-2 rounded-lg border border-crimson-200 px-2 py-1 text-crimson-900 bg-white focus:outline-crimson-400 text-sm shadow-sm"
                >
                  {LANGUAGES.map(l => (
                    <option key={l.code} value={l.code}>{l.label}</option>
                  ))}
                </select>
              </Flex>
            </Flex>
            <Separator size="4" className="mb-4" />
            <Heading size="8" className="text-crimson-900 font-bold mb-2 text-center font-serif">
              Plateforme d'apprentissage des langues haut de gamme
            </Heading>
            <Text size="5" className="text-gray-700 text-center mb-4 font-light">
              Découvrez une nouvelle façon élégante d'apprendre les langues. Cours interactifs, suivi de progression, chat en temps réel, examens et devoirs, le tout dans une expérience raffinée et multilingue.
            </Text>
            <Flex gap="4" className="mb-4">
              <Button size="4" variant="solid" color="crimson" highContrast>S'inscrire</Button>
              <Button size="4" variant="outline" color="crimson">Se connecter</Button>
            </Flex>
            <Text size="2" className="text-gray-500 mt-2">Langue principale : <span className="font-semibold">Français</span> (Arabe, Anglais disponibles)</Text>
          </Flex>
        </Card>
      </Container>

      {/* Features Section */}
      <Section size="2" className="w-full max-w-5xl mx-auto">
        <Heading size="6" className="text-crimson-800 mb-6 text-center font-serif">Fonctionnalités principales</Heading>
        <Grid columns={{ initial: '1', md: '3' }} gap="5">
          {FEATURES.map((f, i) => (
            <Card key={i} className="flex flex-col items-center p-6 shadow-md border border-sand-300">
              <div className="mb-2 text-crimson-700">{f.icon}</div>
              <Heading size="4" className="mb-1 text-center">{f.title}</Heading>
              <Text size="3" className="text-center text-gray-600">{f.desc}</Text>
            </Card>
          ))}
        </Grid>
      </Section>

      {/* How It Works Section */}
      <Section size="2" className="w-full max-w-4xl mx-auto">
        <Heading size="6" className="text-crimson-800 mb-6 text-center font-serif">Comment ça marche ?</Heading>
        <Flex direction="row" wrap="wrap" gap="5" justify="center">
          {HOW_IT_WORKS.map((step, i) => (
            <Card key={i} className="flex flex-col items-center p-6 w-64 shadow border border-sand-200">
              <Heading size="6" className="text-crimson-700 mb-2">Étape {step.step}</Heading>
              <Heading size="4" className="mb-1 text-center">{step.title}</Heading>
              <Text size="3" className="text-center text-gray-600">{step.desc}</Text>
            </Card>
          ))}
        </Flex>
      </Section>

      {/* Course Previews Section */}
      <Section size="2" className="w-full max-w-4xl mx-auto">
        <Heading size="6" className="text-crimson-800 mb-6 text-center font-serif">Exemples de cours</Heading>
        <Flex gap="5" justify="center" wrap="wrap">
          <Card className="p-6 w-72 border border-sand-200">
            <Heading size="4" className="mb-2">Français pour débutants</Heading>
            <Text size="3" className="mb-2">Commencez à parler français dès aujourd’hui !</Text>
            <Button size="2" color="crimson" variant="soft">Voir le cours</Button>
          </Card>
          <Card className="p-6 w-72 border border-sand-200">
            <Heading size="4" className="mb-2">Anglais professionnel</Heading>
            <Text size="3" className="mb-2">Développez vos compétences pour le monde du travail.</Text>
            <Button size="2" color="crimson" variant="soft">Voir le cours</Button>
          </Card>
          <Card className="p-6 w-72 border border-sand-200">
            <Heading size="4" className="mb-2">Arabe conversationnel</Heading>
            <Text size="3" className="mb-2">Maîtrisez l’arabe pour voyager et échanger.</Text>
            <Button size="2" color="crimson" variant="soft">Voir le cours</Button>
          </Card>
        </Flex>
      </Section>

      {/* Testimonials Section */}
      <Section size="2" className="w-full max-w-4xl mx-auto">
        <Heading size="6" className="text-crimson-800 mb-6 text-center font-serif">Témoignages</Heading>
        <Flex gap="5" justify="center" wrap="wrap">
          {TESTIMONIALS.map((t, i) => (
            <Card key={i} className="p-6 w-72 border border-sand-200 flex flex-col items-center">
              <Text size="4" className="italic mb-2 text-center">“{t.quote}”</Text>
              <Text size="3" className="font-semibold text-crimson-700">{t.name}</Text>
              <Text size="2" className="text-gray-500">{t.role}</Text>
            </Card>
          ))}
        </Flex>
      </Section>

      {/* About Section */}
      <Section size="2" className="w-full max-w-3xl mx-auto">
        <Heading size="6" className="text-crimson-800 mb-4 text-center font-serif">À propos de Sofia Learning</Heading>
        <Text size="4" className="text-center text-gray-700 font-light">
          Sofia Learning est une plateforme d’apprentissage des langues conçue pour offrir une expérience haut de gamme, accessible et adaptée à tous les profils. Notre mission est de rendre l’apprentissage des langues simple, interactif et efficace, dans un environnement élégant et multilingue.
        </Text>
      </Section>

      {/* FAQ Section */}
      <Section size="2" className="w-full max-w-3xl mx-auto">
        <Heading size="6" className="text-crimson-800 mb-4 text-center font-serif">FAQ</Heading>
        <Flex direction="column" gap="4">
          {FAQS.map((faq, i) => (
            <Card key={i} className="p-4 border border-sand-200">
              <Flex align="center" gap="3">
                <QuestionMarkCircledIcon width={24} height={24} className="text-crimson-700" />
                <Heading size="4">{faq.q}</Heading>
              </Flex>
              <Text size="3" className="ml-8 text-gray-600 mt-1">{faq.a}</Text>
            </Card>
          ))}
        </Flex>
      </Section>

      {/* Footer */}
      <footer className="text-gray-500 text-sm mt-8 mb-4 font-light text-center w-full">© {new Date().getFullYear()} Sofia Learning</footer>
    </div>
  );
}
