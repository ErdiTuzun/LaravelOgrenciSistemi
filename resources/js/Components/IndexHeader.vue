<template>


    <header class="bg-white">
        <nav class="mx-auto flex max-w-9xl items-center justify-between lg:px-0" aria-label="Global">
            <div class=" w-full max-w-9xl">
                <div
                    class="flex flex-col max-w-6xl p-5 mx-auto md:items-center md:justify-between md:flex-row lg:px-0">
                    <div class="flex flex-row items-center justify-between lg:justify-start">
                        <a class="text-xl font-bold tracking-tighter text-blue-600 transition duration-500 ease-in-out transform tracking-relaxed lg:pr-8"
                           href="/"> ÖğrenciSistemi </a>
                    </div>

                    <nav
                        class="flex-col items-center justify-start flex-grow hidden pb-4 border-blue-600 md:pb-0 md:flex md:justify-end md:flex-row lg:border-l-2 lg:pl-2">
                        <a class="px-4 py-2 mt-2 text-md text-gray-500 md:mt-0 hover:text-blue-600 focus:outline-none focus:shadow-outline"
                           href="/">ANASAYFA</a>
                        <a class="px-4 py-2 mt-2 text-md text-gray-500 md:mt-0 hover:text-blue-600 focus:outline-none focus:shadow-outline"
                           href="/">HAKKIMIZDA</a>
                        <a class="px-4 py-2 mt-2 text-md text-gray-500 md:mt-0 hover:text-blue-600 focus:outline-none focus:shadow-outline"
                           href="/">BÖLÜMLERİMİZ</a>
                        <a class="px-4 py-2 mt-2 text-md text-gray-500 md:mt-0 hover:text-blue-600 focus:outline-none focus:shadow-outline"
                           href="/">BİZE ULAŞIN</a>

                    </nav>
                    <div v-if="canLogin" class="hidden lg:flex lg:flex-0 lg:justify-end p-6 text-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="items-center block px-8 py-2.5 text-base font-medium text-center text-blue-600 transition duration-500 ease-in-out transform border-2 border-blue-600 shadow-lg rounded-xl hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-3"
                        >Yönetim Paneli <span aria-hidden="true">&rarr;</span>
                        </Link
                        >

                        <template v-else>
                            <a href="login"
                               class="items-center block px-8 py-2.5 text-base font-medium text-center text-blue-600 transition duration-500 ease-in-out transform border-2 border-blue-600 shadow-lg rounded-xl hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-3">
                                Giriş Yap
                            </a>
                            <a href="register"
                               class="items-center block px-10 py-3 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl shadow-lg hover:bg-blue-700 hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Kayıt Ol
                            </a>
                        </template>
                    </div>
                </div>
            </div>
        </nav>
    </header>

</template>

<script setup>
import {computed, ref} from 'vue'
import {

    PopoverGroup,

} from '@headlessui/vue'
import {
    Bars3Icon,
} from '@heroicons/vue/24/outline'
import {Link} from "@inertiajs/vue3";

const mobileMenuOpen = ref(false)

defineProps({
    indexPage: {
        type: Boolean,
    },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
})


</script>
