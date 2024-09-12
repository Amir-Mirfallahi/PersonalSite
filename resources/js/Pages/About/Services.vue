<script setup>
import {ref} from "vue";

defineProps({
    title: {
        type: String,
        default: "What I can do for you"
    },
    subtitle: {
        type: String,
        default: "Services"
    }
})
const config = ref([
    {
        title: "Full Stack Website with Django",
        description: "I create comprehensive web solutions with Django, providing robust and secure backend functionality combined with a dynamic frontend."
    },
    {
        title: "Full Stack Website with Laravel",
        description: "I develop full stack websites using Laravel, ensuring high performance and scalability for your web applications."
    },
    {
        title: "WordPress Development",
        description: "I build and customize WordPress websites, leveraging plugins like Elementor to create user-friendly, dynamic sites that are easy to manage."
    },
    {
        title: "Full Stack Website with Next.js/Nuxt.js",
        description: "I build full stack websites with Next.js and Nuxt.js, offering seamless server-side rendering and optimized performance for a superior user experience."
    },
    {
        title: "Machine Learning (Coming Soon)",
        description: "Stay tuned for machine learning solutions, where I will bring intelligent data analysis and predictive capabilities to your projects."
    },

])
</script>

<template>
    <section class="py-28">
        <div class="container">
            <div class="row mb-16 items-end">
                <div class="sm:col-8 order-2 sm:order-1">
                    <!-- Section Title -->
                    <h2 class="text-4xl lg:text-5xl font-secondary font-medium -mt-[6px] text-center sm:text-left">
                        {{ title }}</h2>
                </div>
                <div class="sm:col-4 order-1 sm:order-2 block mb-4 sm:mb-0 text-center sm:text-right">
                    <!-- Section Subtitle -->
                    <span class="font-secondary text-2xl leading-none text-white/75">{{ subtitle }}</span>
                </div>
            </div>
            <!-- Services Row -->
            <div class="row g-0">
                <template v-for="(service, index) in config">
                    <!-- Service 1 -->
                    <div class="lg:col-4 md:col-6" data-aos="fade-in">
                        <div class="border border-white/5 hover:border-white/40 p-8 h-full rounded-lg">
                            <!-- Service Number -->
                            <span class="text-lg font-secondary font-medium text-white/75">/ 0{{ ++index }}</span>
                            <!-- Service Title -->
                            <h3 class="my-6 text-3xl">{{ service.title }}</h3>
                            <!-- Service Description -->
                            <div class="text-white/75 md:text-lg">
                                {{ service.description }}
                            </div>
                        </div>
                    </div>
                    <!-- Icon -->
                    <div v-if="index !== config.length" class="lg:col-4 md:col-6 block md:hidden lg:block">
                        <div class="p-8 h-full flex items-center content-center py-6">
                            <svg class="mx-auto opacity-10 animate-spin h-10 w-10 md:h-16 md:w-16"
                                 style="animation-duration:6000ms" xmlns="http://www.w3.org/2000/svg" width="62"
                                 height="62"
                                 viewBox="0 0 23 23" fill="none">
                                <path
                                    d="M23 12.9234H14.9568L20.6503 18.6169L18.6169 20.6051L12.9234 14.9116V23L10.0766 22.9548V14.9116L4.3831 20.6503L2.39489 18.6169L8.08841 12.9234H0V10.0766H8.08841L2.39489 4.33792L4.3831 2.3497L10.0766 8.08841V0H12.9234V8.08841L18.6621 2.3497L20.6503 4.33792L14.9568 10.0766H23V12.9234Z"
                                    fill="white"></path>
                            </svg>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
</template>
