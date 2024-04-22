<template>
    <AdminLayout>
        <template #default>
            <div class="mx-auto max-w-7xl mt-lg-12 py-6 sm:px-6 lg:px-8">
                <!-- Your content -->
                <DashboardContent></DashboardContent>
            </div>
        </template>
    </AdminLayout>
</template>

<script>
import DashboardHeader from "@/Pages/DashboardHeader.vue";
import ProfileDropdown from "@/Admin/components/ProfileDropdown.vue";
import DashboardContent from "@/Admin/components/DashboardContent.vue";
import Sidebar from "@/Admin/components/Dashboard/Sidebar.vue";
import Layout from "@/Admin/components/Dashboard/Layout.vue";
import AdminLayout from "@/Admin/Layout/AdminLayout.vue";

export default {
    // Todo Dynamic Page Title
    components: {AdminLayout, Layout, Sidebar, DashboardContent, ProfileDropdown, DashboardHeader},
    name: 'Yönetim Paneli',

    data() {
        return {
            pageName: 'Dashboard',
            user: null,
        }
    },


}

</script>

<style>
.full-width {
    width: 100%;
}

.full-height {
    height: 100vh; /* 100 viewport height */
}
</style>
