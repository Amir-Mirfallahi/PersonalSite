<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import RotateLoader from "vue-spinner/src/RotateLoader.vue";
import axios from "axios";

const posts = ref([]);
const isLoading = ref(true);

onMounted(async () => {
    try {
        const res = await axios(`${route("posts.index")}?count=3`);
        posts.value = res.data;
    } catch (e) {
        console.error(e);
    } finally {
        isLoading.value = false;
    }
});
</script>

<template>
    <section class="py-28 bg-white text-dark rounded-b-2xl">
        <div class="container">
            <div class="row mb-16 items-end">
                <div class="sm:col-8 order-2 sm:order-1">
                    <!-- Section Title -->
                    <h2
                        class="text-black text-4xl lg:text-5xl font-secondary font-medium -mt-[6px] text-center sm:text-left"
                    >
                        My weekly thoughts
                    </h2>
                </div>
                <div
                    class="sm:col-4 order-1 sm:order-2 block mb-4 sm:mb-0 text-center sm:text-right"
                >
                    <!-- Section Subtitle -->
                    <span
                        class="font-secondary text-2xl leading-none text-black/75"
                        >Blog</span
                    >
                </div>
            </div>
            <!-- Blog Posts -->
            <div class="row md:gx-4 gy-5">
                <rotate-loader
                    :loading="isLoading"
                    v-if="isLoading"
                ></rotate-loader>
                <!-- Blog Post 1 -->
                <div
                    class="lg:col-4 sm:col-6 init-delay"
                    data-aos="fade-up-sm"
                    data-aos-duration="500"
                    style="--lg-delay: 0ms; --md-delay: 0ms; --sm-delay: 0ms"
                    v-if="!isLoading && posts.length !== 0"
                    v-for="post in posts"
                >
                    <article class="relative group text-center">
                        <div class="relative overflow-hidden rounded-lg mb-8">
                            <!-- Blog Post Image -->
                            <img
                                :alt="post.slug"
                                loading="lazy"
                                width="620"
                                height="500"
                                class="duration-700 max-h-[400px] group-hover:scale-110 group-hover:-rotate-1 object-cover w-full rounded-lg group-hover:brightness-75 bg-light/20"
                                :src="post.imageUrl"
                            />
                        </div>
                        <div
                            class="px-2 sm:px-6 transition-all duration-500 group-hover:opacity-60"
                        >
                            <!-- Blog Post Tags and Date -->
                            <div
                                class="flex flex-wrap items-center justify-center mb-4 space-x-5"
                            >
                                <span
                                    class="inline-block text-sm rounded-full bg-[#efefef] px-3 py-1 capitalize"
                                    >{{ post.category.name }}</span
                                >
                                <span class="opacity-75 text-sm">{{
                                    post.created_at
                                }}</span>
                            </div>
                            <!-- Blog Post Title -->
                            <h3 class="text-xl md:text-2xl leading-tight">
                                <Link
                                    class="stretched-link"
                                    :href="route('blog.show', post.slug)"
                                    >{{ post.title }}
                                </Link>
                            </h3>
                        </div>
                    </article>
                </div>
            </div>
            <!-- All Posts Button -->
            <div v-if="route().current() !== 'blog'" class="text-center mt-16">
                <Link class="button button-dark" href="/blog">
                    <span>All Posts</span>
                </Link>
            </div>
        </div>
    </section>
</template>
