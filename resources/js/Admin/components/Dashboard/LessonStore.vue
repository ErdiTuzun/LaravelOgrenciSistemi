<template xmlns="http://www.w3.org/1999/html">
    <v-form v-model="valid" @submit.prevent="lessonStore">
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
                    {{sections}}<br>
                    {{selectedSectionIds}}
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
                       color="success" type="submit" block>Bölümü Kaydet
                </v-btn>
                <div id="successMessage">
                </div>
                <div>
                    <transition name="fade">
                        <!--Todo Alert Ortaklaştırılacak!!! -->
                        <v-alert v-if="successShow" @input="successShow = false" class="alert-container" type="success"
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
</template>

<script>


import sections from "@/Pages/Sections.vue";

export default {

    data() {
        return {
            successShow: false,
            loadingAlert: false,
            errorData: {},
            sections: [],
            selectedSectionIds: [],
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
        axios.get('/api/admin/sections')
            .then(response => {
                this.sections = response.data.map(section => ({ id: section.id, name: section.name }));
                console.log(this.sections)
            })
            .catch(error => {
                console.error('Bölümleri alırken bir hata oluştu:', error);
            });
    },

    methods: {
        async submit(event) {
            this.loading = true

            const results = await event

            this.loading = false
        },
        lessonStore() {
            this.loadingAlert = true;

            // selectedSectionIds değişkeni ile kontrol et
            if (!Array.isArray(this.selectedSectionIds)) {
                console.error('Seçilen bölümler bir dizi olmalıdır.');
                return;
            }
            if (this.selectedSectionIds.length === 0) {
                console.error('En az bir bölüm seçmelisiniz.');
                return;
            }

            const newLesson = {
                name: this.lesson.name,
                description: this.lesson.description,
                credit: this.lesson.credit,
                code: this.lesson.code,
                // selectedSectionIds değişkenini kullan
                section_ids: this.selectedSectionIds,
            }
            axios.post('/api/admin/lesson/store', newLesson).then(res => {
                if (res.status === 200) {
                    this.successShow = true;
                    setTimeout(() => {
                        this.successShow = false;
                        window.location.href = '/admin/lessons'
                    }, 2500);

                }
            }).catch(err => {
                if (err.response.status === 422) {
                    this.errorData = err.response.data.errors;
                    setTimeout(() => {
                        this.errorData = false;
                    }, 2500);
                } else {
                    // Diğer hata durumları
                    console.error(err);
                }
            }).finally(() => {
                this.loadingAlert = false;
            });
        },
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
