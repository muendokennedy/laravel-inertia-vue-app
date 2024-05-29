<script setup>
</script>

<template>
        <Head :title="` | ${$page.component}`"/>
        {{ $page.props.user }}
        <h2 class="text-2xl font-semibold">Hello from inertia home</h2>
        <Link class="mt-[1200px] block" href="/" preserve-scroll>Refresh</Link>
</template>
<style scoped>
</style>
