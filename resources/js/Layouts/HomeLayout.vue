<script setup>
import '../../css/customCss.css'
import {Head} from "@inertiajs/vue3";
import Header from "@/Components/Header/Header.vue";
import Footer from "@/Components/Footer/Footer.vue";

defineProps({
    title: {
        type: String,
        default: 'Home'
    },
})
</script>

<template>
    <Head :title="title"/>
    <Header/>
    <main class="bg-dark relative z-10 pt-[92px] lg:pt-[106px] min-h-[82vh] overflow-hidden">
        <slot></slot>
    <Footer/>
    </main>
</template>
