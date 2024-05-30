<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../components/TextInput.vue'

const form = useForm({
    email: null,
    password: null,
    remember: null
});


const onSubmit = () => {
    form.post(route('login'), {
        onError: () => form.reset('password')
    });
}

</script>
<template>
    <Head title="Login"/>
    <h1 class="title">Login to your account</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="onSubmit">
            <TextInput name="Enter Your  Email:" v-model="form.email" :errorMessage="form.errors.email"/>
            <TextInput name="Enter Your Password:" type="password" v-model="form.password" :errorMessage="form.errors.password"/>
            <div class="flex items-center gap-12">
                <label for="remember">Remember me</label>
                <input type="checkbox" id="remember" v-model="form.remember">
            </div>
            <div>
                <p class="text-slate-600 mb-2">Don't have an account? <a :href="route('register')" class="text-link">Register</a></p>
                <button class="primary-btn" :disabled="form.processing">Sign in</button>
            </div>
        </form>
    </div>
</template>

