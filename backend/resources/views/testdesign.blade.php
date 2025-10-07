<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Design - SofiaLearn</title>
    <meta name="description" content="Test design page showcasing Flowbite elements with literary theme">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom styles for literary theme -->
    <style>
        .paper-texture {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><defs><pattern id="paper" patternUnits="userSpaceOnUse" width="100" height="100"><rect width="100" height="100" fill="%23fefcf8"/><path d="M0 20h100M0 40h100M0 60h100M0 80h100" stroke="%23f0f0f0" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23paper)"/></svg>');
        }
        
        .feather-icon {
            background: linear-gradient(135deg, #006F5F, #004d42);
        }
        
        .torn-paper {
            position: relative;
        }
        
        .torn-paper::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            right: 0;
            height: 8px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 8"><path d="M0,4 Q25,0 50,4 T100,4 L100,8 L0,8 Z" fill="%23fefcf8"/></svg>') repeat-x;
        }
    </style>
</head>
<body class="h-full paper-texture">
    <div class="min-h-full">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Logo with feather icon -->
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col items-center">
                                <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mb-1">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                    </svg>
                                </div>
                                <div class="w-12 h-1 bg-emerald-600 rounded-full"></div>
                            </div>
                            <div>
                                <h1 class="text-xl font-bold text-gray-800">LA PLUME</h1>
                                <p class="text-sm text-gray-500">SofiaLearn</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-emerald-600 font-medium transition-colors">Retour à l'accueil</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Hero Section -->
            <div class="text-center mb-16">
                <div class="inline-block p-12 bg-white rounded-3xl shadow-lg shadow-gray-100/50 border border-gray-100">
                    <div class="flex flex-col items-center mb-8">
                        <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                        </div>
                        <div class="w-20 h-1 bg-emerald-600 rounded-full"></div>
                    </div>
                    <h1 class="text-5xl font-bold text-gray-800 mb-6 font-sans tracking-wide">
                        Test Design
                    </h1>
                    <p class="text-xl text-gray-600 mb-8 font-light leading-relaxed">
                        Découvrez nos mini leçons de français
                    </p>
                    <div class="inline-flex items-center px-8 py-4 bg-red-500 text-white font-semibold rounded-2xl shadow-lg hover:bg-red-600 transition-all duration-300 hover:shadow-xl">
                        <span>Pour un impact sans faute!</span>
                        <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Cards Section -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <!-- Card 1: Typography -->
                <div class="bg-white rounded-2xl shadow-lg shadow-gray-100/50 border border-gray-100 p-8 hover:shadow-xl transition-all duration-300 group">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center mr-4 group-hover:bg-emerald-100 transition-colors">
                            <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800">Typographie</h3>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed text-base">
                        Apprenez les règles de la typographie française avec nos mini leçons interactives.
                    </p>
                    <div class="flex items-center text-emerald-600 font-medium group-hover:text-emerald-700 transition-colors">
                        <span>Commencer</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>

                <!-- Card 2: Grammar -->
                <div class="bg-white rounded-2xl shadow-lg shadow-gray-100/50 border border-gray-100 p-8 hover:shadow-xl transition-all duration-300 group">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-red-50 rounded-2xl flex items-center justify-center mr-4 group-hover:bg-red-100 transition-colors">
                            <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800">Grammaire</h3>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed text-base">
                        Maîtrisez les subtilités de la grammaire française étape par étape.
                    </p>
                    <div class="flex items-center text-emerald-600 font-medium group-hover:text-emerald-700 transition-colors">
                        <span>Commencer</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>

                <!-- Card 3: Writing -->
                <div class="bg-white rounded-2xl shadow-lg shadow-gray-100/50 border border-gray-100 p-8 hover:shadow-xl transition-all duration-300 group">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-amber-50 rounded-2xl flex items-center justify-center mr-4 group-hover:bg-amber-100 transition-colors">
                            <svg class="w-7 h-7 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800">Rédaction</h3>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed text-base">
                        Développez vos compétences en rédaction avec nos exercices pratiques.
                    </p>
                    <div class="flex items-center text-emerald-600 font-medium group-hover:text-emerald-700 transition-colors">
                        <span>Commencer</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Progress Section -->
            <div class="bg-white rounded-3xl shadow-lg shadow-gray-100/50 border border-gray-100 p-12 mb-16">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Progressez en français</h2>
                    <p class="text-xl text-gray-600 leading-relaxed">Suivez votre évolution avec nos outils de suivi personnalisés</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center group">
                        <div class="w-20 h-20 mx-auto mb-6 bg-emerald-50 rounded-full flex items-center justify-center group-hover:bg-emerald-100 transition-colors">
                            <span class="text-3xl font-bold text-emerald-600">85%</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Typographie</h3>
                        <div class="w-full bg-gray-100 rounded-full h-3">
                            <div class="bg-emerald-500 h-3 rounded-full transition-all duration-1000" style="width: 85%"></div>
                        </div>
                    </div>
                    
                    <div class="text-center group">
                        <div class="w-20 h-20 mx-auto mb-6 bg-red-50 rounded-full flex items-center justify-center group-hover:bg-red-100 transition-colors">
                            <span class="text-3xl font-bold text-red-600">72%</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Grammaire</h3>
                        <div class="w-full bg-gray-100 rounded-full h-3">
                            <div class="bg-red-500 h-3 rounded-full transition-all duration-1000" style="width: 72%"></div>
                        </div>
                    </div>
                    
                    <div class="text-center group">
                        <div class="w-20 h-20 mx-auto mb-6 bg-amber-50 rounded-full flex items-center justify-center group-hover:bg-amber-100 transition-colors">
                            <span class="text-3xl font-bold text-amber-600">68%</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Rédaction</h3>
                        <div class="w-full bg-gray-100 rounded-full h-3">
                            <div class="bg-amber-500 h-3 rounded-full transition-all duration-1000" style="width: 68%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center">
                <div class="inline-block p-12 bg-white rounded-3xl shadow-lg shadow-gray-100/50 border border-gray-100">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Prêt à commencer?</h2>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">Rejoignez des milliers d'étudiants qui améliorent leur français avec SofiaLearn</p>
                    <div class="flex flex-col sm:flex-row gap-6 justify-center">
                        <button class="px-10 py-4 bg-red-500 text-white font-semibold rounded-2xl shadow-lg hover:bg-red-600 hover:shadow-xl transition-all duration-300">
                            Commencer maintenant
                        </button>
                        <button class="px-10 py-4 border-2 border-emerald-600 text-emerald-600 font-semibold rounded-2xl hover:bg-emerald-50 hover:border-emerald-700 transition-all duration-300">
                            En savoir plus
                        </button>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-100 py-12 mt-16">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="flex items-center justify-center mb-6">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center mb-2">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                        </div>
                        <div class="w-16 h-1 bg-emerald-600 rounded-full mb-4"></div>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">LA PLUME - SofiaLearn</h3>
                <p class="text-lg text-gray-600 mb-6">Pour un impact sans faute!</p>
                <div class="flex justify-center space-x-8 text-sm text-gray-500">
                    <a href="#" class="hover:text-emerald-600 transition-colors">À propos</a>
                    <a href="#" class="hover:text-emerald-600 transition-colors">Contact</a>
                    <a href="#" class="hover:text-emerald-600 transition-colors">Mentions légales</a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
