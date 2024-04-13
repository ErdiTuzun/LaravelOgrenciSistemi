<template>
    <DashboardHeader></DashboardHeader>

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ pageName }}:</h1> <p>{{ section.name }}</p>
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
                <v-form v-model="valid" @submit.prevent="updateSection">
                    <v-container>
                        <v-row>

                            <v-col
                                cols="12"
                                md="7"
                            >
                                <v-text-field
                                    v-model="section.name"
                                    :counter="10"
                                    :rules="nameRules"
                                    label="Bölüm Adı"
                                    required
                                ></v-text-field>
                            </v-col>
                            <v-col
                                cols="12"
                                md="2"
                            >
                                <v-label>Bölüm Durumu</v-label>
                                <v-checkbox
                                    v-model="section.status"
                                    color="success"
                                    label="Aktif"
                                    :value="1"
                                    @change="statusChecked"
                                ></v-checkbox>
                            </v-col>
                            <v-col
                                cols="12"
                                md="3"
                            >
                                <v-radio-group v-model="section.language" inline label="Bölüm Dili">
                                    <v-radio label="Türkçe" value="turkish" true-value="turkish"></v-radio>
                                    <v-radio label="İngilizce" value="english"></v-radio>
                                </v-radio-group>
                            </v-col>

                            <v-col
                                cols="12"
                                md="12"
                            >
                                <v-textarea
                                    v-model="section.description"
                                    :counter="10"
                                    label="Bölüm Açıklaması"
                                    required
                                ></v-textarea>
                            </v-col>
                            <v-btn class="mt-2"
                                   :loading="loading"
                                   color="success" type="submit" block>Bölümü Güncelle
                            </v-btn>
                            <div id="successMessage">
                            </div>
                            <div>
                                <transition name="fade">
                                    <!--Todo Alert Ortaklaştırılacak!!! -->
                                    <v-alert v-if="successShow" @input="successShow = false" class="alert-container" type="success"
                                             dismissible>
                                        Güncelleme Başarılı!
                                    </v-alert>
                                </transition>

                                <transition name="fade" v-for="(messages, field) in errorData" :key="field">
                                    <v-alert class="alert-container" type="error" dismissible>
                                        {{ messages.join(', ') }}
                                    </v-alert>
                                </transition>
                            </div>
                            <v-row>
                            </v-row>
                        </v-row>
                    </v-container>
                </v-form>
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
    name: 'SectionEdit',
    data() {
        return {
            pageName: "Bölüm Düzenle",
            successShow: false,
            loadingAlert: false,
            errorData: {},
            section: {
                name: '',
                description: '',
                status: 1,
                language: 'turkish',
            },
            loading: false,

            valid: false,
            nameRules: [
                value => {
                    if (value) return true

                    return 'Ad alanı zorunludur.'
                },
                value => {
                    if (value?.length <= 40) return true

                    return 'Ad 10 karakterden az olmalıdır.'
                },
            ],
        }
    },

    created() {
        const sectionId = window.location.pathname.split('/').pop(); // URL'den ID'yi al
        axios.get(`/api/admin/sections/${sectionId}`)
            .then(response => {
                this.section = response.data; // Bölüm verilerini bileşen verisine ata
            })
            .catch(error => {
                console.error('Bölüm verilerini alırken bir hata oluştu:', error);
            });
    },
    methods: {
        statusChecked() {
            this.section.status = this.section.status ? 1 : 0;
        },
        async submit(event) {
            this.loading = true

            const results = await event

            this.loading = false
        },

        updateSection() {
            this.loadingAlert = true;
            const sectionId = window.location.pathname.split('/').pop(); // URL'den ID'yi al
            const updatedSection = {
                id: sectionId, // Bölüm ID'si
                name: this.section.name,
                description: this.section.description,
                status: this.section.status,
                language: this.section.language,
            };
            axios.put('/api/admin/sections/' + sectionId, updatedSection)
                .then(res => {
                    if (res.status === 200) {
                        this.successShow = true;
                        setTimeout(() => {
                            this.successShow = false;
                            window.location.href = '/admin/sections'; // Başka bir sayfaya yönlendirme
                        }, 2500);
                    }
                })
                .catch(err => {
                    if (err.response.status === 422) {
                        this.errorData = err.response.data.errors;
                        setTimeout(() => {
                            this.errorData = false;
                        }, 2500);
                    } else {
                        console.error(err);
                    }
                })
                .finally(() => {
                    this.loadingAlert = false;
                });
        }

    },
}
</script>

<style>
.alert-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
}
</style>
