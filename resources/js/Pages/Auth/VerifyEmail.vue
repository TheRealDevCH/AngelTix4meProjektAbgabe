<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(
    () => props.status === 'verification-link-sent',
);
</script>

<template>
    <GuestLayout>
        <Head title="E-Mail-Verifizierung" />

        <div class="mb-4 text-sm text-gray-600">
            Vielen Dank für Ihre Registrierung! Bevor Sie beginnen können, müssen Sie Ihre E-Mail-Adresse verifizieren,
            indem Sie auf den Link klicken, den wir Ihnen gerade per E-Mail gesendet haben. Falls Sie die E-Mail nicht
            erhalten haben, senden wir Ihnen gerne eine neue.
        </div>

        <div
            class="mb-4 text-sm font-medium text-green-600"
            v-if="verificationLinkSent"
        >
            Ein neuer Verifizierungslink wurde an Ihre E-Mail-Adresse gesendet.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Verifizierungs-E-Mail erneut senden
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >Abmelden</Link
                >
            </div>
        </form>
    </GuestLayout>
</template>
