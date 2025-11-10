<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import HelpButton from '@/Components/HelpButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const countries = [
    'Schweiz',
    'Deutschland',
    'Österreich',
    'Liechtenstein',
    'Frankreich',
    'Italien',
    'Spanien',
    'Niederlande',
    'Belgien',
    'Luxemburg',
    'Vereinigtes Königreich',
    'USA',
    'Kanada',
];

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    email_confirmation: '',
    password: '',
    password_confirmation: '',
    address: '',
    country: 'Schweiz',
    postal_code: '',
    date_of_birth: '',
});

const showPassword = ref(false);
const showPasswordConfirmation = ref(false);
const addressSuggestions = ref([]);
const showAddressSuggestions = ref(false);
const isLoadingAddresses = ref(false);
let addressSearchTimeout = null;

const searchAddress = async () => {
    const query = form.address;
    if (!query || query.length < 3) {
        addressSuggestions.value = [];
        showAddressSuggestions.value = false;
        return;
    }

    clearTimeout(addressSearchTimeout);
    addressSearchTimeout = setTimeout(async () => {
        isLoadingAddresses.value = true;
        try {
            const response = await fetch(
                `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&countrycodes=ch,de,at,li,fr,it&addressdetails=1&limit=5`,
                {
                    headers: {
                        'Accept': 'application/json',
                    }
                }
            );
            const data = await response.json();
            addressSuggestions.value = data.map(item => ({
                display: item.display_name,
                street: item.address?.road || '',
                house_number: item.address?.house_number || '',
                postcode: item.address?.postcode || '',
                city: item.address?.city || item.address?.town || item.address?.village || '',
                country: item.address?.country || '',
            }));
            showAddressSuggestions.value = addressSuggestions.value.length > 0;
        } catch (error) {
            console.error('Adresssuche fehlgeschlagen:', error);
            addressSuggestions.value = [];
            showAddressSuggestions.value = false;
        } finally {
            isLoadingAddresses.value = false;
        }
    }, 500);
};

const selectAddress = (suggestion) => {
    const street = suggestion.street && suggestion.house_number
        ? `${suggestion.street} ${suggestion.house_number}`
        : suggestion.street || suggestion.display.split(',')[0];

    form.address = street;
    form.postal_code = suggestion.postcode;

    const countryMap = {
        'Schweiz': 'Schweiz',
        'Switzerland': 'Schweiz',
        'Deutschland': 'Deutschland',
        'Germany': 'Deutschland',
        'Österreich': 'Österreich',
        'Austria': 'Österreich',
        'Liechtenstein': 'Liechtenstein',
        'Frankreich': 'Frankreich',
        'France': 'Frankreich',
        'Italien': 'Italien',
        'Italy': 'Italien',
    };

    const mappedCountry = countryMap[suggestion.country] || suggestion.country;
    if (countries.includes(mappedCountry)) {
        form.country = mappedCountry;
    }

    showAddressSuggestions.value = false;
};

const generatePassword = () => {
    const length = 16;
    const charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*';
    let password = '';

    password += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'[Math.floor(Math.random() * 26)];
    password += 'abcdefghijklmnopqrstuvwxyz'[Math.floor(Math.random() * 26)];
    password += '0123456789'[Math.floor(Math.random() * 10)];
    password += '!@#$%^&*'[Math.floor(Math.random() * 8)];

    for (let i = password.length; i < length; i++) {
        password += charset[Math.floor(Math.random() * charset.length)];
    }

    password = password.split('').sort(() => Math.random() - 0.5).join('');

    form.password = password;
    form.password_confirmation = password;
};

const funnyMessages = [
    'Dein Passwort lässt sich selbst vom FBI nicht knacken!',
    'Selbst Hacker weinen bei diesem Passwort!',
    'Fort Knox ist nichts gegen dieses Passwort!',
    'Dieses Passwort ist stärker als mein Kaffee!',
    'NASA möchte deinen Standort wissen!',
    'Chuck Norris nickt anerkennend!',
    'Selbst Quantencomputer geben auf!',
    'Dieses Passwort hat einen schwarzen Gürtel!',
];

