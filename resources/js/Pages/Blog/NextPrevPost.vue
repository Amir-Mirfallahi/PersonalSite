<script setup>
import {onMounted, ref} from "vue"


const prevPost = ref()
const nextPost = ref()

const {currentPostId} = defineProps({
    currentPostId: Number
})

onMounted(async () => {
    // get previous post
    if (currentPostId !== 1) {
        await axios(route("posts.show", currentPostId - 1))
            .then((res) => {
                prevPost.value = res.data
            })
            .catch();
    }
    // get next post
    await axios(route("posts.show", currentPostId + 1))
        .then((res) => {
            nextPost.value = res.data
        })
        .catch();
})
</script>

<template>
    <section class="py-28 bg-white text-dark rounded-b-2xl overflow-hidden">
        <div class="container">
            <div class="mb-20">
                <h2 class="text-4xl lg:text-5xl font-secondary font-medium -mt-[6px] text-center">Keep Reading</h2>
            </div>
            <div class="row gy-2 sm:gy-4 justify-center">
                <div class="xl:col-6 lg:col-8 md:col-10" v-if="prevPost">
                    <div class="relative group flex items-center z-10">
                        <div
                            class="shrink-0 relative overflow-hidden rounded sm:rounded-lg h-[4.5rem] w-[4.5rem] sm:h-28 sm:w-28 self-start pointer-events-none">
                            <img alt="You have no idea how much better you can feel!" loading="lazy" width="300"
                                 height="300"
                                 class="duration-500 group-hover:scale-110 group-hover:-rotate-1 object-cover w-full h-full rounded sm:rounded-lg group-hover:brightness-75 bg-light/20"
                                 :src="prevPost.imageUrl"/>
                        </div>
                        <div class="grow pl-4 sm:pl-7 transition-all duration-500 group-hover:opacity-60">
                            <span
                                class="absolute right-0 sm:-right-1/4 top-0 leading-[0.65] text-[25vh] -z-10 opacity-[0.015] select-none">PREV</span>
                            <div class="flex flex-wrap items-center mb-4 space-x-5">
                                <span class="inline-block text-sm rounded-full bg-[#efefef] px-3 py-1 capitalize">{{
                                        prevPost.category.name
                                    }}</span>
                                <span class="opacity-75 text-sm">{{ prevPost.created_at }}</span>
                            </div>
                            <h3 class="text-lg sm:text-2xl leading-snug">
                                <a class='stretched-link' :href='route("blog.show", prevPost.slug)'>
                                    {{ prevPost.title }}
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="lg:col-12"></div>
                <div class="xl:col-6 lg:col-8 md:col-10" v-if="nextPost">
                    <div class="relative group flex items-center z-10">
                        <div class="grow pr-4 sm:pr-7 transition-all duration-500 group-hover:opacity-60">
                            <span
                                class="absolute left-0 sm:-left-1/4 top-0 leading-[0.65] text-[25vh] -z-10 opacity-[0.015] select-none">NEXT</span>
                            <div class="flex flex-wrap items-center justify-end mb-4 space-x-5">
                                <span class="opacity-75 text-sm">{{ nextPost.created_at }}</span>
                                <span
                                    class="inline-block text-sm rounded-full bg-[#efefef] px-3 py-1 capitalize">{{
                                        nextPost.category.name
                                    }}</span>
                            </div>
                            <h3 class="text-lg sm:text-2xl leading-snug text-right">
                                <a class='stretched-link' :href='route("blog.show", nextPost.slug)'>
                                    {{ nextPost.title }}
                                </a>
                            </h3>
                        </div>
                        <div
                            class="shrink-0 relative overflow-hidden rounded sm:rounded-lg h-[4.5rem] w-[4.5rem] sm:h-28 sm:w-28 self-start pointer-events-none">
                            <img alt="Ways to improve usability and accessibility" loading="lazy" width="300"
                                 height="300"
                                 class="duration-500 group-hover:scale-110 group-hover:-rotate-1 object-cover w-full h-full rounded sm:rounded-lg group-hover:brightness-75 bg-light/20"
                                 :src="nextPost.imageUrl"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>

</style>
