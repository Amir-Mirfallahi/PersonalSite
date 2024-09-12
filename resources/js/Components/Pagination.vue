<script setup>
import {Link} from "@inertiajs/vue3";
defineProps({
    links: Array
})
</script>

<template>
    <nav class="text-center mt-4">
        <Link v-for="link in links" preserveScroll :href="link.url" :key="link.url" v-html="link.label"
              :class="`inline-block py-2 px-3 rounded-lg text-gray-200 text-xs ${link.active ? 'bg-gray-950' : ' '}
              ${!link.url ? '!text-gray-500 cursor-not-allowed ' : 'hover:bg-gray-950'}`"></Link>
    </nav>
</template>
