<script setup>
import { ref, onMounted } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, router } from '@inertiajs/vue3';

const countdown = ref(5);

onMounted(() => {
    const interval = setInterval(() => {
        countdown.value--;
        
        if (countdown.value <= 0) {
            clearInterval(interval);
            router.visit(route('dashboard'));
        }
    }, 1000);
});
</script>

<template>
    <GuestLayout>
        <Head title="E-Mail verifiziert" />

        <div class="text-center">
            <svg class="mx-auto h-16 w-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            
            <h2 class="mt-4 text-2xl font-bold text-gray-900">
                E-Mail erfolgreich verifiziert!
            </h2>
            
            <p class="mt-2 text-sm text-gray-600">
                Ihre E-Mail-Adresse wurde erfolgreich bestätigt. Sie werden in <span class="font-bold">{{ countdown }}</span> Sekunden zur Hauptseite weitergeleitet...
            </p>
        </div>
    </GuestLayout>
</template>

