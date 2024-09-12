<script setup>
import { ref } from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/swiper-bundle.css';

const swiperRef = ref(null);

const slides = ref([
    {
        content: "The Next.js theme is simply amazing! It provides a clean and modern design that perfectly fits my projects. The code is well-structured and easy to customize. I highly recommend it.",
        author: "Harry Thompson",
        role: "Web Developer"
    },
    {
        content: "As a UX designer, I appreciate the attention to detail in the Next.js theme. It offers a seamless user experience with its smooth animations and intuitive layout. It has definitely elevated the overall look and feel of my websites.",
        author: "George Harrison",
        role: "UX Designer"
    },
    {
        content: "I've used many Next.js themes before, but it stands out from the rest. It has a solid foundation, responsive design, and excellent performance. It saved me a lot of development time and allowed me to deliver high-quality websites to my clients.",
        author: "Michael Johnson",
        role: "Frontend Developer"
    },
    {
        content: "It has been a game-changer for my marketing projects. Its SEO-friendly structure, fast loading times, and well-organized code have improved the overall performance of my websites. It's a reliable choice for anyone looking to boost their online presence.",
        author: "Emily Brown",
        role: "Digital Marketer"
    },
    {
        content: "I'm impressed with the Next.js theme's versatility. It caters to a wide range of projects, from simple portfolios to complex web applications. The extensive documentation and helpful support team make it even better. It is my go-to choice for Next.js development.",
        author: "David Wilson",
        role: "Freelancer"
    }
]);

const props = defineProps({
    title: {
        type: String,
        default: 'What Clients Say'
    },
    subtitle: {
        type: String,
        default: 'Reviews'
    }
});

const onSwiper = (swiper) => {
    swiperRef.value = swiper;
};
</script>

<template>
    <section class="py-28 bg-white text-dark rounded-b-2xl" data-aos="fade-in">
        <div class="container">
            <div class="row mb-16 items-end">
                <div class="col-12 text-center">
                    <!-- Section Subtitle -->
                    <span class="font-secondary block text-2xl leading-none text-black/75 mb-4">{{ subtitle }}</span>
                    <!-- Section Title -->
                    <h2 class="text-4xl lg:text-5xl font-secondary font-medium -mt-[6px]">{{ title }}</h2>
                </div>
            </div>
            <div class="row justify-center">
                <div class="lg:col-8">
                    <div class="relative md:px-20 text-center">
                        <!-- Swiper Container -->
                        <swiper
                            :slides-per-view="1"
                            :space-between="10"
                            :loop="true"
                            @swiper="onSwiper"
                            class="swiper"
                        >
                            <!-- Swiper Wrapper -->
                            <swiper-slide v-for="(slide, index) in slides" :key="index" class="swiper-slide">
                                <div class="text-center">
                                    <!-- Slide Content -->
                                    <div class="text-lg mb-4 bg-light/10 py-8 px-5 md:px-10 rounded-lg">
                                        {{ slide.content }}
                                    </div>
                                    <!-- Testimonial Author -->
                                    <p class="text-2xl font-medium mb-1">{{ slide.author }}</p>
                                    <!-- Testimonial Author's Role -->
                                    <p class="text-black/75">{{ slide.role }}</p>
                                </div>
                            </swiper-slide>
                        </swiper>
                        <!-- Slide Prev Button -->
                        <button
                            class="slide-prev md:absolute px-3 md:px-0 mt-14 md:mt-0 left-0 top-1/2 -translate-y-1/2"
                            title="Slide Prev"
                            @click="swiperRef?.slidePrev()"
                        >
                            <img alt="arrow-left" loading="lazy" width="39" height="31" class="inline-block invert rotate-180" src="images/arrow-right.svg"/>
                        </button>
                        <!-- Slide Next Button -->
                        <button
                            class="slide-next md:absolute px-3 md:px-0 mt-14 md:mt-0 right-0 top-1/2 -translate-y-1/2"
                            title="Slide Next"
                            @click="swiperRef?.slideNext()"
                        >
                            <img alt="arrow-right" loading="lazy" width="39" height="31" class="inline-block invert" src="images/arrow-right.svg"/>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.swiper-button-next,
.swiper-button-prev {
    background-image: url("images/arrow-right.svg");
}
</style>
