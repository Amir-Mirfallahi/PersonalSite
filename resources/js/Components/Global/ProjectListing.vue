<script setup>
import {Link} from "@inertiajs/vue3";

const {project} = defineProps({
    project: {
        type: Object,
        required: true,
    },
})
project.services = project.services.replace(/,/g, ' ');

</script>

<template>
    <div class="lg:col-4 sm:col-6">
        <div data-aos="" class="rounded-lg overflow-hidden relative group h-full aos-init aos-animate">
            <!-- overlay -->
            <span class="absolute h-full group-[.aos-animate]:h-0 w-full z-30 duration-700 left-0 bottom-0"
                  style="background-color: #67a94c; transition-delay: 0ms"></span>

            <!-- image -->
            <img loading="lazy" width="520" height="550"
                 class="scale-150 group-[.aos-animate]:scale-100 duration-700 group-hover:!scale-125 object-cover w-full h-full bg-light/20"
                 :alt="project.title" :src="project.imageUrl">

            <!-- content -->
            <div class="absolute inset-0 z-20 flex justify-center flex-col p-8">
                            <span
                                class="absolute h-full w-full duration-300 left-0 bottom-0 opacity-0 bg-overlay group-hover:opacity-100 -z-10 pointer-events-none"></span>

                <div
                    class="flex items-center justify-between opacity-0 -mt-1 group-hover:opacity-100 group-hover:mt-0 duration-300 group-hover:delay-300">
                    <!-- category -->
                    <span
                        class="uppercase text-white bg-white/25 text-sm font-light tracking-wider px-3 py-1 rounded-full backdrop-blur-lg">{{ project.services }}</span>

                    <!-- link -->
                    <Link class="stretched-link" :href="route('projects.show', project.id)">
                        <i class="pi pi-arrow-right inline-block rotate-[135deg]"></i>
                    </Link>
                </div>
                <div class="text-center mt-auto">
                    <h3 class="text-4xl font-secondary font-semibold text-white mb-2 relative overflow-hidden">
                        <!-- title -->
                        <span class="block translate-y-full group-hover:translate-y-0 duration-300">{{project.title}}</span>
                    </h3>
                    <p class="text-white font-light relative overflow-hidden">
                        <!-- subtitle -->
                        <span
                            class="block translate-y-full group-hover:translate-y-0 duration-300 group-hover:delay-150">{{project.client}}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
