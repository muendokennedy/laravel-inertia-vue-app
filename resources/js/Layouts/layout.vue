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
                    <div>
                        <Link class="nav-link" :href="route('logout')">Logout</Link>
                    </div>
                    <div>
                        <Link class="nav-link" :href="route('register')">Register</Link>
                        <Link class="nav-link" :href="route('login')">Login</Link>
                    </div>
                </div>
            </nav>
        </header>
        <main class="p-4 max-w-screen-lg mx-auto">
            <slot/>
        </main>
    </div>
</template>
