<script setup>
import { ref, computed } from 'vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import HelpButton from '@/Components/HelpButton.vue';
import CookieBanner from '@/Components/CookieBanner.vue';
import NewsletterPopup from '@/Components/NewsletterPopup.vue';

const page = usePage();
const user = computed(() => page.props.auth?.user);
const isVerified = computed(() => user.value?.email_verified_at !== null);
const showUserMenu = ref(false);

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

const events = ref([]);

const helpSteps = [
    {
        title: 'Willkommen bei Tix4me',
        description: 'Tix4me ist Ihre Plattform für Ticketverwaltung. Hier können Sie Events erstellen, Tickets kaufen und verwalten. Diese Hilfe führt Sie durch die wichtigsten Funktionen.',
        tips: 'Klicken Sie auf "Weiter", um mehr zu erfahren.'
    },
    {
        title: 'Registrierung und Anmeldung',
        description: 'Um Tix4me zu nutzen, müssen Sie sich zuerst registrieren. Klicken Sie oben rechts auf "Registrieren" und füllen Sie das Formular aus. Wenn Sie bereits ein Konto haben, klicken Sie auf "Anmelden".',
        tips: 'Die Registrierung ist kostenlos und dauert nur wenige Minuten.'
    },
    {
        title: 'Navigation',
        description: 'Oben auf der Seite finden Sie das Tix4me Logo. Klicken Sie darauf, um jederzeit zur Startseite zurückzukehren. Rechts oben finden Sie die Buttons für Anmeldung und Registrierung.',
        tips: 'Nach der Anmeldung sehen Sie hier Ihr Benutzerprofil mit weiteren Optionen.'
    },
    {
        title: 'Events ansehen',
        description: 'Auf der Startseite werden alle verfügbaren Events angezeigt. Scrollen Sie nach unten, um die Events zu sehen. Jedes Event zeigt wichtige Informationen wie Datum, Ort und Preis.',
        tips: 'Klicken Sie auf ein Event, um mehr Details zu sehen und Tickets zu kaufen.'
    },
    {
        title: 'Rechtliche Informationen',
        description: 'Ganz unten auf der Seite finden Sie Links zu Impressum, Datenschutz und AGBs. Hier finden Sie alle wichtigen rechtlichen Informationen über Tix4me.',
        tips: 'Es ist wichtig, diese Informationen zu lesen, bevor Sie die Plattform nutzen.'
    },
    {
        title: 'Hilfe erhalten',
        description: 'Wenn Sie Hilfe benötigen, klicken Sie auf den blauen Hilfe-Button unten rechts. Dieser Button ist auf allen Seiten verfügbar und zeigt Ihnen Schritt-für-Schritt-Anleitungen.',
        tips: 'Bei weiteren Fragen können Sie uns jederzeit kontaktieren.'
    }
];
</script>

