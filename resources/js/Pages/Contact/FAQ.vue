<script setup>
import {ref} from "vue";

const openItemId = ref(0)
const handleItem = (id) => {
    openItemId.value = id
}

const FAQs = [
    {
        title: "How much do your services cost?",
        content: "Full-service projects typically range between $2,750 - $15,000. Contact me for pricing on individual services."
    },
    {
        title: "Do you offer your services separately?",
        content: "Yes. I can provide either just branding, web design or Webflow development services separately to fit around your existing strategy."
    },
    {
        title: "Can you transfer my Wordpress site over to Next.js?",
        content: "Yes. More and more businesses are realising that Next.js is the future of building on the web, which is why I offer rebuilds of existing Wordpress websites in Next.js website."
    },
    {
        title: "How can I get support?",
        content: "Full-service projects typically range between $2,750 - $15,000. Contact me for pricing on individual services."
    },
    {
        title: "Can you help with my existing React/Next.js project?",
        content: "Yes. I offer both consulting and development services for clients with existing Webflow projects. \n Development: $50/day"
    },
]
</script>

<template>
    <!-- start of faq -->
    <div class="md:col-10 lg:col-5" data-aos="fade-up-sm" data-aos-delay="100">
        <div class="pl-0 lg:pl-8">
            <div class="mb-10">
                <!-- faq title -->
                <h2 class="text-3xl font-medium mb-3 -mt-[6px]">Frequently asked questions</h2>
                <!-- faq subtitle -->
                <p class="text-black/75">Here are the answers to the most common questions.</p>
            </div>

            <!-- faq item -->
            <div class="faq-item border-t border-b" v-for="(item, index) in FAQs" :key="index">
                <h3 @click="handleItem(index)"
                    class="faq-item-header text-lg font-medium py-5 cursor-pointer flex justify-between items-center select-none"
                    role="button" tabindex="0">
                    <span class="grow">{{item.title}}</span>
                    <span class="shrink-0">
                      <svg :class="`inline-block ${openItemId === index && 'hidden'}`" xmlns="http://www.w3.org/2000/svg"
                           height="0.9em" viewBox="0 0 448 512"><path
                          d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"
                          fill="currentColor"></path></svg>
                      <svg :class="!(openItemId === index) && 'hidden'" xmlns="http://www.w3.org/2000/svg" height="0.9em"
                           viewBox="0 0 448 512"><path
                          d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z"
                          fill="currentColor"/></svg>
                    </span>
                </h3>
                <div :class="`faq-item-content text-black/75 leading-normal overflow-hidden ${!(openItemId === index) && 'hidden'}`"
                     style="transition:max-height 0.25s cubic-bezier(0.25, 0.46, 0.45, 0.94)">
                    <div class="-mt-[6px] mb-5 content content-dark">
                        <p>{{item.content}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
