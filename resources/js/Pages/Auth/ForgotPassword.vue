<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import HelpButton from '@/Components/HelpButton.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};

const helpSteps = [
    {
        title: 'Passwort zurücksetzen',
        description: 'Wenn Sie Ihr Passwort vergessen haben, können Sie hier ein neues Passwort anfordern. Wir senden Ihnen einen Link per E-Mail zu.',
        tips: 'Der Link ist nur für eine begrenzte Zeit gültig. Verwenden Sie ihn so bald wie möglich.'
    },
    {
        title: 'E-Mail-Adresse eingeben',
        description: 'Geben Sie die E-Mail-Adresse ein, mit der Sie sich registriert haben. Klicken Sie in das Feld und tippen Sie Ihre E-Mail-Adresse ein.',
        tips: 'Achten Sie darauf, dass Sie die richtige E-Mail-Adresse eingeben. Nur an diese Adresse wird der Link gesendet.'
    },
    {
        title: 'Link anfordern',
        description: 'Klicken Sie auf den blauen Button "Passwort-Link senden". Sie erhalten dann eine E-Mail mit einem Link zum Zurücksetzen Ihres Passworts.',
        tips: 'Prüfen Sie auch Ihren Spam-Ordner, falls Sie keine E-Mail erhalten.'
    },
    {
        title: 'E-Mail öffnen',
        description: 'Öffnen Sie Ihr E-Mail-Programm und suchen Sie nach der E-Mail von Tix4me. Klicken Sie auf den Link in der E-Mail.',
        tips: 'Der Link führt Sie zu einer Seite, wo Sie ein neues Passwort eingeben können.'
    },
    {
        title: 'Neues Passwort erstellen',
        description: 'Geben Sie Ihr neues Passwort zweimal ein. Wählen Sie ein sicheres Passwort mit mindestens 8 Zeichen, Gross- und Kleinbuchstaben, Zahlen und Sonderzeichen.',
        tips: 'Notieren Sie sich Ihr neues Passwort an einem sicheren Ort.'
    }
];
</script>

<template>
    <GuestLayout>
        <Head title="Passwort vergessen" />

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            Passwort vergessen? Kein Problem. Geben Sie einfach Ihre E-Mail-Adresse ein und wir senden Ihnen einen Link zum Zurücksetzen des Passworts zu.
        </div>

        <div
            v-if="status"
            class="mb-4 text-sm font-medium text-green-600"
        >
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="E-Mail-Adresse" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Passwort-Link senden
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>

    <HelpButton :steps="helpSteps" title="Passwort-Hilfe" />
</template>
