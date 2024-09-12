<script setup>
import {Link} from '@inertiajs/vue3'

</script>

<template>
    <section class="py-28 bg-white text-dark rounded-b-2xl">
        <div class="container">
            <div class="row mb-16 items-end">
                <div class="sm:col-8 order-2 sm:order-1">
                    <!-- Section Title -->
                    <h2 class="text-black text-4xl lg:text-5xl font-secondary font-medium -mt-[6px] text-center sm:text-left">
                        My weekly thoughts
                    </h2>
                </div>
                <div class="sm:col-4 order-1 sm:order-2 block mb-4 sm:mb-0 text-center sm:text-right">
                    <!-- Section Subtitle -->
                    <span class="font-secondary text-2xl leading-none text-black/75">Blog</span>
                </div>
            </div>
            <!-- Blog Posts -->
            <div class="row md:gx-4 gy-5">
                <!-- Blog Post 1 -->
                <div class="lg:col-4 sm:col-6 init-delay" data-aos="fade-up-sm" data-aos-duration="500"
                     style="--lg-delay:0ms;--md-delay:0ms;--sm-delay:0ms">
                    <article class="relative group text-center">
                        <div class="relative overflow-hidden rounded-lg mb-8">
                            <!-- Blog Post Image -->
                            <img alt="You have no idea how much better you can feel!" loading="lazy" width="620"
                                 height="500"
                                 class="duration-700 group-hover:scale-110 group-hover:-rotate-1 object-cover w-full rounded-lg group-hover:brightness-75 bg-light/20"
                                 src="images/blog/01.jpg"/>
                        </div>
                        <div class="px-2 sm:px-6 transition-all duration-500 group-hover:opacity-60">
                            <!-- Blog Post Tags and Date -->
                            <div class="flex flex-wrap items-center justify-center mb-4 space-x-5">
                                <span class="inline-block text-sm rounded-full bg-[#efefef] px-3 py-1 capitalize">lifestyle</span>
                                <span class="opacity-75 text-sm">25 May / 2023</span>
                            </div>
                            <!-- Blog Post Title -->
                            <h3 class="text-xl md:text-2xl leading-tight">
                                <Link class='stretched-link' href='blog-single.html'>You have no idea how much better
                                    you can feel!
                                </Link>
                            </h3>
                        </div>
                    </article>
                </div>

                <!-- Blog Post 2 -->
                <div class="lg:col-4 sm:col-6 init-delay" data-aos="fade-up-sm" data-aos-duration="500"
                     style="--lg-delay:75ms;--md-delay:75ms;--sm-delay:75ms">
                    <article class="relative group text-center">
                        <div class="relative overflow-hidden rounded-lg mb-8">
                            <!-- Blog Post Image -->
                            <img alt="The Role of a Developer in Creating Communities" loading="lazy" width="620"
                                 height="500"
                                 class="duration-700 group-hover:scale-110 group-hover:-rotate-1 object-cover w-full rounded-lg group-hover:brightness-75 bg-light/20"
                                 src="images/blog/09.jpg"/>
                        </div>
                        <div class="px-2 sm:px-6 transition-all duration-500 group-hover:opacity-60">
                            <!-- Blog Post Tags and Date -->
                            <div class="flex flex-wrap items-center justify-center mb-4 space-x-5">
                                <span class="inline-block text-sm rounded-full bg-[#efefef] px-3 py-1 capitalize">post elements</span>
                                <span class="opacity-75 text-sm">23 May / 2023</span>
                            </div>
                            <!-- Blog Post Title -->
                            <h3 class="text-xl md:text-2xl leading-tight">
                                <Link class='stretched-link' href='blog-single.html'>The Role of a Developer in Creating
                                    Communities
                                </Link>
                            </h3>
                        </div>
                    </article>
                </div>

                <!-- Blog Post 3 -->
                <div class="lg:col-4 sm:col-6 init-delay" data-aos="fade-up-sm" data-aos-duration="500"
                     style="--lg-delay:150ms;--md-delay:0ms;--sm-delay:0ms">
                    <article class="relative group text-center">
                        <div class="relative overflow-hidden rounded-lg mb-8">
                            <!-- Blog Post Image -->
                            <img alt="Ways to improve usability and accessibility" loading="lazy" width="620"
                                 height="500"
                                 class="duration-700 group-hover:scale-110 group-hover:-rotate-1 object-cover w-full rounded-lg group-hover:brightness-75 bg-light/20"
                                 src="images/blog/12.jpg"/>
                        </div>
                        <div class="px-2 sm:px-6 transition-all duration-500 group-hover:opacity-60">
                            <!-- Blog Post Tags and Date -->
                            <div class="flex flex-wrap items-center justify-center mb-4 space-x-5">
                                <span
                                    class="inline-block text-sm rounded-full bg-[#efefef] px-3 py-1 capitalize">tech</span>
                                <span class="opacity-75 text-sm">13 May / 2023</span>
                            </div>
                            <!-- Blog Post Title -->
                            <h3 class="text-xl md:text-2xl leading-tight">
                                <Link class='stretched-link' href='blog-single.html'>Ways to improve usability and
                                    accessibility
                                </Link>
                            </h3>
                        </div>
                    </article>
                </div>
            </div>
            <!-- All Posts Button -->
            <div v-if="route().current() !== 'blog'" class="text-center mt-16">
                <Link class='button button-dark' href='/blog'>
                    <span>All Posts</span>
                </Link>
            </div>
        </div>
    </section>
</template>
