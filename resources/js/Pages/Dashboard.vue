<script setup>
</script>

<template>
        <Head :title="` | ${$page.component}`"/>
        <p class="p-4 bg-green-200" v-if="$page.props.flash.greet">{{ $page.props.flash.greet }}</p>
        <h1 class="title">Welcome back <span class="text-blue-600">{{ $page.props.auth.user.name }}</span> </h1>
</template>
<style scoped>
</style>
