<script setup>
</script>

<template>
        <Head :title="` | ${$page.component}`"/>
        {{ $page.props.user }}
        <h2 class="text-2xl font-semibold">Hello from inertia home</h2>
</template>
<style scoped>
</style>
