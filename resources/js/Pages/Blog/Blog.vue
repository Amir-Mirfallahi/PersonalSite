<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import PostListings from "@/Pages/Blog/PostListings.vue";
import PostListing from "@/Pages/Blog/PostListing.vue";
import Pagination from "@/Components/Global/Pagination.vue";


const breadcrumb = [
    {name: "Home", link: route('home')},
    {name: "Blog", link: route('blog')}
]
defineProps({
    posts: {
        type: Array,
        default: []
    }
})
</script>

<template>
    <HomeLayout title="Blog">
        <PageHeader title="My weekly thoughts" :subtitle="`Blog (${posts.data.length})`" :breadcrumb="breadcrumb"/>
        <PostListings>
            <p v-if="posts.length === 0">Sorry we couldn't find any post</p>
            <PostListing v-if="posts.data.length !== 0" v-for="post in posts.data" :key="post.slug" :post="post"/>
            <Pagination :links="posts.meta.links" />
        </PostListings>
    </HomeLayout>
</template>
