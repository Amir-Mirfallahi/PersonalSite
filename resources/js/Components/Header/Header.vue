<script setup>
import { Link } from "@inertiajs/vue3";

import Navbar from "@/Components/Header/Navbar.vue";
import SocialLinks from "@/Pages/Home/SocialLinks.vue";
import {onMounted, ref} from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";


const hideOnScroll = ref(false)
const isMobileNavOpen = ref(false)

const handleMobileNav = () => {
    console.log("Nav toggler clicked")
    isMobileNavOpen.value = !isMobileNavOpen.value
}

onMounted(() => {
    window.addEventListener("scroll", (e) => {
        hideOnScroll.value = window.scrollY > 100;
    })
})
</script>

<template>
    <header :class="`fixed top-0 z-[9000] w-full header [&.invisible]:-translate-y-full ${hideOnScroll && 'invisible'} ${isMobileNavOpen && 'navOpen'}`">
        <div class="container">
            <div class="flex justify-between py-6 items-center relative">
                <!-- logo -->
                <div :class="`lg:[&.scrolled]:opacity-0 lg:[&.scrolled]:-translate-x-8 w-1/4 transition-all duration-300 ${hideOnScroll && 'scrolled'}`">
                    <Link class='inline-block align-middle' href="/">
                        <ApplicationLogo />
                    </Link>
                </div>

                <!-- navbar -->
                <Navbar :handle-mobile-nav="handleMobileNav" />
                <!-- social links -->
                <SocialLinks :hide-on-scroll="hideOnScroll" />
            </div>
        </div>
    </header>
</template>

<style scoped>

</style>
