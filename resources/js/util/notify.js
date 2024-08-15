import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export const notify = (message, type = "default", options = {}) => {
    options = {
        position: "top-center",
        autoClose: 1500,
        transition: "slide",
        type,
        ...options,
    };

    toast(message, options);
};