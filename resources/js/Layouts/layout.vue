<script setup>
</script>
<template>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link class="nav-link" :class="{'bg-slate-700' : $page.component === 'Home'}" :href="route('home')">Home</Link>
                </div>
                <div v-if="$page.props.auth.user" class="space-x-6">
                    <Link class="nav-link" :class="{'bg-slate-700' : $page.component === 'Dashboard'}" method="post" as="button" type="button" :href="route('dashboard')">Dashboard</Link>
                    <Link class="nav-link" method="post" as="button" type="button" :href="route('logout')">Logout</Link>
                </div>
                <div v-else class="space-x-6">
                    <Link class="nav-link" :class="{'bg-slate-700' : $page.component === 'Auth/Register'}" :href="route('register')">Register</Link>
                    <Link class="nav-link" :class="{'bg-slate-700' : $page.component === 'Auth/Login'}" :href="route('login')">Login</Link>
                </div>
            </nav>
        </header>
        <main class="p-4 max-w-screen-lg mx-auto">
            <slot/>
        </main>
    </div>
</template>
