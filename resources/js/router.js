import App from '../components/App.vue';
import { createRouter, createWebHistory} from 'vue-router';
import OneNote from '../components/OneNote.vue';
// import Edit from '../components/Edit.vue';
import Show from '../components/Show.vue';

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
    ]
});