<template>
    <Head title="Tix4me Ticketing" />

    <div :class="darkMode ? 'dark' : ''" class="min-h-screen transition-colors duration-300">
        <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 transition-colors duration-300">
            <nav class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md shadow-sm border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-center items-center h-20 relative">
                        <Link href="/" class="flex items-center">
                            <img src="/tix4me.svg" alt="Tix4me Logo" class="h-10 sm:h-12 w-auto">
                        </Link>

                        <div class="absolute right-0 flex items-center space-x-2 sm:space-x-6">
                            <div v-if="user" class="relative">
                                <button
                                    @click="showUserMenu = !showUserMenu"
                                    class="flex items-center space-x-2 sm:space-x-3 px-2 sm:px-4 py-2 sm:py-2.5 rounded-xl bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-200 border border-gray-200 dark:border-gray-700"
                                >
                                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-gradient-to-br from-red-500 via-blue-500 to-green-500 flex items-center justify-center text-white font-semibold text-xs sm:text-sm">
                                        {{ user.first_name.charAt(0) }}{{ user.last_name.charAt(0) }}
                                    </div>
                                    <span class="hidden sm:inline text-gray-900 dark:text-gray-100 font-medium">
                                        {{ user.first_name }} {{ user.last_name }}
                                    </span>
                                    <svg class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <div
                                    v-show="showUserMenu"
                                    @click="showUserMenu = false"
                                    class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-xl shadow-2xl py-2 z-50 border border-gray-200 dark:border-gray-700"
                                >
                                    <Link
                                        :href="route('profile.edit')"
                                        class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150"
                                    >
                                        <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        Kontoeinstellungen
                                    </Link>
                                    <Link
                                        href="/api-keys"
                                        class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150"
                                    >
                                        <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                                        </svg>
                                        API Keys
                                    </Link>
                                    <hr class="my-2 border-gray-200 dark:border-gray-700">
                                    <Link
                                        :href="route('logout')"
                                        method="post"
                                        as="button"
                                        class="flex items-center w-full text-left px-4 py-3 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors duration-150"
                                    >
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        Abmelden
                                    </Link>
                                </div>
                            </div>

                            <div v-else class="flex items-center space-x-2 sm:space-x-3">
                                <Link
                                    :href="route('login')"
                                    class="px-3 sm:px-5 py-2 sm:py-2.5 text-sm sm:text-base text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-xl transition-all duration-200 font-medium border border-gray-300 dark:border-gray-700"
                                >
                                    Anmelden
                                </Link>
                                <Link
                                    :href="route('register')"
                                    class="px-3 sm:px-5 py-2 sm:py-2.5 text-sm sm:text-base text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-xl transition-all duration-200 font-medium border border-gray-300 dark:border-gray-700"
                                >
                                    Registrieren
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>


                <div v-if="user && !isVerified" class="bg-gradient-to-r from-yellow-50 to-orange-50 dark:from-yellow-900/20 dark:to-orange-900/20 border-b border-yellow-300 dark:border-yellow-700">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2 sm:space-x-3">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-yellow-600 dark:text-yellow-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                <p class="text-xs sm:text-sm font-medium text-yellow-900 dark:text-yellow-100">
                                    Bitte verifizieren Sie Ihre E-Mail-Adresse, um alle Funktionen nutzen zu können.
                                </p>
                            </div>
                            <Link
                                :href="route('verification.notice')"
                                class="text-xs sm:text-sm font-semibold text-yellow-900 dark:text-yellow-100 underline hover:text-yellow-700 dark:hover:text-yellow-200 transition-colors duration-150 whitespace-nowrap"
                            >
                                E-Mail erneut senden
                            </Link>
                        </div>
                    </div>
                </div>
            </nav>

            <div v-if="user && isVerified" class="bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm border-b border-gray-200 dark:border-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
                    <button class="w-full sm:w-auto px-6 sm:px-8 py-3 sm:py-3.5 bg-gradient-to-r from-green-500 via-emerald-500 to-teal-500 text-white rounded-xl hover:shadow-xl hover:scale-105 transition-all duration-200 font-semibold flex items-center justify-center space-x-2 text-sm sm:text-base">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Event erstellen</span>
                    </button>
                </div>
            </div>

            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-16">
                <div v-if="events.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                </div>
            </main>

            <footer class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-t border-gray-200 dark:border-gray-700 mt-auto">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10">
                    <div class="flex flex-wrap justify-center gap-4 sm:gap-0 sm:space-x-10 mb-6">
                        <Link href="/impressum" class="text-sm sm:text-base text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-200 font-medium">
                            Impressum
                        </Link>
                        <Link href="/datenschutz" class="text-sm sm:text-base text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-200 font-medium">
                            Datenschutz
                        </Link>
                        <Link href="/agbs" class="text-sm sm:text-base text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-200 font-medium">
                            AGBs
                        </Link>
                    </div>
                    <div class="flex justify-center mb-6">
                        <a href="https://www.grenchen.ch" target="_blank" rel="noopener noreferrer" class="transition-transform duration-200 hover:scale-105">
                            <img src="/vongrenchenfuergrenchen.svg?v=2" alt="Von Grenchen für Grenchen" class="h-14 sm:h-16 md:h-20 w-auto">
                        </a>
                    </div>
                    <div class="text-center text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                        © {{ new Date().getFullYear() }} Tix4me. Alle Rechte vorbehalten.
                    </div>
                </div>
            </footer>
        </div>

        <HelpButton :steps="helpSteps" title="Tix4me Hilfe" />
        <CookieBanner />
        <NewsletterPopup />
    </div>
</template>

<style scoped>
@keyframes pulse {
    0%, 100% {
        opacity: 0.5;
    }
    50% {
        opacity: 0.8;
    }
}

.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
</style>
