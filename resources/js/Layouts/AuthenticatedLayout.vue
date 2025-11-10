<script setup>
import { ref, computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
const showUserMenu = ref(false);
const darkMode = ref(false);

const page = usePage();
const user = computed(() => page.props.auth?.user);

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
</script>

<template>
    <div :class="darkMode ? 'dark' : ''" class="min-h-screen transition-colors duration-300">
        <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 transition-colors duration-300">
            <nav class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md shadow-sm border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
                
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-20 justify-center items-center relative">
                        <Link href="/">
                            <img src="/tix4me.svg" alt="Tix4me Logo" class="h-12 w-auto">
                        </Link>

                        <div class="absolute right-0 flex items-center space-x-6">
                            
                            <button
                                @click="toggleDarkMode"
                                class="flex flex-col items-center justify-center w-12 h-16 focus:outline-none group hover:scale-110 transition-transform duration-200"
                                title="Dark/Light Mode"
                            >
                                <div class="w-0.5 h-4 bg-gray-400 dark:bg-gray-500 transition-all duration-300 group-hover:h-6"></div>
                                <div class="relative mt-1">
                                    <svg
                                        class="w-8 h-8 transition-all duration-300 drop-shadow-lg"
                                        :class="darkMode ? 'text-gray-500' : 'text-yellow-400'"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path d="M10 2a6 6 0 00-6 6c0 2.5 1.5 4.5 3 5.5V15a1 1 0 001 1h4a1 1 0 001-1v-1.5c1.5-1 3-3 3-5.5a6 6 0 00-6-6z"/>
                                        <path d="M8 16h4v1a1 1 0 01-1 1h-2a1 1 0 01-1-1v-1z"/>
                                    </svg>
                                    <div v-if="!darkMode" class="absolute inset-0 animate-pulse">
                                        <svg class="w-8 h-8 text-yellow-300 opacity-60" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 2a6 6 0 00-6 6c0 2.5 1.5 4.5 3 5.5V15a1 1 0 001 1h4a1 1 0 001-1v-1.5c1.5-1 3-3 3-5.5a6 6 0 00-6-6z"/>
                                        </svg>
                                    </div>
                                </div>
                            </button>

                                                        <div class="relative">
                                <button
                                    @click="showUserMenu = !showUserMenu"
                                    class="flex items-center space-x-3 px-4 py-2.5 rounded-xl bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-200 border border-gray-200 dark:border-gray-700"
                                >
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-red-500 via-blue-500 to-green-500 flex items-center justify-center text-white font-semibold text-sm">
                                        {{ user.first_name?.charAt(0) }}{{ user.last_name?.charAt(0) }}
                                    </div>
                                    <span class="text-gray-900 dark:text-gray-100 font-medium">
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
                        </div>


                    </div>
                </div>
            </nav>

                        <main class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <slot />
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
                    <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                        © {{ new Date().getFullYear() }} Tix4me Ticketing. Alle Rechte vorbehalten.
                    </div>
                </div>
            </footer>
        </div>
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
