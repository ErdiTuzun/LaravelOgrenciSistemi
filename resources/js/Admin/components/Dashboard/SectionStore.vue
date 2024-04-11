<template xmlns="http://www.w3.org/1999/html">
    <v-form v-model="valid" @submit.prevent="sectionStore">
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

    methods: {
        statusChecked() {
            this.section.status = this.section.status ? 1 : 0;
        },
        async submit(event) {
            this.loading = true

            const results = await event

            this.loading = false
        },
        sectionStore() {
            this.loadingAlert = true
            const newUser = {
                name: this.section.name,
                description: this.section.description,
                status: this.section.status,
                language: this.section.language,
            }
            axios.post('/api/admin/sections', newUser).then(res => {
                if (res.status === 200) {
                    this.successShow = true;
                    setTimeout(() => {
                        this.successShow = false;
                        window.location.href = '/admin/sections'
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
