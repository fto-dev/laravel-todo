<template>
    <div>
        <ul class="divide-y divide-gray-200 px-4 h-[450px] overflow-x-hidden" v-if="!loading && data.length > 0">
            <TodoListItem :data="item" :key="item.id" v-for="item in data" @onTodoUpdated="handleTodoUpdated" @onTodoRemoved="handleTodoRemoved"  />
        </ul>

        <ul class="divide-y divide-gray-200 px-4 overflow-x-hidden" v-if="!loading && data.length == 0">
            <li class="py-4">
                <div class="flex items-center justify-center" >
                    <span class="text-lg font-medium">There is no any todo.</span>
                </div>
            </li>
        </ul>

        <div v-if="loading" class="min-h-[450px]">
            <div class="rounded-md p-4 max-w-sm w-full mx-auto">
                <div class="animate-pulse flex space-x-4">
                    <div class="flex-1 space-y-6 py-1">
                        <div class="h-2 bg-slate-700 rounded"></div>
                        <div class="space-y-3">
                            <div class="grid grid-cols-3 gap-4">
                                <div class="h-2 bg-slate-700 rounded col-span-2"></div>
                                <div class="h-2 bg-slate-700 rounded col-span-1"></div>
                            </div>
                            <div class="h-2 bg-slate-700 rounded"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';
import { notify } from '../util/notify.js';

import TodoListItem from './todo-item.vue';

const emit = defineEmits(['onTodoRemoved']);

const handleTodoUpdated = (newTodo) => {
    // notify user when todo updated successfully
    notify('Todo updated!', 'success')
};

const handleTodoRemoved = (id) => {
    emit('onTodoRemoved', id); 
};


defineProps(['data', 'loading','onTodoRemoved']);
</script>