<template>
    <DashboardHeader></DashboardHeader>

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
    <div class="elevation-5 mt-5 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 relative overflow-x-auto shadow-md sm:rounded-lg">
        <v-row>
            <v-col
                cols="9">
                <SectionStore></SectionStore>
            </v-col>
            <v-col
                cols="3">
                <Amenities></Amenities>
            </v-col>
        </v-row>
    </div>

</template>
<script>
import Dashboard from "@/Pages/Dashboard.vue";
import DashboardHeader from "@/Pages/DashboardHeader.vue";
import SectionStore from "@/Admin/components/Dashboard/SectionStore.vue";
import Register from "@/Pages/Auth/Register.vue";
import UserRegisterComponent from "@/Admin/components/Dashboard/UserRegisterComponent.vue";
import Amenities from "@/Admin/components/Dashboard/Amenities.vue";

export default {
    components: {SectionStore, Amenities, UserRegisterComponent, Register, DashboardHeader, Dashboard},
    data() {
        return {
            pageName: "Yeni Bölüm Ekle",
        }
    },
}
</script>

<style scoped>

</style>
