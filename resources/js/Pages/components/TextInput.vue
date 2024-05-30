<script setup>
const model = defineModel({
    type: null,
    required: true
})
defineProps({
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        required: true,
        default: 'text'
    },
    errorMessage: String
})
</script>

<template>
    <div class="mb-6">
        <label>{{  name }}</label>
        <input :type="type" v-model="model" :class="{'!ring-red-500' : errorMessage}">
        <small class="error" v-if="errorMessage">{{ errorMessage }}</small>
    </div>
</template>
