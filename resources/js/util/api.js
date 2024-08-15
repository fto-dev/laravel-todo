import axios from 'axios';

const httpClient = axios.create({
    baseURL: import.meta.env.APP_URL,
    headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
    }
});


export const getTodos = async () => {
    const response = await httpClient.get('/api/todos');
    return response.data;
}

export const createTodo = async (data) => {
    const response = await httpClient.post('/api/todos', data);
    return response.data;
}

export const updateTodo = async (id, payload) => {
    const response = await httpClient.put(`/api/todos/${id}`, payload);
    return response.data;
}

export const removeTodo = async (id) => {
    const response = await httpClient.delete(`/api/todos/${id}`);
    return response.data;
}
