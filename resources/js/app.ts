import './bootstrap';
import '../css/app.css';

import { createApp, h, DefineComponent } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
import ScrollToTop from '@/Components/ScrollToTop.vue';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob<DefineComponent>('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({
            render: () => h('div', [
                h(Header),
                h(App, props),
                h(Footer),
                h(ScrollToTop), 
            ]),
            components: { Header , Footer, ScrollToTop}
        })
        .use(plugin)
        .use(ZiggyVue)
        .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
