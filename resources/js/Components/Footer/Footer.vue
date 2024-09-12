<script setup>
import {Link} from '@inertiajs/vue3'
import Copyright from "@/Components/Footer/Copyright.vue";
import {ref} from "vue";


const loading = ref(true)
const socialMedia = ref([])

axios(route("social-media.index"))
    .then((res) => {
        socialMedia.value = res.data;
    })
    .catch(e => console.log(e))
    .finally(() => {
        loading.value = false
    })
</script>

<template>
    <section class="pt-28 pb-20 bottom-0 z-[1]">
        <div class="mb-16 overflow-hidden">
            <Link class='footer-cta block text-4xl md:text-5xl font-secondary font-medium mb-8'
                  :href='route("contact")'>
                <!-- Scrolling Line 1 -->
                <div class="animated-line animated-line-one mb-5">
                    <div class="line-block">
              <span class="mr-20 md:mr-24">
                <span class="cta-text">Looking to hire?</span>
                  <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Need professional help?</span>
<i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
                        </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Interested in my work?</span>
<i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
                        </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Let's work together!</span>
<i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
                        </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Want to collaborate?</span>
<i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
                        </span>
                    </div>
                    <div class="line-block-copy">
              <span class="mr-20 md:mr-24">
                <span class="cta-text">Seeking expertise?</span>
               <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Let's get started on your project!</span>
               <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Ready to hire me?</span>
                <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Have a project in mind?</span>
                <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Contact me for your next project!</span>
                <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                    </div>
                </div>
                <!-- Scrolling Line 2 -->
                <div class="animated-line animated-line-two">
                    <div class="line-block">
              <span class="mr-20 md:mr-24">
                <span class="cta-text">Let's create something amazing together.</span>
                <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Looking for quality work?</span>
                <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Need a skilled professional?</span>
                <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Let's discuss your ideas.</span>
                <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Ready to elevate your project?</span>
                <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                    </div>
                    <div class="line-block-copy">
              <span class="mr-20 md:mr-24">
                <span class="cta-text">Hire me for exceptional results.</span>
                <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Your project, my expertise.</span>
                <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Let's bring your vision to life.</span>
                <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Interested in working with me?</span>
                <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                        <span class="mr-20 md:mr-24">
                <span class="cta-text">Let's make it happen.</span>
                <i class="pi pi-arrow-right inline-block ml-10 md:ml-16 cta-icon"></i>
              </span>
                    </div>
                </div>
            </Link>
        </div>
        <div class="container">
            <div class="row">
                <div class="md:col-6 text-center md:text-left mb-4">
                    <!-- Social Links -->
                    <ul class="inline-flex flex-wrap justify-center md:justify-start gap-x-6">
                        <rotate-loader :loading="loading" />
                        <li v-if="!loading && socialMedia.length !== 0" v-for="medium in socialMedia" :key="medium.name" class="inline-block hover:opacity-75 transition-op duration-300">
                            <a :href="medium.url" class="link">
                                <i :class="`pi pi-${medium.name} text-lg`"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="md:col-6 text-center md:text-right mb-4">
                    <!-- Footer Menu -->
                    <ul class="inline-flex flex-wrap justify-center md:justify-end gap-x-6">
                        <li class="inline-block hover:opacity-75 transition-op duration-300">
                            <Link class='link' :href='route("contact")'>Contact</Link>
                        </li>
                        <li class="inline-block hover:opacity-75 transition-op duration-300">
                            <Link class='link' :href='route("about")'>About</Link>
                        </li>
                        <li class="inline-block hover:opacity-75 transition-op duration-300">
                            <Link class='link' :href='route("projects")'>Projects</Link>
                        </li>
                    </ul>
                </div>
                <Copyright />
            </div>
        </div>
    </section>
</template>
