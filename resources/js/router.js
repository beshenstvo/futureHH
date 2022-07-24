import App from '../components/App.vue';
import { createRouter, createWebHistory} from 'vue-router';
import OneNote from '../components/OneNote.vue';
import Add from '../components/Add.vue';
import Show from '../components/Show.vue';
import Edit from '../components/Edit.vue';

export default createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: Show
        },
        {
            path: '/oneNote/:id',
            component: OneNote
        },
        {
            path: '/add',
            component: Add,
        },
        {
            path: '/edit/:id',
            component: Edit,
        },
    ]
});