<template>
    <v-card style="border-radius: 0;">
        <v-layout>
            <v-navigation-drawer
                style="border-radius: 0;background: #41295a; background: -webkit-linear-gradient(to right, #2F0743, #41295a); background: linear-gradient(to right, #2F0743, #41295a);"
                theme="dark"
                v-model="drawer"
                :rail="rail"
                @click="rail = false"
                permanent
            >
                <v-list v-model:opened="open">
                    <v-list-item prepend-icon="mdi-town-hall"
                                 title="MANAGEMENT"
                                 subtitle="Administrator">
                        <template v-slot:append>
                            <v-btn
                                icon="mdi-chevron-left"
                                variant="text"
                                @click.stop="rail = !rail"
                            ></v-btn>
                        </template>
                    </v-list-item>
                    <v-divider></v-divider>
                    <v-list-item density="default" prepend-icon="mdi-home" title="YÖNETİM PANELİ"
                                 href="/admin/dashboard"></v-list-item>
                    <v-list-item density="default" prepend-icon="mdi-door" title="SİTEYİ GÖRÜNTÜLE"
                                 href="http://localhost:8000"></v-list-item>


                    <v-list-group density="default">
                        <template v-slot:activator="{ props }">
                            <v-list-item
                                v-bind="props"
                                prepend-icon="mdi-account-circle"
                                title="KULLANICILAR"
                            ></v-list-item>
                        </template>

                        <v-list-item density="default">
                            <v-list-item-title class="v-card--hover">
                                <a href="/admin/users" class="">Tüm Kullanıcılar</a>
                            </v-list-item-title>
                        </v-list-item>

                        <v-list-item>
                            <v-list-item-title class="v-card--hover">
                                <a href="/admin/user/register" class="">Yeni Kullanıcı Ekle</a>
                            </v-list-item-title>
                        </v-list-item>
                    </v-list-group>
                    <v-list-group>
                        <template v-slot:activator="{ props }">
                            <v-list-item
                                v-bind="props"
                                prepend-icon="mdi-school-outline"
                                title="BÖLÜMLER"
                            ></v-list-item>
                        </template>

                        <v-list-item>
                            <v-list-item-title class="v-card--hover">
                                <a href="/admin/sections">Tüm Bölümler</a>
                            </v-list-item-title>
                        </v-list-item>

                        <v-list-item>
                            <v-list-item-title class="v-card--hover">
                                <a href="/admin/sections/store" class="">Yeni Bölüm Ekle</a>
                            </v-list-item-title>
                        </v-list-item>
                    </v-list-group>
                    <v-list-group>
                        <template v-slot:activator="{ props }">
                            <v-list-item
                                v-bind="props"
                                prepend-icon="mdi-bookshelf"
                                title="DERSLER"
                            ></v-list-item>
                        </template>

                        <v-list-item>
                            <v-list-item-title class="v-card--hover">
                                <a href="/admin/lessons">Tüm Dersler</a>
                            </v-list-item-title>
                        </v-list-item>

                        <v-list-item>
                            <v-list-item-title class="v-card--hover">
                                <a href="/admin/lesson/store">Yeni Ders Ekle</a>
                            </v-list-item-title>
                        </v-list-item>
                    </v-list-group>
                    <v-list-group>
                        <template v-slot:activator="{ props }">
                            <v-list-item
                                v-bind="props"
                                prepend-icon="mdi-cog"
                                title="SİTE AYARLARI"
                            ></v-list-item>
                        </template>

                        <v-list-item>
                            <v-list-item-title class="v-card--hover">
                                <a href="#">Slayt Yazısı</a>
                            </v-list-item-title>
                        </v-list-item>

                        <v-list-item>
                            <v-list-item-title class="v-card--hover">
                                <a href="#">Bölüm Özellikleri</a>
                            </v-list-item-title>
                        </v-list-item>

                        <v-list-item>
                            <v-list-item-title class="v-card--hover">
                                <a href="#">Tanıtım Videosu</a>
                            </v-list-item-title>
                        </v-list-item>

                        <v-list-item>
                            <v-list-item-title class="v-card--hover">
                                <a href="#">Bölüm Detayları</a>
                            </v-list-item-title>
                        </v-list-item>

                        <v-list-item>
                            <v-list-item-title class="v-card--hover">
                                <a href="#">Öğretim Üyeleri</a>
                            </v-list-item-title>
                        </v-list-item>
                    </v-list-group>
                </v-list>
            </v-navigation-drawer>

            <v-app-bar title="Application bar"
                       style="color:#ffffff; border-radius: 0;background: #41295a; background: -webkit-linear-gradient(to right, #2F0743, #41295a); background: linear-gradient(to left, #2F0743, #41295a);"
            >
                <div class="hidden md:block">
                    <div class="">
                        <v-col cols="4">
                            <ProfileDropdown class="mt-10"></ProfileDropdown>
                        </v-col>
                    </div>
                </div>
            </v-app-bar>
        </v-layout>
    </v-card>
</template>


<style>
.full-height {
    height: 100vh; /* 100 viewport height */
}

.v-list-group {
    --list-indent-size: 0px;
    margin-left: 2px;
    --prepend-width: 10px;
}

.v-list-item-title {
    font-size: 11pt; /* or a length that suits you */
}
</style>

<script>
import {Disclosure} from "@headlessui/vue";
import ProfileDropdown from "@/Admin/components/ProfileDropdown.vue";

export default {
    components: {ProfileDropdown, Disclosure},
    data: () => ({

        drawer: true,
        rail: true,
        open: ['Users'],
        admins: [],
        cruds: [],

    }),
}
</script>

<style>
.full-width {
    width: 100%;
}
</style>
