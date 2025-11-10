<script setup>
import { router } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

const isLoading = ref(false);
const progress = ref(0);
let progressInterval = null;

onMounted(() => {
    router.on('start', () => {
        isLoading.value = true;
        progress.value = 0;
        
        progressInterval = setInterval(() => {
            if (progress.value < 90) {
                progress.value += Math.random() * 10;
            }
        }, 200);
    });

    router.on('finish', () => {
        progress.value = 100;
        
        setTimeout(() => {
            isLoading.value = false;
            progress.value = 0;
            if (progressInterval) {
                clearInterval(progressInterval);
            }
        }, 200);
    });
});
</script>

<template>
    <div
        v-if="isLoading"
        class="fixed top-0 left-0 right-0 z-50 h-1 bg-gray-200 dark:bg-gray-700"
    >
        <div
            class="h-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 transition-all duration-200 ease-out"
            :style="{ width: `${progress}%` }"
        ></div>
    </div>
</template>

