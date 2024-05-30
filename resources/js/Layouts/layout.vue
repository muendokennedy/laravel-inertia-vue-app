<script setup>
</script>
<template>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link class="nav-link" :href="route('home')">Home</Link>
                </div>
                <div class="space-x-6">
                    <Link class="nav-link" :href="route('register')">Register</Link>
                </div>
            </nav>
        </header>
        <main class="p-4 max-w-screen-lg mx-auto">
            <slot/>
        </main>
    </div>
</template>
