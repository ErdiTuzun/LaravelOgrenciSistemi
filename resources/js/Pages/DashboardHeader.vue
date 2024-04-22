<template>
    <!-- Disclosure bileşenini kullanarak sidebar -->
    <v-layout>

    </v-layout>
</template>

<script setup>
import ProfileDropdown from '@/Admin/components/ProfileDropdown.vue'

// Sidebar navigasyon verileri
const navigation = [
    { name: 'DASHBOARD', href: '/admin/dashboard', current: false },
    { name: 'KULLANICILAR', href: '/admin/users', current: false },
    { name: '1 - Öğrenci & Öğrenci Kayıt Crud', href: '#', current: false },
    { name: 'BÖLÜMLER', href: '/admin/sections', current: false },
    { name: 'DERSLER', href: '/admin/lessons', current: false },
    { name: 'Landing Page Setup', href: '#', current: false },
    { name: 'Site Ayarları', href: '#', current: false }
]
</script>

<style>
/* İhtiyaç duyulan özel stiller buraya eklenebilir */
</style>
