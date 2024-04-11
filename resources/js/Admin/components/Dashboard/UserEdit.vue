<template xmlns="http://www.w3.org/1999/html">
    <v-form v-model="valid" @submit.prevent="userRegister">
        <v-container>
            <v-row>
                <v-col
                    cols="12"
                    md="4"
                >
                    <v-text-field
                        v-model="user.name"
                        :counter="10"
                        :rules="nameRules"
                        label="Adı ve Soyadı"
                        required
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="4"
                >
                    <v-text-field
                        v-model="user.username"
                        :counter="10"
                        :rules="nameRules"
                        label="Kullanıcı Adı"
                        required
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="4"
                >
                    <v-text-field
                        v-model="user.email"
                        label="E-mail"
                        :rules="[emailRules.required, emailRules.email]"
                        required
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="4"
                >
                    <v-text-field
                        v-model="user.password"
                        :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                        :rules="[rules.required, rules.min]"
                        :type="show1 ? 'text' : 'password'"
                        hint="En az 8 karakter"
                        label="Parola Doğrula"
                        name="input-10-1"
                        counter
                        required
                        @click:append="show1 = !show1"
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="4"
                >
                    <v-text-field
                        v-model="user.password_confirmation"
                        :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                        :rules="[rules.required, rules.min]"
                        :type="show2 ? 'text' : 'password'"
                        class="input-group--focused"
                        hint="En az 8 karakter"
                        label="Parola Doğrula"
                        name="input-10-2"
                        counter
                        required
                        @click:append="show2 = !show2"
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="4"
                >
                    <v-text-field
                        v-model="user.phone"
                        type="number"
                        label="Telefon Numarası"
                        :rules="phoneRules"
                        required
                    ></v-text-field>
                </v-col>
                <v-col
                    cols="12"
                    md="8"
                >
                    <v-select
                        v-model="user.selectedRole"
                        :items="roles"
                        item-title="name"
                        item-value="value"
                        label="Rol ve Yetkiler"
                        variant="outlined"
                        required
                    ></v-select>
                </v-col>

                <v-col class="" cols="4" md="4">
                    <v-card class="mx-auto" rounded="0">
                        <v-img max-height="100"
                               src="https://i.pinimg.com/736x/48/1e/4d/481e4dd2b014c599f8ad36afcdd623d9.jpg" cover>
                            <v-row>
                                <v-col class="ml-8" cols="12" md="12">
                                    <v-card elevation="10" class="bg-transparent">
                                        <v-card-title class="text-white">{{ user.name }}</v-card-title>
                                        <v-card-subtitle class="text-white">{{ user.email }}</v-card-subtitle>
                                        <v-card-subtitle class="text-white">{{ user.phone }}</v-card-subtitle>
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-img>
                    </v-card>
                </v-col>
                <v-btn class="mt-2"
                       :loading="loading"
                       color="success" type="submit" block>Kullanıcıyı Kaydet
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

export default {

    data() {
        return {
            successShow: false,
            loadingAlert: false,
            errorData: {},
            roles: [
                {id: 3, name: 'Öğrenci', value: 'student'},
                {id: 2, name: 'Öğretmen', value: 'teacher'},
                {id: 1, name: 'Admin', value: 'admin'}
            ],
            user: {
                name: '',
                username: '',
                email: '',
                password: '',
                password_confirmation: '',
                phone: '',
                address: '',
                selectedRole: null,

            },

            loading: false,

            valid: false,
            emailRules: {
                required: value => !!value || 'Zorunlu alan.',
                counter: value => value.length <= 20 || 'En fazla 20 karakter geçerlidir.',
                email: value => {
                    const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    return pattern.test(value) || 'Geçersiz E-mail.'
                },
            },
            phoneRules: [
                v => !!v || 'Telefon numarası gereklidir.',
                v => (/\d{10}/).test(v) || 'Geçersiz telefon numarası.'
            ],
            nameRules: [
                value => {
                    if (value) return true

                    return 'Ad alanı zorunludur.'
                },
                value => {
                    if (value?.length <= 10) return true

                    return 'Ad 10 karakterden az olmalıdır.'
                },
            ],
            show1: false,
            show2: true,
            rules: {
                required: value => !!value || 'Zorunlu.',
                min: v => v.length >= 8 || 'En az 8 karakter',
                passwordMatch: () => (`Girdiğiniz e-posta ve şifre eşleşmiyor`),
            },
        }
    },

    methods: {
        async submit(event) {
            this.loading = true

            const results = await event

            this.loading = false
        },
        userRegister() {
            this.loadingAlert = true
            const newUser = {
                name: this.user.name,
                username: this.user.username,
                email: this.user.email,
                password: this.user.password,
                password_confirmation: this.user.password_confirmation,
                phone: this.user.phone,
                role: this.user.selectedRole,
            }
            axios.post('/api/admin/user/register', newUser).then(res => {
                if (res.status === 200) {
                    this.successShow = true;
                    setTimeout(() => {
                        this.successShow = false;
                        window.location.href = '/admin/users'
                    }, 2500);

                }
            }).catch(err => {
                if (err.response.status === 422) {
                    this.errorData = err.response.data.errors;
                    setTimeout(() => {
                        this.errorData = false;
                    }, 3000);
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
