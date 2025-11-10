<script setup>
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';

const showBanner = ref(false);

onMounted(() => {
    const consent = localStorage.getItem('cookieConsent');
    if (!consent) {
        showBanner.value = true;
    }
});

const acceptAll = () => {
    localStorage.setItem('cookieConsent', 'all');
    showBanner.value = false;
};

const acceptNecessary = () => {
    localStorage.setItem('cookieConsent', 'necessary');
    showBanner.value = false;
};
</script>

<template>
    <div
        v-if="showBanner"
        class="fixed bottom-0 left-0 right-0 z-40 bg-white dark:bg-gray-900 border-t-2 border-indigo-600 shadow-2xl"
    >
        <div class="max-w-7xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8 py-4 sm:py-6">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-3 sm:gap-4">
                <div class="flex-1">
                    <h3 class="text-base sm:text-lg font-bold text-gray-900 dark:text-white mb-1.5 sm:mb-2">
                        Cookies und Datenschutz
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                        Wir verwenden Cookies und ähnliche Technologien, um Ihnen die bestmögliche Nutzung unserer Website zu ermöglichen.
                        Einige Cookies sind notwendig für den Betrieb der Website, während andere uns helfen, die Website zu verbessern und Ihnen personalisierte Inhalte anzubieten.
                    </p>
                    <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 mt-1.5 sm:mt-2">
                        Weitere Informationen finden Sie in unserer
                        <Link href="/datenschutz" class="text-indigo-600 dark:text-indigo-400 hover:underline font-medium">
                            Datenschutzerklärung
                        </Link>.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 w-full md:w-auto">
                    <button
                        @click="acceptNecessary"
                        class="px-4 sm:px-6 py-2 sm:py-3 text-sm sm:text-base bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg font-medium hover:bg-gray-300 dark:hover:bg-gray-600 transition-all duration-200 whitespace-nowrap"
                    >
                        Nur notwendige
                    </button>
                    <button
                        @click="acceptAll"
                        class="px-4 sm:px-6 py-2 sm:py-3 text-sm sm:text-base bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition-all duration-200 whitespace-nowrap shadow-lg"
                    >
                        Alle akzeptieren
                    </button>
                </div>
            </div>

            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <details class="text-sm">
                    <summary class="cursor-pointer text-gray-700 dark:text-gray-300 font-medium hover:text-indigo-600 dark:hover:text-indigo-400">
                        Was sind Cookies und welche verwenden wir?
                    </summary>
                    <div class="mt-3 space-y-3 text-gray-600 dark:text-gray-400">
                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white">Notwendige Cookies:</p>
                            <p>Diese Cookies sind für den Betrieb der Website unerlässlich. Sie ermöglichen grundlegende Funktionen wie Seitennavigation und Zugriff auf sichere Bereiche der Website.</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white">Funktionale Cookies:</p>
                            <p>Diese Cookies ermöglichen es der Website, sich an Ihre Einstellungen zu erinnern (z.B. Sprache, Dark Mode) und erweiterte Funktionen bereitzustellen.</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white">Analyse-Cookies:</p>
                            <p>Diese Cookies helfen uns zu verstehen, wie Besucher mit der Website interagieren, indem sie Informationen anonym sammeln und melden.</p>
                        </div>
                    </div>
                </details>
            </div>
        </div>
    </div>
</template>

