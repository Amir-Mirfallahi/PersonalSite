<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    title: String,
    breadcrumb: Array,
    subtitle: String
})
</script>

<template>
    <section class="banner bg-white">
        <div class="pt-20 pb-24 page-banner bg-dark rounded-b-2xl relative z-10">
            <div class="container">
                <div class="row items-end" data-aos="fade">
                    <div class="sm:col-8 text-center sm:text-left">
                        <h1 class="text-[2.5rem] leading-[3rem] sm:leading-9 md:text-5xl font-secondary font-medium -mt-[6px] text-center sm:text-left mb-6 sm:mb-8">
                            {{ title }}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ul class="flex items-center justify-center sm:justify-start [&>*:last-child]:pointer-events-none">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round" class="mr-3" style="transform:rotateY(180deg)">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2"></path>
                                        <path d="M19 12h2l-9 -9l-9 9h2v7a2 2 0 0 0 2 2h5.5"></path>
                                        <path d="M16 19h6"></path>
                                        <path d="M19 16l3 3l-3 3"></path>
                                    </svg>
                                </li>
                                <template v-for="(item, index) in breadcrumb" :key="index">
                                    <li>
                                        <Link class='link' :href='item.link'>{{ item.name }}</Link>
                                    </li>
                                    <li v-if="index !== breadcrumb.length - 1">
                                        <span class="px-4">•</span>
                                    </li>
                                </template>
                            </ul>
                        </nav>
                    </div>
                    <div class="sm:col-4 block mt-6 sm:mt-0 text-center sm:text-right">
                        <span class="font-secondary text-2xl leading-none text-white/75">{{ subtitle }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
