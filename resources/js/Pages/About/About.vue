<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import AboutMeImages from "@/Pages/About/AboutMeImages.vue";
import Services from "@/Pages/About/Services.vue";
import Testimonials from "@/Pages/About/Testimonials.vue";
import AvailableAt from "@/Components/Global/AvailableAt.vue";

const breadcrumbLinks = [
    {name: 'Home', link: route('home')},
    {name: 'About', link: route('about')}
]
const {aboutImages} = defineProps({
    aboutImages: {
        type: Array,
        default: []
    }
})
</script>

<template>
    <HomeLayout title="About">
        <PageHeader title="About Me" subtitle="Who I am" :breadcrumb="breadcrumbLinks"/>
        <AboutMeImages :about-images="aboutImages.data" />
        <AvailableAt custom-class="pb-24 pt-5 bg-white text-dark overflow-hidden" />
        <Services />
        <Testimonials />
    </HomeLayout>
</template>
