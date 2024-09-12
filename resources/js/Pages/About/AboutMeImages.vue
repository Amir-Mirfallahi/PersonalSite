<script setup>
import { ref } from 'vue';

const props = defineProps({
    aboutImages: {
        type: Array,
        default: () => [],
    },
});

const swapImageBtnIcon = ref(null);
const rotateValue = ref(0);

const handleClick = () => {
    if (swapImageBtnIcon.value) {
        swapImageBtnIcon.value.style.transform = `rotate(${rotateValue.value + 360}deg)`;
        rotateValue.value += 360;
    }
};
</script>

<template>
    <section class="py-28 bg-white text-dark">
        <div class="container">
            <div class="row justify-center items-center">
                <div
                    class="lg:col-8 md:col-10 text-center lg:text-left"
                    data-aos="fade-up-sm"
                    data-aos-delay="100"
                >
                    <div class="pl-0 lg:pl-8 flex flex-col">
                        <!-- about me -->
                        <div class="order-2 lg:order-1 mb-0 lg:mb-10 mt-10 lg:mt-0">
                            <div class="text-black/75 md:text-lg">
                                Welcome to my website! I'm Amir Mirfallahi, a seasoned full-stack web developer with a
                                deep passion for creating dynamic, efficient, and user-friendly web applications. I have
                                extensive experience with both backend and frontend technologies, including Laravel,
                                Django, Next.js, React, Vue.js, Tailwind CSS, and Bootstrap. My expertise allows me to
                                deliver seamless integration and optimal performance in every project, ensuring that
                                each web application I develop is robust, scalable, and visually appealing.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Simple Image Gallery Below the Text -->
            <div class="row mt-16" data-aos="fade-up-sm" data-aos-delay="200">
                <div class="col-12">
                    <div class="gallery grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <div v-for="aboutImage in aboutImages" :key="aboutImage.imageUrl" class="gallery-item">
                                <img
                                    loading="lazy"
                                    width="300"
                                    height="300"
                                    class="w-full h-auto rounded-lg bg-light/10 transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg hover:brightness-110"
                                    alt="Gallery Image"
                                    :src="aboutImage.imageUrl"
                                />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
