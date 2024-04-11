<template>
    <DashboardHeader></DashboardHeader>
    <div class="min-h-full">
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ pageName }}</h1>
            </div>
            <v-progress-linear
                bg-color="pink-lighten-2"
                color="primary"
                model-value="100"
            ></v-progress-linear>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <!-- Your content -->
                <DashboardContent></DashboardContent>
            </div>
        </main>
    </div>
    </template>

<script>
import DashboardHeader from "@/Pages/DashboardHeader.vue";
import ProfileDropdown from "@/Admin/components/ProfileDropdown.vue";
import DashboardContent from "@/Admin/components/DashboardContent.vue";

export default {
    // Todo Dynamic Page Title
    components: {DashboardContent, ProfileDropdown, DashboardHeader},
    name: 'Yönetim Paneli',

    data() {
        return {
            pageName: 'Dashboard',
            user: null,
        }
    },


}

</script>
