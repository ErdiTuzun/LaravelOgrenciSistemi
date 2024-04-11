<template>
    <div class="text-subtitle-2 mt-4 mb-2">OLANAKLAR //Todo</div>

    <v-expansion-panels variant="accordion">
        <v-expansion-panel
            v-for="i in 3"
            :key="i"
            text="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium at, eligendi ipsam laboriosam laudantium neque laudantium adipisicing laudantium consectetur adipisicinge ligendi?"
            title="Bilgisayar Labaratuvarları"
        ></v-expansion-panel>
    </v-expansion-panels>
</template>
