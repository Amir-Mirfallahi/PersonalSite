<script setup>

</script>

<template>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <slot name="header" />

        <tbody>
            <slot />
        </tbody>
    </table>
</template>

<style scoped>

</style>
