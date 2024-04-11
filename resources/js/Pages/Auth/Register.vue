<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Checkbox from "@/Components/Checkbox.vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Kayıt Ol" />
    <section>
        <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 md:px-12 lg:px-24 lg:py-24">
            <div class="max-w-2xl justify-center mx-auto text-left align-bottom transition-all transform bg-white rounded-lg sm:align-middle sm:max-w-2xl sm:w-full">
                <div class="grid flex-wrap items-center justify-center grid-cols-1 mx-auto shadow-xl lg:grid-cols-2 rounded-xl">
                    <div class="w-full px-6 py-3">
                        <div>
                            <div class="mt-3 text-left sm:mt-5">
                                <div class="inline-flex items-center w-full">
                                    <h3 class="text-lg font-bold text-neutral-600 l eading-6 lg:text-5xl">Kayıt Ol</h3>
                                </div>
                                <div class="mt-4 text-base text-gray-500 divide-y divide-dashed">
                                    <p>Kayıt olmak için formu doldurunuz.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 space-y-2">
                            <form @submit.prevent="submit">
                                <div>
                                    <InputLabel for="name" value="Adınız" />
                                    <TextInput
                                        id="name"
                                        type="text"
                                        class="mb-2 block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-400 transition duration-500 ease-in-out
                                transform border border-transparent rounded-lg bg-gray-100 focus:outline-none focus:border-transparent focus:ring-2
                                focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                        v-model="form.name"
                                        required
                                        autocomplete="name"
                                    />
<!--                                    autofocus-->
                                    <InputError class="mt-2" :message="form.errors.name" />
                                </div>
                                <div>
                                    <InputLabel for="email" value="E-mail" />

                                    <TextInput
                                        id="email"
                                        type="email"
                                        class="mb-2 block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-400 transition duration-500 ease-in-out
                                transform border border-transparent rounded-lg bg-gray-100 focus:outline-none focus:border-transparent focus:ring-2
                                focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                        v-model="form.email"
                                        required
                                        autocomplete="username"
                                    />
                                    <InputError class="mt-2" :message="form.errors.email" />


                                    <InputLabel for="password" value="Parola" />

                                    <TextInput
                                        id="password"
                                        type="password"
                                        class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-400 transition duration-500 ease-in-out transform
                               border border-transparent rounded-lg bg-gray-100 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white
                               focus:ring-offset-2 focus:ring-offset-gray-300"
                                        v-model="form.password"
                                        required
                                        autocomplete="new-password"
                                    />
                                    <InputError class="mt-2" :message="form.errors.password" />

                                    <InputLabel for="password_confirmation" value="Parola Onayı" />

                                    <TextInput
                                        id="password_confirmation"
                                        type="password"
                                        class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-400 transition duration-500 ease-in-out transform
                               border border-transparent rounded-lg bg-gray-100 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white
                               focus:ring-offset-2 focus:ring-offset-gray-300"
                                        v-model="form.password_confirmation"
                                        required
                                        autocomplete="new-password"
                                    />
                                    <InputError class="mt-2" :message="form.errors.password_confirmation" />


                                    <div class="flex justify-center mt-5">
                                    <PrimaryButton class="" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        Kayıt Ol
                                    </PrimaryButton>
                                    </div>
                                        <div class="flex justify-between">
                                            <Link :href="route('login')" type="button" class="inline-flex justify-start py-4 text-base font-medium text-gray-500 focus:outline-none hover:text-neutral-600 focus:text-blue-600"><i class="fa fa-arrow-right mr-1 py-0.5"></i> Hesabınız var mı? </Link>
                                            <Link href="/" type="button" class="inline-flex justify-end py-4 text-base font-medium text-gray-500 focus:outline-none hover:text-neutral-600 focus:text-blue-600"> Geri Dön <i class="fa fa-arrow-left ml-1 py-0.5"></i> </Link>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="order-first hidden w-full lg:block" style="height: 62vh;">
                        <img class="object-cover h-full bg-cover rounded-l-xl" style="width: inherit" src="../../../../public/images/register-bg.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style>
.sm\:max-w-2xl {
    margin-top: 3%;
    max-width: 62rem;
}
</style>
