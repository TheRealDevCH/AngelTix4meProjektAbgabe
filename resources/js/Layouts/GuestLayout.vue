<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
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
</script>

<template>
    <div :class="darkMode ? 'dark' : ''" class="min-h-screen transition-colors duration-300">
        <div class="flex min-h-screen flex-col items-center bg-gradient-to-br from-gray-50 to-gray-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 pt-6 sm:justify-center sm:pt-0 transition-colors duration-300">
                        <div class="absolute top-6 right-6">
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
                                                <div
                            v-if="!darkMode"
                            class="absolute inset-0 animate-pulse"
                        >
                            <svg class="w-8 h-8 text-yellow-300 opacity-60" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2a6 6 0 00-6 6c0 2.5 1.5 4.5 3 5.5V15a1 1 0 001 1h4a1 1 0 001-1v-1.5c1.5-1 3-3 3-5.5a6 6 0 00-6-6z"/>
                            </svg>
                        </div>
                    </div>
                </button>
            </div>

            <div class="mb-8">
                <Link href="/">
                    <img src="/tix4me.svg" alt="Tix4me Logo" class="h-16 w-auto">
                </Link>
            </div>

                        <div class="w-full overflow-hidden bg-white/80 dark:bg-gray-900/80 backdrop-blur-md px-8 py-8 shadow-xl sm:max-w-md sm:rounded-2xl border border-gray-200 dark:border-gray-700 transition-colors duration-300">
                <slot />
            </div>

                        <div class="mt-8 text-center">
                <div class="flex flex-wrap justify-center gap-3 sm:gap-0 sm:space-x-6 text-xs sm:text-sm mb-6">
                    <Link href="/impressum" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                        Impressum
                    </Link>
                    <Link href="/datenschutz" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                        Datenschutz
                    </Link>
                    <Link href="/agbs" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                        AGBs
                    </Link>
                </div>
                <div class="flex justify-center">
                    <a href="https://www.grenchen.ch" target="_blank" rel="noopener noreferrer" class="transition-transform duration-200 hover:scale-105">
                        <img src="/vongrenchenfuergrenchen.svg?v=2" alt="Von Grenchen für Grenchen" class="h-14 sm:h-16 md:h-20 w-auto">
                    </a>
                </div>
            </div>
        </div>

        <CookieBanner />
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
