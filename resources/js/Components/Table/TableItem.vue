<script setup>
defineProps({
    _class: String
})
</script>
<template>
    <td :class="`py-2 px-4 ${_class}`">
        <slot />
    </td>
</template>
