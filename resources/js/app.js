import './bootstrap';
import 'primeicons/primeicons.css'
import '../css/app.css';


import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import AOS from 'aos'
import 'aos/dist/aos.css'

const appName = import.meta.env.VITE_APP_NAME || 'Amir Mirfallahi';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
        AOS.init({
            once: true,
            offset: 50,
            disable: "tablet",
        });
        return app
    },
    progress: {
        color: '#4B5563',
    },
});
