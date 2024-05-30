<script setup>
</script>

<template>
        <Head :title="` | ${$page.component}`"/>
        <h1 class="title">Welcome back <span class="text-blue-600">{{ $page.props.auth.user.name }}</span> </h1>
</template>
<style scoped>
</style>
