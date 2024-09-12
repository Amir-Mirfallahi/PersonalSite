<script setup>

import FAQ from "@/Pages/Contact/FAQ.vue";
</script>

<template>
    <section class="py-28 bg-white text-dark rounded-b-2xl">
        <div class="container">
            <div class="row justify-center">
                <div class="md:col-10 lg:col-5 mb-24 lg:mb-0" data-aos="fade-up-sm">
                    <div class="mb-10">
                        <!-- contact title -->
                        <h2 class="text-3xl font-medium mb-3 -mt-[6px]">It's all starts with hello..</h2>
                    </div>

                    <!-- contact form -->
                    <form class="contact-form pr-0 lg:pr-8" method="POST">
                        <div class="mb-6">
                            <label for="full_name" class="block mb-2 text-black">Name</label>
                            <input type="text" id="full_name" name="full_name" placeholder="Charlie Edward" class="border border-light/90 rounded-lg bg-white h-12 w-full px-4 py-4 focus:border-dark/50 outline-none focus-visible:outline-none focus-visible:shadow-none transition-all duration-300" required="" />
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-black">Contact email</label>
                            <input type="email" id="email" name="email" placeholder="charlie.edward@email.app" class="border border-light/90 rounded-lg bg-white h-12 w-full px-4 py-4 focus:border-dark/50 outline-none focus-visible:outline-none focus-visible:shadow-none transition-all duration-300" required="" />
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block mb-2 text-black">Additional info</label>
                            <textarea id="message" name="message" rows="4" class="border border-light/90 rounded-lg bg-white w-full px-4 py-4 focus:border-dark/50 outline-none focus-visible:outline-none focus-visible:shadow-none transition-all duration-300" placeholder="Be as detailed as possible..."></textarea>
                        </div>

                        <div class="mb-6 status hidden"></div>

                        <button class="button button-dark mt-2" title="Send your Message" type="submit" aria-label="Send Message">
                            <span>Send Message</span>
                        </button>
                    </form>
                </div>

                <FAQ />
            </div>
        </div>
    </section>
</template>
