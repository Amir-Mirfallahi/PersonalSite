<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Banner from "@/Pages/Home/Banner.vue";
import AvailableAt from "@/Components/Global/AvailableAt.vue";
import ProjectListings from "@/Components/Global/ProjectListings.vue";
import Process from "@/Pages/Home/Process.vue";
import RecentPosts from "@/Pages/Home/RecentPosts.vue";
</script>

<template>
    <HomeLayout title="Home">
        <Banner />
        <AvailableAt />
        <ProjectListings />
        <Process />
        <RecentPosts />
    </HomeLayout>
</template>
