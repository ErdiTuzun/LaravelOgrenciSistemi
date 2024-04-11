<template>
<v-container
    style="height: 100px"
    fluid
>
<v-row justify="center">
    <v-menu
        min-width="200px"
        rounded
    >
        <template v-slot:activator="{ props }">
            <v-btn
                icon
                v-bind="props">

                <v-avatar>
                    <v-img
                        alt="Profil"
                        v-if="user.photo"
                        :src="user.photo"
                    ></v-img>
                    <v-img
                        alt="Profil"
                        v-if="!user.photo"
                        src="/Admin/profile/uploads/no-image.png"
                    ></v-img>

                </v-avatar>

            </v-btn>
        </template>
        <v-card>
            <v-card-text>
                <div class="text-center" v-if="user">
                    <v-avatar
                        color="brown"
                    >
                    <span class="text-h5">
                    <img v-if="user.photo" :src="user.photo" alt="Profil Resmi"/>
                    <img v-else src="/Admin/profile/uploads/no-image.png" alt="Profil Resmi"/>
                    </span>
                    </v-avatar>
                    <h2>{{ user.name }}</h2>
                    <h2>
                        {{ user.email }}
                    </h2>
                    <v-divider class="my-1"></v-divider>
                    <ResponsiveNavLink :href="route('profile.edit')" as="button">
                        <v-btn variant="text" rounded> Profil Düzenle</v-btn>
                    </ResponsiveNavLink>

                    <v-divider class="my-0"></v-divider>

                    <ResponsiveNavLink method="post" as="button" :href="route('logout')">
                        <v-btn variant="text" rounded> Çıkış Yap</v-btn>
                    </ResponsiveNavLink>
                </div>
            </v-card-text>
        </v-card>
    </v-menu>
</v-row>
</v-container>
</template>
<script>
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";

export default {
    components: {ResponsiveNavLink},
    data() {
        return {
            user: [],
            isLoading: true,


        }
    },
    mounted() {
        axios.get('/admin/userProfile')
            .then(response => {
                this.user = response.data;
            })
            .catch(error => {
                console.error('Kullanıcı bilgilerini alma hatası:', error);
            });
    }
}

</script>
