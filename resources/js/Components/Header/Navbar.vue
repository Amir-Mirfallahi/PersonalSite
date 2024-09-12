<script setup>
import {Link} from "@inertiajs/vue3";
import {onMounted, ref} from 'vue';


defineProps({
    handleMobileNav: Function
})

const activeLinkRef = ref(null)
const navIndicatorRef = ref(null)
const indicatorPosition = ref({left: null, width: null})

const setIndicatorPosition = (left, width) => {
    indicatorPosition.value = {left, width}
    navIndicatorRef.value.style.left = `${indicatorPosition.value.left}px`;
    navIndicatorRef.value.style.width = `${indicatorPosition.value.width}px`;
}
// Handle mouse leave event
const handleLinkMouseLeave = () => {
    if (activeLinkRef) {
        setIndicatorPosition(activeLinkRef.value.$el.offsetLeft, activeLinkRef.value.$el.offsetWidth);
    }
};
// Handle mouse enter event
const handleLinkMouseEnter = (e) => {
    setIndicatorPosition(e.target.offsetLeft, e.target.offsetWidth);
};

onMounted(() => {
    if (activeLinkRef.value) {
        setIndicatorPosition(activeLinkRef.value.$el.offsetLeft, activeLinkRef.value.$el.offsetWidth);
    }
    setTimeout(() => {
        navIndicatorRef.value.style.opacity = 1;
        navIndicatorRef.value.style.transform = "scaleX(1)";
    }, 300);

})
</script>

<template>
    <nav class="navbar">
        <span class="indicator" ref="navIndicatorRef"></span>
        <Link @mouseleave="handleLinkMouseLeave" @mouseenter="handleLinkMouseEnter"
              :ref="route().current() === 'home' ? 'activeLinkRef' : ''" :href="route('home')">Home
        </Link>
        <Link @mouseleave="handleLinkMouseLeave" @mouseenter="handleLinkMouseEnter"
              :ref="route().current() === 'about' ? 'activeLinkRef' : ''" :href="route('about')">About
        </Link>
        <Link @mouseleave="handleLinkMouseLeave" @mouseenter="handleLinkMouseEnter"
              :ref="route().current() === 'projects' ? 'activeLinkRef' : ''" :href='route("projects")'>Projects
        </Link>
        <Link @mouseleave="handleLinkMouseLeave" @mouseenter="handleLinkMouseEnter"
              :ref="route().current() === 'blog' ? 'activeLinkRef' : ''" :href='route("blog")'>Blog
        </Link>
        <Link @mouseleave="handleLinkMouseLeave" @mouseenter="handleLinkMouseEnter"
              :ref="route().current() === 'contact' ? 'activeLinkRef' : ''" :href='route("contact")'>Contact
        </Link>
    </nav>
    <div class="navOverlay"></div>
    <!-- toggle mobile-nav -->
    <button type="button" aria-label="Toggle Mobile Navigation" class="navToggler" @click="handleMobileNav">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
             stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 8l16 0"></path>
            <path d="M4 16l16 0"></path>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
             stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M18 6l-12 12"></path>
            <path d="M6 6l12 12"></path>
        </svg>
    </button>
</template>
