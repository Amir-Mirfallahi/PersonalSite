<script setup>
import MarkdownIt from "markdown-it";

const markdown = new MarkdownIt()

defineProps({
    source: {
        type: String,
        default: ""
    },
    _class: {
        type: String,
        default: ""
    }
});
</script>

<template>
<div v-html="markdown.render(source)" :class="_class"></div>
</template>

<style scoped>

</style>
