<template>
    <DashboardHeader></DashboardHeader>


    <div class="elevation-5 mt-5 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 relative overflow-x-auto shadow-md sm:rounded-lg">
        <a href="/admin/user/register"><v-btn prepend-icon="mdi-account-plus" class="mb-2 bg-primary" variant="outlined">Yeni Kullanıcı Ekle</v-btn></a>


        <v-card flat>
            <v-card-title class="d-flex align-center pe-2">
                <v-icon icon="mdi-video-input-component"></v-icon> &nbsp
                Kullanıcıları Listele

                <v-spacer></v-spacer>

                <v-text-field
                    v-model="search"
                    density="compact"
                    label="Arama Yap"
                    prepend-inner-icon="mdi-magnify"
                    variant="solo-filled"
                    flat
                    hide-details
                    single-line
                ></v-text-field>
            </v-card-title>
            <v-divider></v-divider>

            <v-data-table
                :items="users"
                items-per-page-text="Sayfa başına öğe:"
                page-text="{0}-{1} arası gösteriliyor {2}"
                :headers="headers"
                item-key="id"
                :search="search">
                <template v-slot:item.photo="{ item }">
                    <img v-if="item.photo !== null" :src="item.photo" style="max-width: 80px; max-height: 80px;" alt="Fotoğraf">
                    <span v-else>Fotoğraf yok</span>
                </template>
                <template v-slot:item.actions="{ item }">
                    <v-btn size="small" color="success" class="mr-2" icon="mdi-pencil"></v-btn>
                    <v-btn size="small" color="red" icon="mdi-delete" @click.prevent="deleteUser"></v-btn>
                </template>
            </v-data-table>
        </v-card>

    </div>

</template>
<script>
import { Link } from '@inertiajs/vue3'
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Dashboard from "@/Pages/Dashboard.vue";
import DashboardHeader from "@/Pages/DashboardHeader.vue";
import usersMixin from "@/Admin/mixins/usersMixin";

export default {
    components: {DashboardHeader, Dashboard, AuthenticatedLayout},
    mixins: [usersMixin],
    data() {
        return {
            pageName: "Kullanıcılar",
            users: [],
            search: '',
            headers: [
                { title:'Id', text: 'ID', value: 'id', sortable: true, width: 50 },
                { title:'Fotoğraf', text: 'photo', value: 'photo', sortable: true, class:'v-data-table-header'},
                { title:'Adı', text: 'Name', value: 'name', sortable: true },
                { title:'E-Mail', text: 'Email', value: 'email', sortable: true},

                { title:'Telefon', text: 'phone', value: 'phone', sortable: true},
                { title:'Role', text: 'role', value: 'role', sortable: true},

                { title: 'İşlemler', text: 'Actions', value: 'actions', sortable: false },
            ],


        }
    },

    methods: {
        editUser(user) {
            // Kullanıcıyı düzenleme işlemi
            console.log('Edit user:', user);
        },
        deleteUser(id) {
            // Kullanıcıyı silme işlemi
            console.log('Delete user:', id);
        },
    }
}
</script>

<style>
.v-data-table-header {
    background-color: red !important;
}
</style>
