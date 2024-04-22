<template>hpj
    <div class="v-layout--full-height">
        <!-- Sidebar -->
        <sidebar></sidebar>

        <!-- Content -->
            <slot></slot>

        <!-- Footer -->
        <Footer></Footer>
    </div>
</template>

<script>
import DashboardHeader from "@/Pages/DashboardHeader.vue";
import Sidebar from "@/Admin/components/Dashboard/Sidebar.vue";
import Footer from "@/Admin/components/Dashboard/Footer.vue";

export default {
    name: 'AdminLayout',
    components: {Footer, Sidebar, DashboardHeader},
};
</script>

<style>
/* İstediğiniz özel CSS stillerini buraya ekleyebilirsiniz */
</style>
