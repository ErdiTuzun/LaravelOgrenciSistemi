<template>
    <DashboardHeader></DashboardHeader>

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ pageName }}</h1>
            <p>Ders: <strong>{{ lesson.name }}</strong></p>
        </div>
        <v-progress-linear
            bg-color="pink-lighten-2"
            color="primary"
            model-value="100"
        ></v-progress-linear>
    </header>
    <div
        class="elevation-5 mt-5 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 relative overflow-x-auto shadow-md sm:rounded-lg">
        <v-row>
            <v-col
                cols="9">
                <v-form v-model="valid" @submit.prevent="updateLesson">
                    <v-container>
                        <v-row>
                            <v-col
                                cols="12"
                                md="4"
                            >
                                <v-text-field
                                    v-model="lesson.name"
                                    :counter="10"
                                    :rules="nameRules"
                                    label="Ders Adı"
                                    required
                                ></v-text-field>
                            </v-col>
                            <v-col
                                cols="12"
                                md="4"
                            >
                                <v-text-field
                                    v-model="lesson.credit"
                                    label="Ders Kredisi Örn: 3-9"
                                    required
                                ></v-text-field>
                            </v-col>
                            <v-col
                                cols="12"
                                md="4"
                            >
                                <v-text-field
                                    v-model="lesson.code"
                                    :counter="5"
                                    label="Ders Kodu"
                                    required
                                ></v-text-field>
                            </v-col>
                            <v-col
                                cols="12"
                                md="12"
                            >
                                <v-select
                                    v-model="selectedSectionIds"
                                    :items="sections"
                                    item-title="name"
                                    item-value="id"
                                    label="Bölümler"
                                    multiple
                                    chips
                                    dense
                                ></v-select>
                            </v-col>

                            <v-col
                                cols="12"
                                md="12"
                            >
                                <v-textarea
                                    v-model="lesson.description"
                                    :counter="10"
                                    label="Bölüm Açıklaması"
                                    required
                                ></v-textarea>
                            </v-col>

                            <v-btn class="mt-2"
                                   :loading="loading"
                                   color="success" type="submit" block>Dersi Güncelle
                            </v-btn>
                            <div id="successMessage">
                            </div>
                            <div>
                                <transition name="fade">
                                    <!--Todo Alert Ortaklaştırılacak!!! -->
                                    <v-alert v-if="successShow" @input="successShow = false" class="alert-container"
                                             type="success"
                                             dismissible>
                                        İşlem başarıyla tamamlandı!
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
import UserRegisterComponent from "@/Admin/components/Dashboard/UserRegisterComponent.vue";
import Amenities from "@/Admin/components/Dashboard/Amenities.vue";
export default {
    components: {Amenities, UserRegisterComponent, DashboardHeader, Dashboard},
    data() {
        return {
            pageName: "Dersi Düzenle",
            successShow: false,
            loadingAlert: false,
            errorData: {},
            sections: [],
            selectedSectionIds: [],
            section_ids: [],
            lesson: {
                name: '',
                description: '',
                credit: '',
                code: '',
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
        const lessonId = window.location.pathname.split('/').pop();
        axios.get(`/api/admin/lessons/${lessonId}`)
            .then(res => {
                this.lesson = res.data;
                axios.get('/api/admin/sections')
                    .then(response => {
                        this.sections = response.data.map(section => ({id: section.id, name: section.name}));
                        this.selectedSectionIds = this.lesson.sections.map(section => section.id);
                    })
                    .catch(error => {
                        console.error('Bölümleri alırken bir hata oluştu:', error);
                    });
            })
            .catch(error => {
                console.error('Ders verileri alırken bir hata oluştu:', error);
            });
    },
    methods: {
        async submit(event) {
            this.loading = true

            const results = await event

            this.loading = false
        },
        updateLesson() {
            this.loadingAlert = true;
            const lessonId = window.location.pathname.split('/').pop(); // URL'den ID'yi al
            const updatedLesson = {
                id: lessonId, // Dersin ID'si
                name: this.lesson.name,
                description: this.lesson.description,
                credit: this.lesson.credit,
                section: this.lesson.section,
                code: this.lesson.code,
                section_ids: this.selectedSectionIds
            };
            axios.put('/api/admin/lessons/' + lessonId, updatedLesson)
                .then(res => {
                    if (res.status === 200) {
                        this.successShow = true;
                        setTimeout(() => {
                            this.successShow = false;
                            window.location.href = '/admin/lessons'; // Dersler sayfasına yönlendir
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
    }
}
</script>

<style>
.alert-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
}
</style>
