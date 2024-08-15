<template>
    <TodoForm @onTodoCreated="handleTodoCreated" />
    <TodoList :data="state.todos" :loading="state.loading" @onTodoUpdated="handleTodoUpdated"
        @onTodoRemoved="handleTodoRemoved" />
</template>

<script setup>
import { ref, reactive } from 'vue';

import TodoForm from './components/todo-form.vue';
import TodoList from './components/todo-list.vue';

import { getTodos } from './util/api.js';
import { notify } from './util/notify.js';

const state = reactive({
    loading: true,
    todos: [],
});

(async () => {
    try {
        state.todos = await getTodos();
        state.loading = false;
    } catch (error) {
        alert(error.message)
    }
})()

const handleTodoCreated = (newTodo) => {
    state.todos = [newTodo, ...state.todos];

    // notify user when todo added successfully
    notify('Todo added!', 'success')
};

const handleTodoRemoved = (id) => {
    console.log('handleTodoRemoved')

    state.todos = state.todos.filter((item) => {
        return item.id != id
    })

    // notify user when todo removed successfully
    notify('Todo removed!', 'success')
};

</script>