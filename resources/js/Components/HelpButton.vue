<script setup>
import { ref } from 'vue';

const props = defineProps({
    steps: {
        type: Array,
        required: true,
    },
    title: {
        type: String,
        default: 'Hilfe',
    },
});

const showHelp = ref(false);
const currentStep = ref(0);

const nextStep = () => {
    if (currentStep.value < props.steps.length - 1) {
        currentStep.value++;
    }
};

const previousStep = () => {
    if (currentStep.value > 0) {
        currentStep.value--;
    }
};

const closeHelp = () => {
    showHelp.value = false;
    currentStep.value = 0;
};
</script>

<template>
    <div class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 z-50">
        <button
            @click="showHelp = !showHelp"
            class="text-white rounded-full w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center shadow-lg transition-all duration-200 hover:scale-110"
            :class="showHelp ? 'bg-red-600 hover:bg-red-700' : 'bg-indigo-600 hover:bg-indigo-700'"
            :title="showHelp ? 'Hilfe schliessen' : 'Hilfe anzeigen'"
        >
            <svg v-if="!showHelp" class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <svg v-else class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div
            v-if="showHelp"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4 z-50"
            @click.self="closeHelp"
        >
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden mx-4">
                <div class="bg-indigo-600 text-white px-4 sm:px-8 py-4 sm:py-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg sm:text-2xl font-bold">{{ title }}</h2>
                        <button
                            @click="closeHelp"
                            class="text-white hover:bg-indigo-700 rounded-full p-1.5 sm:p-2 transition-colors"
                        >
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 sm:mt-4 flex items-center justify-center space-x-1.5 sm:space-x-2">
                        <div
                            v-for="(step, index) in steps"
                            :key="index"
                            class="h-1.5 sm:h-2 rounded-full transition-all duration-300"
                            :class="index === currentStep ? 'w-6 sm:w-8 bg-white' : 'w-1.5 sm:w-2 bg-white/40'"
                        ></div>
                    </div>
                </div>

                <div class="p-4 sm:p-8 overflow-y-auto" style="max-height: calc(90vh - 200px);">
                    <div class="text-center mb-4 sm:mb-6">
                        <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 bg-indigo-100 dark:bg-indigo-900 rounded-full mb-3 sm:mb-4">
                            <span class="text-2xl sm:text-3xl font-bold text-indigo-600 dark:text-indigo-400">{{ currentStep + 1 }}</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-3 sm:mb-4">
                            {{ steps[currentStep].title }}
                        </h3>
                    </div>

                    <div class="prose prose-base sm:prose-lg dark:prose-invert max-w-none">
                        <p class="text-base sm:text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                            {{ steps[currentStep].description }}
                        </p>
                    </div>

                    <div v-if="steps[currentStep].tips" class="mt-4 sm:mt-6 bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 p-3 sm:p-4 rounded">
                        <p class="text-xs sm:text-sm font-semibold text-blue-900 dark:text-blue-300 mb-1 sm:mb-2">Tipp:</p>
                        <p class="text-xs sm:text-sm text-blue-800 dark:text-blue-200">{{ steps[currentStep].tips }}</p>
                    </div>
                </div>

                <div class="bg-gray-50 dark:bg-gray-900 px-4 sm:px-8 py-4 sm:py-6 flex justify-between items-center border-t border-gray-200 dark:border-gray-700">
                    <button
                        @click="previousStep"
                        :disabled="currentStep === 0"
                        class="px-4 sm:px-6 py-2 sm:py-3 text-sm sm:text-base rounded-lg font-medium transition-all duration-200 disabled:opacity-40 disabled:cursor-not-allowed bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600"
                    >
                        Zurück
                    </button>

                    <span class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 font-medium">
                        Schritt {{ currentStep + 1 }} von {{ steps.length }}
                    </span>

                    <button
                        v-if="currentStep < steps.length - 1"
                        @click="nextStep"
                        class="px-4 sm:px-6 py-2 sm:py-3 text-sm sm:text-base bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition-all duration-200"
                    >
                        Weiter
                    </button>
                    <button
                        v-else
                        @click="closeHelp"
                        class="px-4 sm:px-6 py-2 sm:py-3 text-sm sm:text-base bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-all duration-200"
                    >
                        Verstanden
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

