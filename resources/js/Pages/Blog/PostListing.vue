<script setup>
import {Link} from "@inertiajs/vue3";
defineProps({
    post: Object
})

</script>

<template>
    <div class="lg:col-4 sm:col-6 init-delay" data-aos="fade-up-sm" data-aos-duration="500" style="--lg-delay:0ms;--md-delay:0ms;--sm-delay:0ms">
        <article class="relative group text-center">
            <div class="relative overflow-hidden rounded-lg mb-8">
                <!-- Blog Post Image -->
                <img :alt="post?.title" loading="lazy" width="620" height="500" class="max-h-[400px] duration-700 group-hover:scale-110 group-hover:-rotate-1 object-cover w-full rounded-lg group-hover:brightness-75 bg-light/20" :src="post?.imageUrl" />
            </div>
            <div class="px-2 sm:px-6 transition-all duration-500 group-hover:opacity-60">
                <!-- Blog Post Tags and Date -->
                <div class="flex flex-wrap items-center justify-center mb-4 space-x-5">
                    <span class="inline-block text-sm rounded-full bg-[#efefef] px-3 py-1 capitalize">{{post?.category.name}}</span>
                    <span class="opacity-75 text-sm">{{ post?.created_at}}</span>
                </div>
                <!-- Blog Post Title -->
                <h3 class="text-xl md:text-2xl leading-tight">
                    <Link class='stretched-link' :href='route("blog.show", post?.slug)'>
                        {{ post?.title }}
                    </Link>
                </h3>
            </div>
        </article>
    </div>
</template>
