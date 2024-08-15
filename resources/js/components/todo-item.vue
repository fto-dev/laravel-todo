<template>
    <li class="py-4">
        <div class="flex items-center" >
            <input v-model="data.completed" :id="`todo-${data.id}`" :name="`todo-${data.id}`" type="checkbox" @change="handleTodoUpdated(data)"
                class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded cursor-pointer">
            <label :for="`todo-${data.id}`" class="items-center ml-3 flex flex-1 justify-between text-gray-900 cursor-pointer" :class="{'line-through opacity-25': data.completed}">
                <span class="text-lg font-medium overflow-hidden text-ellipsis whitespace-nowrap max-w-[160px]">{{ data.title }}</span>
                <span class="text-sm font-light text-gray-500">{{ data.created_at_formatted }}</span>
            </label>
            <button class="ml-5" @click="handleTodoRemove(data.id)" >Remove</button>
        </div>
    </li>
</template>

<script setup>
    import { defineProps, defineEmits } from 'vue';
    
    import { notify } from '../util/notify.js';
    import { updateTodo, removeTodo } from '../util/api.js'
    
    defineProps(['data']);
    
    const emit = defineEmits(['onTodoUpdated','onTodoRemoved']);

    const handleTodoUpdated = async (item) => {
        const payload = {
            completed: item.completed,
        };

        try {
            const data = await updateTodo(item.id, payload);
            emit('onTodoUpdated', data);
        } catch(error) {
            notify('Something went wrong','warning')
        }
    }
    
    const handleTodoRemove = async (id) => {
        try {
            const data = await removeTodo(id);
            emit('onTodoRemoved', id);
        } catch(error) {
            notify('Something went wrong','warning')
        }
    }
</script>