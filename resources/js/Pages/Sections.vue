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
        <a href="/admin/sections/store"><v-btn prepend-icon="mdi-account-plus" class="mb-2 bg-primary" variant="outlined">Yeni Bölüm Ekle</v-btn></a>


        <v-card flat>
            <v-card-title class="d-flex align-center pe-2">
                <v-icon icon="mdi-video-input-component"></v-icon> &nbsp
                Bölümleri Listele

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
                :items="sections"
                items-per-page-text="Sayfa başına öğe:"
                page-text="{0}-{1} arası gösteriliyor {2}"
                :headers="headers"
                item-key="id"
                :search="search">
                <template v-slot:item.status="{ item }">
                    <span v-if="item.status !== 0">Aktif</span>
                    <span v-else>Pasif</span>
                </template>
                <template v-slot:item.language="{ item }">
                    <span v-if="item.language !== 'english'">Türkçe</span>
                    <span v-else>İngilizce</span>
                </template>
                <template v-slot:item.actions="{ item }">
                    <v-btn size="small" color="success" class="mr-2" icon="mdi-pencil" @click="editSection(item.id)"></v-btn>
                    <v-btn size="small" color="red" icon="mdi-delete" @click.prevent="sectionDelete (item.id)"></v-btn>
                </template>
            </v-data-table>
            <v-alert v-if="successShow" @input="successShow = false" class="alert-container" type="success"
                     dismissible>
                İşlem başarıyla tamamlandı!
            </v-alert>
        </v-card>

    </div>

</template>
<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Dashboard from "@/Pages/Dashboard.vue";
import DashboardHeader from "@/Pages/DashboardHeader.vue";

export default {
    components: {DashboardHeader, Dashboard, AuthenticatedLayout},
    name: 'Bölümler',
    data() {
        return {
            dialog: false,
            itemIdToDelete: null,
            successShow: false,
            pageName: "Bölümler",
            sections: [],
            search: '',
            headers: [
                { title:'ID', text: 'ID', value: 'id', sortable: true, width: 50 },
                { title:'BÖLÜM ADI', text: 'name', value: 'name', sortable: true, class:'v-data-table-header', width: 200},
                { title:'AÇIKLAMA', text: 'description', value: 'description', sortable: true },
                { title:'DURUMU', text: 'status', value: 'status', sortable: true, width: 50},
                { title:'BÖLÜM DİLİ', text: 'language', value: 'language', sortable: true,  width: 150},
                { title: 'İşlemler', text: 'actions', value: 'actions', sortable: false,  width: 120},
            ],


        }
    },
    mounted() {
        this.refreshTable();
    },
    methods: {
        editSection(sectionId) {
            window.location.href = '/admin/sections/edit/' + sectionId;
        },
        sectionDelete (id) {
            axios.delete('/api/admin/sections/' + id).then(res => {
                if (res.status === 200) {
                    const index = this.sections.findIndex(item => item.id === id)
                    this.sections.splice(index,1);
                    this.successShow = true;
                    setTimeout(() => {
                        this.successShow = false;
                    }, 2500);
                }
            })
                .catch(error => {
                    console.log('Silme işlemi başarısız oldu:', error)
                })
            .finally(() => {
                this.dialog = false;
            });
            this.refreshTable();
        },
        refreshTable() {
            axios.get('/api/admin/sections')
                .then(response => {
                    this.sections = response.data;
                })
                .catch(error => {
                    console.error('Bölümleri alırken bir hata oluştu:', error);
                });
        }

    }
}
</script>

<style>
.v-data-table-header {
    background-color: red !important;
}

.alert-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
}
</style>