const helpSteps = [
    {
        title: 'Willkommen zur Registrierung',
        description: 'Hier können Sie sich ein kostenloses Konto erstellen. Füllen Sie einfach alle Felder aus. Wir führen Sie Schritt für Schritt durch den Prozess.',
        tips: 'Alle Felder mit einem Stern sind Pflichtfelder und müssen ausgefüllt werden.'
    },
    {
        title: 'Persönliche Daten eingeben',
        description: 'Geben Sie Ihren Vornamen und Nachnamen ein. Klicken Sie einfach in das Feld und tippen Sie Ihren Namen ein. Drücken Sie dann die Tab-Taste oder klicken Sie auf das nächste Feld.',
        tips: 'Verwenden Sie Ihren echten Namen, damit wir Sie identifizieren können.'
    },
    {
        title: 'E-Mail-Adresse eingeben',
        description: 'Geben Sie Ihre E-Mail-Adresse ein und wiederholen Sie sie im zweiten Feld. Die E-Mail-Adresse muss in beiden Feldern genau gleich sein. Beispiel: max.mustermann@email.ch',
        tips: 'Verwenden Sie eine E-Mail-Adresse, auf die Sie Zugriff haben. Sie erhalten eine Bestätigungs-E-Mail.'
    },
    {
        title: 'Adresse eingeben',
        description: 'Beginnen Sie mit der Eingabe Ihrer Strasse und Hausnummer. Nach 3 Buchstaben erscheinen automatisch Vorschläge. Klicken Sie auf den richtigen Vorschlag, und die Adresse wird automatisch ausgefüllt.',
        tips: 'Wenn keine Vorschläge erscheinen, warten Sie einen Moment oder geben Sie mehr Buchstaben ein.'
    },
    {
        title: 'Passwort erstellen',
        description: 'Klicken Sie auf den blauen Button "Starkes Passwort generieren" oben rechts. Das System erstellt automatisch ein sicheres Passwort für Sie. Sie können es auch selbst eingeben, wenn Sie möchten.',
        tips: 'Ein sicheres Passwort sollte mindestens 8 Zeichen lang sein und Gross- und Kleinbuchstaben, Zahlen und Sonderzeichen enthalten.'
    },
    {
        title: 'Geburtsdatum eingeben',
        description: 'Klicken Sie auf das Datumsfeld. Es öffnet sich ein Kalender. Wählen Sie zuerst das Jahr, dann den Monat und dann den Tag aus. Sie können auch direkt das Datum eintippen im Format: TT.MM.JJJJ',
        tips: 'Beispiel: 15.03.1980 für den 15. März 1980'
    },
    {
        title: 'Registrierung abschliessen',
        description: 'Wenn alle Felder ausgefüllt sind, klicken Sie auf den grossen blauen Button "Registrieren" ganz unten. Sie erhalten dann eine E-Mail zur Bestätigung Ihrer Registrierung.',
        tips: 'Prüfen Sie auch Ihren Spam-Ordner, falls Sie keine E-Mail erhalten.'
    }
];

