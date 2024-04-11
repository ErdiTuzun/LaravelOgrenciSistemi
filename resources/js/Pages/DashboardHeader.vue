<template>
    <Disclosure as="nav" class="bg-gray-800" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="/admin/dashboard">
                        <img class="h-15 w-16" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"/>
                        </a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'rounded-md px-3 py-2 text-sm font-medium']" :aria-current="item.current ? 'page' : undefined">{{ item.name }}</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">

                        <!-- Profile dropdown -->
                        <ProfileDropdown class="mt-10"></ProfileDropdown>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <DisclosureButton class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-0.5" />
                        <span class="sr-only">Menu</span>
                        <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
                        <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
                    </DisclosureButton>
                </div>
            </div>
        </div>


        <DisclosurePanel class="md:hidden">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <DisclosureButton v-for="item in navigation" :key="item.name" as="a" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block rounded-md px-3 py-2 text-base font-medium']" :aria-current="item.current ? 'page' : undefined">{{ item.name }}</DisclosureButton>
            </div>
            <div class="border-t border-gray-700 pb-3 pt-4">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="/Admin/profile/uploads/no-profile-picture.png" alt="" />
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">{{ user.name }}</div>
                        <div class="text-sm font-medium leading-none text-gray-400">{{ user.email }}</div>
                    </div>
                    <button type="button" class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5" />
                        <span class="sr-only">View notifications</span>
                        <BellIcon class="h-6 w-6" aria-hidden="true" />
                    </button>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <DisclosureButton v-for="item in userNavigation" :key="item.name" as="a" :href="item.href" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">{{ item.name }}</DisclosureButton>
                </div>
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>
<script setup>
import {Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItems} from "@headlessui/vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import {Bars3Icon, BellIcon, XMarkIcon} from "@heroicons/vue/24/outline";
import {mapMutations} from "vuex";
import ProfileDropdown from "@/Admin/components/ProfileDropdown.vue";

const user = {
    name: 'Tom Cook',
    email: 'tom@example.com',

}

const navigation = [
    { name: 'DASHBOARD', href: '/admin/dashboard', current: false },
    { name: 'KULLANICILAR', href: '/admin/users', current: false },
    { name: '1 - Öğrenci & Öğrenci Kayıt Crud', href: '#', current: false },
    { name: 'BÖLÜMLER', href: '/admin/sections', current: false },
    { name: 'DERSLER', href: '/admin/lessons', current: false },
    { name: 'Landing Page Setup', href: '#', current: false },
    { name: 'Site Ayarları', href: '#', current: false },
]
const userNavigation = [
    { name: 'Your Profile', href: '#' },
    { name: 'Settings', href: '#' },
    { name: 'Sign out', href: '#' },
]
</script>
