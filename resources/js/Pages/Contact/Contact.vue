<script setup>
import {Link} from '@inertiajs/vue3'
import HomeLayout from "@/Layouts/HomeLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import ContactForm from "@/Pages/Contact/ContactForm.vue"

const breadcrumb = [
    {name: "Home", link: route('home')},
    {name: "Contact", link: route('contact')},
]
</script>

<template>
    <HomeLayout title="Contact">
        <PageHeader title="Contact" subtitle="Let's Talk" :breadcrumb="breadcrumb"/>
        <ContactForm/>
    </HomeLayout>
</template>
