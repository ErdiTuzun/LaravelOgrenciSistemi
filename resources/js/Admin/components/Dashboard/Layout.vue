<template>
    <sidebar></sidebar>
    <div>
        <v-toolbar
            class="full-width"
            style="border-radius: 0px;background: #41295a; background: -webkit-linear-gradient(to right, #2F0743, #41295a); background: linear-gradient(to left, #2F0743, #41295a);"
            dark
            prominent
        >
            <v-app-bar-nav-icon></v-app-bar-nav-icon>

            <v-toolbar-title>Vuetify</v-toolbar-title>

            <v-spacer></v-spacer>

            <ProfileDropdown class="mt-10"></ProfileDropdown>
            <v-btn icon>
                <v-icon>mdi-export</v-icon>
            </v-btn>
        </v-toolbar>
    </div>
</template>
<script setup lang="ts">
import ProfileDropdown from "@/Admin/components/ProfileDropdown.vue";
import Sidebar from "@/Admin/components/Dashboard/Sidebar.vue";
</script>
