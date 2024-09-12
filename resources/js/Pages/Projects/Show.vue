<script setup>

import HomeLayout from "@/Layouts/HomeLayout.vue";
import ProjectDetail from "@/Pages/Projects/ProjectDetail.vue";

defineProps({
    project: {
        type: Object,
        default: {}
    },
    socialMedia: {
        type: Object,
        default: {}
    },
})
</script>

<template>
    <HomeLayout title="Show">
        <ProjectDetail :project="project" :social-media="socialMedia" />
    </HomeLayout>
</template>
