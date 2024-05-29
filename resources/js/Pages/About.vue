<script setup>
defineProps({
    user: 'String'
})
</script>
<template>
    <Head :title="` | ${$page.component}`"/>
    {{ $page.props.user }}
    <h2>This is the about page from vue inertia and this is {{ user }}</h2>
</template>
