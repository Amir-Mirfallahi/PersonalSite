<script setup>

import HomeLayout from "@/Layouts/HomeLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Pagination from "@/Components/Global/Pagination.vue";
import ProjectsList from "@/Pages/Projects/ProjectsList.vue";


const breadcrumb = [
    {name: "Home", link: route('home')},
    {name: "Projects", link: route('projects')}
]

defineProps({
    projects: {
        type: Array,
        default: [],
    }
})
</script>

<template>
    <HomeLayout title="Projects">
        <PageHeader title="Recent Works" :subtitle="`${projects.data.length} - Present`" :breadcrumb="breadcrumb"/>
        <ProjectsList :header="false" :projects="projects.data" custom-class="bg-white text-dark rounded-b-2xl">
            <!-- Pagination if it is in projects page -->
            <Pagination :links="projects?.meta.links" custom-class="bg-white text-dark rounded-b-2xl"/>
        </ProjectsList>
    </HomeLayout>
</template>
