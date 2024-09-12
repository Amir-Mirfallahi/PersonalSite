<script setup>

defineProps({
    hideOnScroll: Boolean
})
</script>

<template>
    <div :class="`lg:[&.scrolled]:opacity-0 lg:[&.scrolled]:translate-x-8 w-1/4 transition-all duration-300 text-right text-sm hidden lg:block ${hideOnScroll && 'scrolled'}`">
        <span class="block text-white/75 mb-1">Social Links:</span>
        <ul class="inline-flex gap-x-4">
            <li class="inline-block hover:opacity-75 transition-op duration-300">
                <a href="https://facebook.com/" class="link">FB</a>
            </li>
            <li class="inline-block hover:opacity-75 transition-op duration-300">
                <a href="https://twitter.com/" class="link">TW</a>
            </li>
            <li class="inline-block hover:opacity-75 transition-op duration-300">
                <a href="https://linkedin.com/" class="link">IN</a>
            </li>
            <li class="inline-block hover:opacity-75 transition-op duration-300">
                <a href="https://github.com/" class="link">GITHUB</a>
            </li>
        </ul>
    </div>
</template>
