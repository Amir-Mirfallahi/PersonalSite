<script setup>
import markdownit from "markdown-it";


const {project} = defineProps({
    project: {
        type: Object,
        default: {}
    },
    socialMedia: {
        type: Object,
        default: {}
    }
})
const services = project.data.services.split(',')
const badgeColors = ['bg-green-200', 'bg-[#efefef]', 'bg-yellow-200', 'bg-red-200', 'bg-blue-200', 'bg-sky-200' ]
const md = markdownit()
</script>

<template>
    <!-- ================= start of blog-details ================= -->
    <section class="pt-24 pb-28">
        <div class="container">
            <div class="row justify-center">
                <div class="lg:col-8 text-center banner mb-16" data-aos="fade-up-sm">
                    <div class="flex flex-wrap items-center justify-center mb-12 space-x-8">
                        <div class="px-3 flex flex-wrap items-center justify-center space-x-2">
                        <span v-for="service in services" :key="service" :class="`inline-block text-sm rounded-full px-3 py-1 capitalize text-black ${badgeColors[Math.floor(Math.random()*badgeColors.length)]}`">
                            {{ service }}
                        </span>
                        </div>
                        <span class="opacity-75 text-sm">{{ project.data.created_at }}</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl mb-4 !leading-tight">
                        {{ project.data.title }}
                    </h1>
                </div>
                <div class="lg:col-10 mx-auto" data-aos="fade-up-sm" data-aos-delay="100">
                    <div class="h-[460px] bg-black/20 overflow-hidden relative z-10 rounded-lg">
                        <img :alt="project.data.title" loading="lazy" width="1020"
                             height="460" class="w-auto h-[460px] object-cover object-center mx-auto z-10 rounded-lg"
                             :src="project.data.imageUrl"/>
                        <img :alt="project.data.title" width="100" height="100"
                             class="w-full h-[500px] object-cover filter blur-sm absolute top-0 left-0 -z-10 scale-110 opacity-50"
                             :src="project.data.imageUrl"/>
                    </div>
                </div>
                <div class="xl:col-9 lg:col-10 mx-auto" data-aos="fade-in">
                    <div class="sm:flex flex-wrap sm:flex-nowrap w-full pt-20">
                        <div class="sm:order-2 sm:pl-12 xl:pl-24">
                            <article class="content content-light">
                                <div v-html="md.render(project.data.content)"></div>
                            </article>
                        </div>
                        <div class="sm:order-1 w-full sm:w-auto">
                            <div class="sticky top-8">
                                <ul class="text-white mt-10 sm:mt-2 [&>li]:bg-light/10 [&>li]:rounded-lg [&>li]:leading-none [&>li]:mb-3 [&>li:hover]:bg-light/20 flex flex-wrap space-x-5 sm:space-x-0 sm:inline-block items-center justify-center border-t border-b sm:border-none border-light/10 pt-3 sm:pt-0">
                                    <li class="transition-all duration-300" v-for="socialMedium in socialMedia" >
                                        <a :href="socialMedium.url"
                                           target="_blank" rel="noopener noreferrer"
                                           class="h-11 w-11 flex items-center justify-center">
                                            <i :class="`pi pi-${socialMedium.name}`"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= end of blog-details ================= -->
</template>
