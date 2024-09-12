<script setup>
import {Link} from "@inertiajs/vue3";
import "vue-spinner/src/RotateLoader.vue"
import {ref} from "vue";
import ProjectListing from "@/Components/Global/ProjectListing.vue";


const projects = ref([])
const isLoading = ref(true)

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
})
const url = route("projects.index") + "?count=3"
axios(url)
    .then((res) => {
        projects.value = res.data;
    })
    .catch(e => console.error(e))
    .finally(() => isLoading.value = false)


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
                <rotate-loader :laoding="isLoading" color="white" height="200%"/>
                <p v-if="!isLoading && projects.length === 0">No project found...</p>
                <ProjectListing v-if="!isLoading && projects.length !== 0" v-for="project in projects" :key="project.id"
                                :project="project"/>
            </div>
            <!-- All Projects Button -->
            <div v-if="route().current() !== 'projects'" class="text-center mt-16">
                <Link class='button' :href='route("projects")'>
                    <span>All Works</span>
                </Link>
            </div>
        </div>
    </section>
</template>
