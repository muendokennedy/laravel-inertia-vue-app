<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../components/TextInput.vue'

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    avatar: null,
    preview: null
});


const onSubmit = () => {
    form.post(route('register'), {
        onError: () => form.reset('password_confirmation')
    });
}

const change = (e) => {
   form.avatar = e.target.files[0];
   form.preview = URL.createObjectURL(e.target.files[0]);
}

</script>
<template>
    <Head title="Register"/>
    <h1 class="title">Register a new account</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="onSubmit">
            <div class="grid place-items-center">
                <div class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300">
                    <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
                        <span class="bg-white/70 pb-2 text-center">Avatar</span>
                    </label>
                    <input type="file" id="avatar" @input="change" hidden>
                    <img :src="form.preview ?? 'storage/avatars/default.jpg'" alt="" class="object-cover w-28 h-28">
                </div>
            </div>
            <TextInput name="Enter name:" v-model="form.name" :errorMessage="form.errors.name"/>
            <TextInput name="Enter Email:" v-model="form.email" :errorMessage="form.errors.email"/>
            <TextInput name="Enter Password:" type="password" v-model="form.password" :errorMessage="form.errors.password"/>
            <TextInput name="Confirm Password:" type="password" v-model="form.password_confirmation"/>
            <div>
                <p class="text-slate-600 mb-2">Already a user? <a :href="route('login')" class="text-link">Login</a></p>
                <button class="primary-btn" :disabled="form.processing">Register</button>
            </div>
        </form>
    </div>
</template>

