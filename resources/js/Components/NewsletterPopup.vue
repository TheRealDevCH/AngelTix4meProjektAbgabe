<script setup>
import { ref, onMounted } from 'vue';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import Checkbox from '@/Components/Checkbox.vue';

const showPopup = ref(false);
const hasClosedPopup = ref(false);

const form = useForm({
    email: '',
    accept_privacy: false,
});

onMounted(() => {
    const popupClosed = localStorage.getItem('newsletter_popup_closed');
    if (!popupClosed) {
        setTimeout(() => {
            showPopup.value = true;
        }, 5000);
    }
});

const closePopup = () => {
    showPopup.value = false;
    hasClosedPopup.value = true;
    localStorage.setItem('newsletter_popup_closed', 'true');
};

const subscribe = () => {
    form.post(route('newsletter.subscribe'), {
        onSuccess: () => {
            closePopup();
        },
    });
};
</script>

<template>
    <Transition
        enter-active-class="transition ease-out duration-300"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition ease-in duration-200"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="showPopup"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm px-4"
            @click.self="closePopup"
        >
            <Transition
                enter-active-class="transition ease-out duration-300 delay-100"
                enter-from-class="opacity-0 scale-95 translate-y-4"
                enter-to-class="opacity-100 scale-100 translate-y-0"
                leave-active-class="transition ease-in duration-200"
                leave-from-class="opacity-100 scale-100"
                leave-to-class="opacity-0 scale-95"
            >
                <div
                    v-if="showPopup"
                    class="relative w-full max-w-md bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 rounded-2xl shadow-2xl p-1"
                >
                    <div class="bg-white dark:bg-gray-900 rounded-xl p-8 relative">
                        <button
                            @click="closePopup"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors"
                        >
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <div class="text-center mb-6">
                            <div class="inline-flex items-center justify-center mb-4">
                                <img src="/tix4me.svg" alt="Tix4me Logo" class="h-20 w-auto" />
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                                Verpasse keine Events mehr
                            </h2>
                            <p class="text-gray-600 dark:text-gray-400 text-lg">
                                Erhalte exklusive Updates zu den neuesten Events in Grenchen direkt in dein Postfach
                            </p>
                        </div>

                        <form @submit.prevent="subscribe" class="space-y-4">
                            <div>
                                <TextInput
                                    id="newsletter_email"
                                    type="email"
                                    v-model="form.email"
                                    placeholder="deine@email.ch"
                                    class="w-full text-lg py-3 px-4 border-2 border-gray-300 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-indigo-400 rounded-lg transition-all"
                                    required
                                />
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <div class="flex items-start space-x-3 bg-gray-50 dark:bg-gray-800 p-4 rounded-lg border-2 border-gray-200 dark:border-gray-700">
                                <Checkbox
                                    id="newsletter_privacy"
                                    v-model:checked="form.accept_privacy"
                                    required
                                    class="mt-1"
                                />
                                <label for="newsletter_privacy" class="text-sm text-gray-700 dark:text-gray-300 cursor-pointer">
                                    Ich akzeptiere die
                                    <a href="/datenschutz" target="_blank" class="text-indigo-600 dark:text-indigo-400 hover:underline font-semibold">
                                        Datenschutzbestimmungen
                                    </a>
                                    und möchte Updates zu Events erhalten
                                </label>
                            </div>
                            <InputError class="mt-2" :message="form.errors.accept_privacy" />

                            <PrimaryButton
                                type="submit"
                                :disabled="form.processing || !form.accept_privacy"
                                class="w-full py-4 text-lg font-bold bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 disabled:opacity-50 disabled:cursor-not-allowed transition-all transform hover:scale-105 shadow-lg"
                            >
                                <span v-if="form.processing">Wird gesendet...</span>
                                <span v-else>Jetzt anmelden und nichts verpassen</span>
                            </PrimaryButton>
                        </form>

                        <p class="text-xs text-center text-gray-500 dark:text-gray-400 mt-4">
                            Du kannst dich jederzeit wieder abmelden
                        </p>
                    </div>
                </div>
            </Transition>
        </div>
    </Transition>
</template>

