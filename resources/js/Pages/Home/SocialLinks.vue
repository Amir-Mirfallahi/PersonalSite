<script setup>
import {ref} from "vue";
import "vue-spinner/src/MoonLoader.vue";


const loading = ref(true)
const socialMedia = ref([])

defineProps({
    hideOnScroll: Boolean
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
    <div
        :class="`lg:[&.scrolled]:opacity-0 lg:[&.scrolled]:translate-x-8 w-1/4 transition-all duration-300 text-right text-sm hidden lg:block ${hideOnScroll && 'scrolled'}`">
        <div class="col-12 flex justify-center items-center gap-4">
            <moon-loader :loading="loading"/>
            <a v-if="!loading && socialMedia.length !== 0" v-for="medium in socialMedia" :key="medium"
               :href="medium.url" class="flex justify-center items-center flex-wrap" target="__blank">
                <i :class="`pi pi-${medium.name} text-2xl`"></i>
            </a>
        </div>
    </div>
</template>
