<template>
    <v-container
        id="dashboard"
        fluid
        tag="section"
    >
        <v-row>
            <v-col
                cols="12"
                sm="6"
                lg="4"
            >
                <v-card
                    class="mx-auto"
                    elevation="3"
                    subtitle="prepend and append"
                    title="Tüm Öğrenciler"
                >
                    <template v-slot:prepend>
                        <v-avatar color="blue-darken-2">
                            <v-icon icon="mdi-account-school-outline"></v-icon>
                        </v-avatar>
                    </template>
                    <template v-slot:append>
                        <v-avatar color="primary">
                            <v-avatar class="text-h6 text-white">
                              {{ getStudentCount('student') }}
                            </v-avatar>
                        </v-avatar>
                    </template>
                    <v-card-text>
                        {{users.length}}
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</v-card-text>
                </v-card>
            </v-col>

            <v-col
                cols="12"
                sm="6"
                lg="4"
            >
                <v-card
                    class="mx-auto"
                    elevation="3"
                    subtitle="prepend and append"
                    title="Tüm Öğretmenler"
                >
                    <template v-slot:prepend>
                        <v-avatar color="blue-darken-2">
                            <v-icon icon="mdi-human-male-board"></v-icon>
                        </v-avatar>
                    </template>
                    <template v-slot:append>
                        <v-avatar color="primary">
                            <v-avatar class="text-h6 text-white">
                                {{ getStudentCount('teacher') }}
                            </v-avatar>
                        </v-avatar>
                    </template>
                    <v-card-text>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</v-card-text>
                </v-card>
            </v-col>

            <v-col
                cols="12"
                sm="6"
                lg="4"
            >
                <v-card
                    class="mx-auto"
                    elevation="3"
                    subtitle="prepend and append"
                    title="Tüm Kullanıcılar"
                >
                    <template v-slot:prepend>
                        <v-avatar color="blue-darken-2">
                            <v-icon icon="mdi-account-group"></v-icon>
                        </v-avatar>
                    </template>
                    <template v-slot:append>
                        <v-avatar color="primary">
                            <v-avatar class="text-h6 text-white">
                                {{ users.length }}
                            </v-avatar>
                        </v-avatar>
                    </template>
                    <v-card-text>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</v-card-text>
                </v-card>
            </v-col>

            <v-col
                cols="12"
                md="6"
            >
                <v-card
                    class="mx-auto"
                    elevation="1"
                    subtitle="prepend and append"
                    title="Bölümler"
                >
                    <v-card-text>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab deserunt expedita veritatis voluptatum. Aut dolore harum in quisquam quod.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet aspernatur blanditiis consequuntur corporis earum possimus quod sit, sunt tempore?</v-card-text>
                    <template v-slot:prepend>
                        <v-avatar color="blue-darken-2">
                            <v-icon icon="mdi-alarm"></v-icon>
                        </v-avatar>
                    </template>
                </v-card>

            </v-col>

            <v-col
                cols="12"
                md="6"
            >
                <v-card
                    class="mx-auto"
                    elevation="1"
                    subtitle="prepend and append"
                    title="Tüm Kullanıcılar"
                >
                    <v-card-text>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab deserunt expedita veritatis voluptatum. Aut dolore harum in quisquam quod.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet aspernatur blanditiis consequuntur corporis earum possimus quod sit, sunt tempore?</v-card-text>
                    <template v-slot:prepend>
                        <v-avatar color="blue-darken-2">
                            <v-icon icon="mdi-alarm"></v-icon>
                        </v-avatar>
                    </template>
                </v-card>

            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import usersMixin from "@/Admin/mixins/usersMixin";
export default {
    mixins: [usersMixin],
    data () {
        return {
            users: [],
            student: null,
            teacher: null,
        }
    },
    methods: {
        getStudentCount(s) {
            return this.users.filter(p => p.role === s).length
        }
    },

}
</script>
