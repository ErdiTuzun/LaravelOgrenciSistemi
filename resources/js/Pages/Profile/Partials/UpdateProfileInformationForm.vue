<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const nameRules = ref([
    value => {
    if (value) return true
        return 'Zorunlu alan.'
    },
]);

const user = usePage().props.auth.user;

const defaultphoto = 'https://t4.ftcdn.net/jpg/00/64/67/27/360_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg';
const file = ref(null);

const onFileChange = (e) => {
    file.value = e.target.files[0];
};

const uploadImage = async () => {
    const formData = new FormData();
    formData.append('image', file.value);

    try {
        const response = await axios.post('/api/upload-image', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });
        console.log(response.data);
    } catch (error) {
        console.error(error);
    }
};

const form = useForm({
    name: user.name,
    email: user.email,
});

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Profil Bilgilerim</h2>

            <p class="mt-1 text-sm text-gray-600">
                Hesabınızın profil bilgilerini ve e-posta adresini güncelleyin.</p>
        </header>

        <v-form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
            <v-container>
                <v-row>
                    <v-col cols="4">
                <v-text-field
                    id="name"
                    :rules="nameRules"
                    label="Adınız"
                    type="text"
                    v-model="form.name"
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
                    </v-col>



                <v-col cols="4">
                <v-text-field
                    id="email"
                    type="email"
                    label="E-mail"
                    hide-details
                    v-model="form.email"
                    required
                />

                <InputError class="mt-2" :message="form.errors.email" />
                </v-col>
                </v-row>
            </v-container>
            <div v-if="mustVerifyEmail && user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-800">
                    E-posta adresiniz doğrulanmadı.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Doğrulama e-postasını yeniden göndermek için burayı tıklayın.
                    </Link>
                </p>

                <div
                    v-show="status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600"
                >
                    E-posta adresinize yeni bir doğrulama bağlantısı gönderildi.
                </div>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Profili Güncelle</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Ayarlar Başarıyla Kaydedildi.</p>
                </Transition>
            </div>

        </v-form>
    </section>
</template>
