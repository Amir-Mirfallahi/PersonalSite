<script setup>
import {Link} from "@inertiajs/vue3";
import "vue-spinner/src/RotateLoader.vue"
import ProjectListing from "@/Components/Global/ProjectListing.vue";


defineProps({
    title: {
        type: String,
        default: "Recent Works"
    },
    subtitle: {
        type: String,
        default: "Present"
    },
    header: {
        type: Boolean,
        default: true
    },
    customClass: String,
    projects: {
        type: Array,
        default: []
    }
})



</script>

<template>
    <section :class="`py-28 ${customClass}`">
        <div class="container">
            <div v-if="header" class="row mb-16 items-end">
                <div class="sm:col-8 order-2 sm:order-1">
                    <!-- Section Title -->
                    <h2 class="text-4xl lg:text-5xl font-secondary font-medium -mt-[6px] text-center sm:text-left">
                        {{ title }}</h2>
                </div>
                <div class="sm:col-4 order-1 sm:order-2 block mb-4 sm:mb-0 text-center sm:text-right">
                    <!-- Section Subtitle -->
                    <span class="font-secondary text-2xl leading-none text-white/75">{{ subtitle }}</span>
                </div>
            </div>
            <div class="row md:gx-4 gy-4">
                <p v-if="projects.length === 0">No project found...</p>
                <ProjectListing v-if="projects.length !== 0" v-for="project in projects" :key="project.id"
                                :project="project"/>
            </div>
            <slot />
        </div>
    </section>
</template>
