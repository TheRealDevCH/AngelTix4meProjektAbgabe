<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import HelpButton from '@/Components/HelpButton.vue';
import CookieBanner from '@/Components/CookieBanner.vue';

const darkMode = ref(false);

const toggleDarkMode = () => {
    darkMode.value = !darkMode.value;
    if (darkMode.value) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('darkMode', 'true');
    } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('darkMode', 'false');
    }
};

if (localStorage.getItem('darkMode') === 'true') {
    darkMode.value = true;
    document.documentElement.classList.add('dark');
}

const helpSteps = [
    {
        title: 'Impressum',
        description: 'Das Impressum enthält alle rechtlich erforderlichen Informationen über den Betreiber dieser Website. Hier finden Sie Kontaktdaten und rechtliche Angaben.',
        tips: 'Diese Informationen sind wichtig, wenn Sie Fragen haben oder uns kontaktieren möchten.'
    },
    {
        title: 'Kontaktinformationen',
        description: 'Im Impressum finden Sie unsere vollständige Adresse, Telefonnummer und E-Mail-Adresse. Sie können uns jederzeit über diese Kanäle erreichen.',
        tips: 'Für schnelle Anfragen nutzen Sie am besten die E-Mail-Adresse.'
    },
    {
        title: 'Zurück zur Startseite',
        description: 'Um zur Startseite zurückzukehren, klicken Sie einfach auf das Tix4me Logo oben in der Mitte der Seite.',
        tips: 'Das Logo ist auf allen Seiten klickbar und führt immer zur Startseite.'
    }
];
</script>

<template>
    <div :class="darkMode ? 'dark' : ''" class="min-h-screen transition-colors duration-300">
        <Head title="Impressum" />

        <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 transition-colors duration-300">
            <nav class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md shadow-sm border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-center items-center h-20">
                        <Link href="/">
                            <img src="/tix4me.svg" alt="Tix4me Logo" class="h-12 w-auto">
                        </Link>
                    </div>
                </div>
            </nav>

            <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md rounded-2xl shadow-xl p-8 sm:p-12 border border-gray-200 dark:border-gray-700">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8">Impressum</h1>

                    <div class="mb-10">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Tix4me GmbH</h2>
                        <div class="text-gray-700 dark:text-gray-300 space-y-1">
                            <p>Rainstr. 19</p>
                            <p>2540 Grenchen</p>
                        </div>
                    </div>

                    <div class="mb-10">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Kontakt</h2>
                        <div class="text-gray-700 dark:text-gray-300 space-y-2">
                            <p>
                                <span class="font-medium">Tel:</span> 
                                <a href="tel:+41326522038" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                    +41 32 652 20 38
                                </a>
                            </p>
                            <p>
                                <span class="font-medium">E-Mail:</span> 
                                <a href="mailto:info@tix4me.ch" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                    info@tix4me.ch
                                </a>
                            </p>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Registereintrag</h2>
                        <div class="text-gray-700 dark:text-gray-300 space-y-2">
                            <p>Eintragung im Handelsregister.</p>
                            <p><span class="font-medium">Firma:</span> Tix4me GmbH</p>
                            <p><span class="font-medium">Registernummer:</span> CHE-330.064.762</p>
                            <p><span class="font-medium">Mehrwertsteuer:</span> CHE-330.064.762 MWST</p>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-t border-gray-200 dark:border-gray-700 mt-auto">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                    <div class="flex justify-center space-x-10 mb-6">
                        <Link href="/impressum" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-200 font-medium">
                            Impressum
                        </Link>
                        <Link href="/datenschutz" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-200 font-medium">
                            Datenschutz
                        </Link>
                        <Link href="/agbs" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-200 font-medium">
                            AGBs
                        </Link>
                    </div>
                    <div class="flex justify-center mb-6">
                        <a href="https://www.grenchen.ch" target="_blank" rel="noopener noreferrer" class="transition-transform duration-200 hover:scale-105">
                            <img src="/vongrenchenfuergrenchen.svg?v=2" alt="Von Grenchen für Grenchen" style="height: 4.5rem;" class="w-auto">
                        </a>
                    </div>
                    <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                        © {{ new Date().getFullYear() }} Tix4me. Alle Rechte vorbehalten.
                    </div>
                </div>
            </footer>
        </div>

        <HelpButton :steps="helpSteps" title="Impressum-Hilfe" />
        <CookieBanner />
    </div>
</template>

