<template>
    <form class="w-full max-w-sm mx-auto px-4 py-2" @submit.prevent="handleSubmit">
        <div class="flex items-center border-b-2 border-teal-500 py-2">
            <input v-model="formData.title" type="text" placeholder="Add a task"
                class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
            <button
                class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
                type="submit">Add</button>
        </div>
    </form>
</template>

<script setup>
import { reactive, defineEmits } from 'vue';
import { notify } from '../util/notify.js';

import { createTodo } from '../util/api.js';

const formData = reactive({
    title: ''
});

const emit = defineEmits(['onTodoCreated']);

const handleSubmit = async () => {
    try {
        const data = await createTodo(formData);

        formData.title = '';

        emit('onTodoCreated', data);
    } catch (error) {
        notify('Something went wrong','warning')
    }
};
</script>