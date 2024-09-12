<script setup>

import HomeLayout from "@/Layouts/HomeLayout.vue";
import BlogDetail from "@/Pages/Blog/BlogDetail.vue";
import NextPrevPost from "@/Pages/Blog/NextPrevPost.vue";

defineProps({
    post: {
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
        <BlogDetail :post="post" :social-media="socialMedia" />
        <NextPrevPost :current-post-id="post.data.id" />
    </HomeLayout>
</template>
