<script setup>
import {ref} from "vue";
import "vue-spinner/src/MoonLoader.vue";

const loading = ref(true)
const socialMedia = ref([])

defineProps({
    title: {
        type: String,
        default: "As Featured By"
    },
    customClass: String,
})
axios(route("social-media.index"))
    .then((res) => {
        socialMedia.value = res.data;
    })
    .catch(e => console.log(e))
    .finally(() => {
        loading.value = false
    })
</script>

<template>
    <section :class="customClass || 'pt-28 lg:pb-10 overflow-hidden'">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-10">
                    <!-- Section Title -->
                    <h2 class="text-3xl font-secondary font-medium text-center" data-aos="fade">Available At</h2>
                </div>
                <div class="col-12 flex justify-center items-center gap-6 md:gap-8 lg:gap-12">
                    <moon-loader :loading="loading"/>
                    <p class="text-white text-lg" v-if="!loading && socialMedia.length === 0">Nothing found!</p>
                    <a v-if="!loading && socialMedia.length !== 0" v-for="medium in socialMedia" :key="medium"
                       :href="medium.url" class="flex justify-center items-center flex-wrap" target="__blank">
                        <i :class="`pi pi-${medium.name} text-5xl`"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
