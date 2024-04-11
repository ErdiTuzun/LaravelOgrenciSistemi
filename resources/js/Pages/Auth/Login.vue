<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import {onMounted} from "vue";
import IndexHeader from "@/Components/IndexHeader.vue";


defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    login: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

</script>

<template>
    <Head title="Giriş Yap"/>

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>
    <section>
        <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 md:px-12 lg:px-24 lg:py-24">
            <div
                class="max-w-2xl justify-center mx-auto text-left align-bottom transition-all transform bg-white rounded-lg sm:align-middle sm:max-w-2xl sm:w-full">
                <div
                    class="grid flex-wrap items-center justify-center grid-cols-1 mx-auto shadow-xl lg:grid-cols-2 rounded-xl">
                    <div class="w-full px-6 py-3">
                        <div>
                            <div class="mt-3 text-left sm:mt-5">
                                <div class="inline-flex items-center w-full">
                                    <h3 class="text-lg font-bold text-neutral-600 l eading-6 lg:text-5xl">Giriş Yap</h3>
                                </div>
                                <div class="mt-4 text-base text-gray-500 divide-y divide-dashed">
                                    <p>Yönetim paneli için giriş yapınız.</p>
                                </div>
                                <div class="mt-4 text-base text-gray-500 divide-y divide-dashed">
                                    <p><strong>Demo Bilgiler</strong> yakında.. Dolor sit amet, consectetur adipisicing
                                        elit. Asperiores consequatur consequuntur ea ipsa itaque labore nobis optio quam
                                        quia reiciendis!.</p>
                                </div>
                            </div>
                        </div>
                        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                            {{ status }}
                        </div>
                        <div class="mt-6 space-y-2">
                            <form @submit.prevent="submit">
                                <div>
                                    <label for="text" class="text-subtitle-1">E-mail / Telefon / Kullanıcı Adı</label>
                                    <TextInput type="text" name="login" id="login" v-model="form.login"
                                               autocomplete="username" @keydown.enter="submit()"
                                               class="mb-2 block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-400 transition duration-500 ease-in-out
                transform border border-transparent rounded-lg bg-gray-100 focus:outline-none focus:border-transparent focus:ring-2
                focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" placeholder="E-posta / Telefon / Kullanıcı Adı"
                                               required/>
                                    <InputError class="mt-2" :message="form.errors.login"/>
                                </div>
                                <div>
                                    <label for="password" class="text-subtitle-1">Parola</label>
                                    <TextInput type="password" v-model="form.password" autocomplete="current-password"
                                               name="password" id="password" @keydown.enter="submit()"
                                               class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-400 transition duration-500 ease-in-out transform
               border border-transparent rounded-lg bg-gray-100 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white
               focus:ring-offset-2 focus:ring-offset-gray-300" placeholder="Parolanız" required/>
                                    <InputError class="mt-2" :message="form.errors.password"/>
                                </div>

                                <div class="block mt-4">
                                    <label class="flex items-center">
                                        <Checkbox name="remember" class="bg-blue" v-model:checked="form.remember"/>
                                        <span class="ms-2 text-sm text-gray-600 font-medium ">Oturumu açık tut</span>
                                    </label>
                                </div>
                                <div class="flex flex-col mt-4 lg:space-y-2">
                                    <PrimaryButton :class="{ 'opacity-25': form.processing }"
                                                   :disabled="form.processing" type="button" @click="submit" class="flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white
    transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2
    focus:ring-blue-500">Giriş Yap
                                    </PrimaryButton>
                                    <div class="flex justify-between">
                                        <Link v-if="canResetPassword" :href="route('password.request')" type="button"
                                              class="inline-flex justify-center py-4 text-base font-medium text-gray-500 focus:outline-none hover:text-neutral-600 focus:text-blue-600">
                                            <i class="fa fa-arrow-right mr-1 py-1"></i> Parola mı unuttum ?
                                        </Link>
                                        <Link href="/" type="button"
                                              class="inline-flex justify-center py-4 text-base font-medium text-gray-500 focus:outline-none hover:text-neutral-600 focus:text-blue-600">
                                            Geri Dön <i class="fa fa-arrow-left ml-1 py-1"></i></Link>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="order-first hidden w-full lg:block">
                        <img class="object-cover h-full bg-cover rounded-l-xl"
                             src="../../../../public/images/login-bg.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style>
.max-w-2xl {
    margin-top: 3%;
    max-width: 62rem
}

.shadow-xl {
    --tw-shadow: 0 20px 25px 15px rgb(0 0 0 / 0.1), 10px 8px 10px -6px rgb(0 0 0 / 0.1);
}
</style>