const passwordStrength = computed(() => {
    const password = form.password;
    if (!password) return { score: 0, label: '', color: '', message: '' };

    let score = 0;

    if (password.length >= 8) score++;
    if (password.length >= 12) score++;
    if (/[a-z]/.test(password)) score++;
    if (/[A-Z]/.test(password)) score++;
    if (/[0-9]/.test(password)) score++;
    if (/[^a-zA-Z0-9]/.test(password)) score++;

    if (score <= 2) return { score: 1, label: 'Schwach', color: 'bg-red-500', message: 'Das geht besser!' };
    if (score <= 4) return { score: 2, label: 'Mittel', color: 'bg-yellow-500', message: 'Schon ganz gut!' };
    if (score <= 5) return { score: 3, label: 'Gut', color: 'bg-blue-500', message: 'Sehr solide!' };

    const randomMessage = funnyMessages[Math.floor(Math.random() * funnyMessages.length)];
    return { score: 4, label: 'Sehr stark', color: 'bg-green-500', message: randomMessage };
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Registrieren" />

        <form @submit.prevent="submit" class="space-y-6">
            <div class="space-y-4">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Persönliche Daten</h3>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <InputLabel for="first_name" value="Vorname" />
                        <TextInput
                            id="first_name"
                            type="text"
                            class="mt-1 block w-full transition-all duration-200 focus:scale-[1.01]"
                            v-model="form.first_name"
                            required
                            autofocus
                            autocomplete="given-name"
                        />
                        <InputError class="mt-2" :message="form.errors.first_name" />
                    </div>

                    <div>
                        <InputLabel for="last_name" value="Nachname" />
                        <TextInput
                            id="last_name"
                            type="text"
                            class="mt-1 block w-full transition-all duration-200 focus:scale-[1.01]"
                            v-model="form.last_name"
                            required
                            autocomplete="family-name"
                        />
                        <InputError class="mt-2" :message="form.errors.last_name" />
                    </div>
                </div>

                <div>
                    <InputLabel for="date_of_birth" value="Geburtsdatum" />
                    <TextInput
                        id="date_of_birth"
                        type="date"
                        class="mt-1 block w-full transition-all duration-200 focus:scale-[1.01]"
                        v-model="form.date_of_birth"
                        required
                        autocomplete="bday"
                    />
                    <InputError class="mt-2" :message="form.errors.date_of_birth" />
                </div>
            </div>

            <div class="space-y-4 border-t border-gray-200 dark:border-gray-700 pt-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Kontaktdaten</h3>

                <div>
                    <InputLabel for="email" value="Email" />
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full transition-all duration-200 focus:scale-[1.01]"
                        v-model="form.email"
                        required
                        autocomplete="email"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div>
                    <InputLabel for="email_confirmation" value="Email bestätigen" />
                    <TextInput
                        id="email_confirmation"
                        type="email"
                        class="mt-1 block w-full transition-all duration-200 focus:scale-[1.01]"
                        v-model="form.email_confirmation"
                        required
                        autocomplete="email"
                    />
                    <InputError class="mt-2" :message="form.errors.email_confirmation" />
                </div>
            </div>

            <div class="space-y-4 border-t border-gray-200 dark:border-gray-700 pt-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Adresse</h3>

                <div class="relative">
                    <InputLabel for="address" value="Strasse und Hausnummer" />
                    <TextInput
                        id="address"
                        type="text"
                        class="mt-1 block w-full transition-all duration-200 focus:scale-[1.01]"
                        v-model="form.address"
                        @input="searchAddress"
                        @focus="searchAddress"
                        @blur="setTimeout(() => showAddressSuggestions = false, 200)"
                        required
                        autocomplete="off"
                        placeholder="z.B. Musterstrasse 123"
                    />
                    <div v-if="isLoadingAddresses" class="absolute right-3 top-10 text-gray-400">
                        <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    <div v-if="showAddressSuggestions && addressSuggestions.length > 0" class="absolute z-10 w-full mt-1 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md shadow-lg max-h-60 overflow-auto">
                        <button
                            v-for="(suggestion, index) in addressSuggestions"
                            :key="index"
                            type="button"
                            @click="selectAddress(suggestion)"
                            class="w-full text-left px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-150 border-b border-gray-200 dark:border-gray-700 last:border-b-0"
                        >
                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                {{ suggestion.street }} {{ suggestion.house_number }}
                            </div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                {{ suggestion.postcode }} {{ suggestion.city }}, {{ suggestion.country }}
                            </div>
                        </button>
                    </div>
                    <InputError class="mt-2" :message="form.errors.address" />
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <InputLabel for="postal_code" value="Postleitzahl" />
                        <TextInput
                            id="postal_code"
                            type="text"
                            class="mt-1 block w-full transition-all duration-200 focus:scale-[1.01]"
                            v-model="form.postal_code"
                            required
                            autocomplete="postal-code"
                            placeholder="z.B. 8000"
                        />
                        <InputError class="mt-2" :message="form.errors.postal_code" />
                    </div>

                    <div>
                        <InputLabel for="country" value="Land" />
                        <select
                            id="country"
                            v-model="form.country"
                            required
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm transition-all duration-200 focus:scale-[1.01]"
                        >
                            <option v-for="country in countries" :key="country" :value="country">
                                {{ country }}
                            </option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.country" />
                    </div>
                </div>
            </div>

            <div class="space-y-4 border-t border-gray-200 dark:border-gray-700 pt-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Passwort</h3>
                    <button
                        type="button"
                        @click="generatePassword"
                        class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 font-medium transition-colors duration-200 flex items-center space-x-1"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                        </svg>
                        <span>Starkes Passwort generieren</span>
                    </button>
                </div>

                <div>
                    <InputLabel for="password" value="Passwort" />
                    <div class="relative">
                        <TextInput
                            id="password"
                            :type="showPassword ? 'text' : 'password'"
                            class="mt-1 block w-full pr-10 transition-all duration-200 focus:scale-[1.01]"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                        />
                        <button
                            type="button"
                            @click="showPassword = !showPassword"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors duration-200"
                        >
                            <svg v-if="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                            </svg>
                        </button>
                    </div>

                    <div v-if="form.password" class="mt-2">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-xs font-medium text-gray-700 dark:text-gray-300">Passwortstärke:</span>
                            <span class="text-xs font-semibold" :class="passwordStrength.score === 1 ? 'text-red-600 dark:text-red-400' : passwordStrength.score === 2 ? 'text-yellow-600 dark:text-yellow-400' : passwordStrength.score === 3 ? 'text-blue-600 dark:text-blue-400' : 'text-green-600 dark:text-green-400'">
                                {{ passwordStrength.label }}
                            </span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 overflow-hidden">
                            <div
                                class="h-full transition-all duration-300 rounded-full"
                                :class="passwordStrength.color"
                                :style="{ width: `${(passwordStrength.score / 4) * 100}%` }"
                            ></div>
                        </div>
                        <p class="mt-2 text-sm font-medium" :class="passwordStrength.score === 1 ? 'text-red-600 dark:text-red-400' : passwordStrength.score === 2 ? 'text-yellow-600 dark:text-yellow-400' : passwordStrength.score === 3 ? 'text-blue-600 dark:text-blue-400' : 'text-green-600 dark:text-green-400'">
                            {{ passwordStrength.message }}
                        </p>
                    </div>

                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Mindestens 8 Zeichen, Gross- und Kleinbuchstaben, Zahlen und Sonderzeichen</p>
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div>
                    <InputLabel for="password_confirmation" value="Passwort bestätigen" />
                    <div class="relative">
                        <TextInput
                            id="password_confirmation"
                            :type="showPasswordConfirmation ? 'text' : 'password'"
                            class="mt-1 block w-full pr-10 transition-all duration-200 focus:scale-[1.01]"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />
                        <button
                            type="button"
                            @click="showPasswordConfirmation = !showPasswordConfirmation"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors duration-200"
                        >
                            <svg v-if="!showPasswordConfirmation" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                            </svg>
                        </button>
                    </div>
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>
            </div>

            <div class="flex items-center justify-between border-t border-gray-200 dark:border-gray-700 pt-6">
                <Link
                    :href="route('login')"
                    class="rounded-md text-sm text-gray-600 dark:text-gray-400 underline hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200"
                >
                    Bereits registriert?
                </Link>

                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    class="transition-all duration-200 hover:scale-105"
                >
                    Registrieren
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>

    <HelpButton :steps="helpSteps" title="Registrierungs-Hilfe" />
</template>
