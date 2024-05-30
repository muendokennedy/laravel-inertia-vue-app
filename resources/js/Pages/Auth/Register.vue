<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../components/TextInput.vue'

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});


const onSubmit = () => {
    form.post(route('register'), {
        onError: () => form.reset('password_confirmation')
    });
}

</script>
<template>
    <Head title="Register"/>
    <h1 class="title">Register a new account</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="onSubmit">
            <TextInput name="Enter name:" v-model="form.name" :errorMessage="form.errors.name"/>
            <TextInput name="Enter Email:" v-model="form.email" :errorMessage="form.errors.email"/>
            <TextInput name="Enter Password:" type="password" v-model="form.password" :errorMessage="form.errors.password"/>
            <TextInput name="Confirm Password:" type="password" v-model="form.password_confirmation"/>
            <div>
                <p class="text-slate-600 mb-2">Already a user? <a href="#" class="text-link">Login</a></p>
                <button class="primary-btn" :disabled="form.processing">Register</button>
            </div>
        </form>
    </div>
</template>

