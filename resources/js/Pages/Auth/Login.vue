<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import HelpButton from '@/Components/HelpButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

const helpSteps = [
    {
        title: 'Willkommen zur Anmeldung',
        description: 'Hier können Sie sich mit Ihrem bestehenden Konto anmelden. Sie benötigen nur Ihre E-Mail-Adresse und Ihr Passwort.',
        tips: 'Wenn Sie noch kein Konto haben, klicken Sie unten auf "Noch kein Konto? Jetzt registrieren".'
    },
    {
        title: 'E-Mail-Adresse eingeben',
        description: 'Klicken Sie in das erste Feld und geben Sie Ihre E-Mail-Adresse ein. Das ist die gleiche E-Mail-Adresse, die Sie bei der Registrierung verwendet haben.',
        tips: 'Beispiel: max.mustermann@email.ch'
    },
    {
        title: 'Passwort eingeben',
        description: 'Klicken Sie in das zweite Feld und geben Sie Ihr Passwort ein. Die Buchstaben werden als Punkte angezeigt, damit niemand Ihr Passwort sehen kann.',
        tips: 'Wenn Sie Ihr Passwort vergessen haben, klicken Sie unten auf "Passwort vergessen?".'
    },
    {
        title: 'Angemeldet bleiben',
        description: 'Wenn Sie das Kästchen "Angemeldet bleiben" anklicken, müssen Sie sich beim nächsten Besuch nicht erneut anmelden. Aktivieren Sie dies nur auf Ihrem eigenen Computer.',
        tips: 'Auf öffentlichen Computern sollten Sie diese Option nicht aktivieren.'
    },
    {
        title: 'Anmelden',
        description: 'Klicken Sie auf den grossen blauen Button "Anmelden". Sie werden dann zu Ihrem Konto weitergeleitet.',
        tips: 'Falls eine Fehlermeldung erscheint, überprüfen Sie Ihre E-Mail-Adresse und Ihr Passwort.'
    }
];
</script>

<template>
    <GuestLayout>
        <Head title="Anmelden" />

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="space-y-6">
            <div class="bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Anmeldedaten</h3>

                <div class="space-y-4">
                    <div>
                        <InputLabel for="email" value="E-Mail-Adresse" />
                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full transition-all duration-200 focus:scale-[1.01]"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div>
                        <InputLabel for="password" value="Passwort" />
                        <TextInput
                            id="password"
                            type="password"
                            class="mt-1 block w-full transition-all duration-200 focus:scale-[1.01]"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>
                </div>
            </div>

            <div class="mt-4 block">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-600"
                        >Angemeldet bleiben</span
                    >
                </label>
            </div>

            <div class="mt-4 flex items-center justify-end">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Passwort vergessen?
                </Link>

                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Anmelden
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>

    <HelpButton :steps="helpSteps" title="Anmeldungs-Hilfe" />
</template>
