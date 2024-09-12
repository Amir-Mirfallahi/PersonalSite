<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({
    links: Array,
})
</script>

<template>
        <nav class="text-center mt-4 p-4">
        <Link v-for="link in links" :href="link.url || ''" :key="link.label" v-html="link.label" :class="'inline-block py-2 px-3 rounded-lg text-gray-900 text-xs' + (link.active ? 'bg-gray-200' : ' ') + (!link.url ? '!text-gray-500 cursor-not-allowed ' : 'hover:bg-gray-200')"></Link>
    </nav>
</template>
