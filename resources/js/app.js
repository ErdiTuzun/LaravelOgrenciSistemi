import './bootstrap';
import '../css/app.css';
import 'font-awesome/scss/font-awesome.scss'
import '@mdi/font/css/materialdesignicons.css'

import { createApp, h } from 'vue';
import { createInertiaApp, Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from "../../vendor/tightenco/ziggy";


const appName = import.meta.env.VITE_APP_NAME || 'Öğrenci Sistemi';
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(vuetify)
            .component("Link", Link)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});


// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'


const vuetify = createVuetify({
    components,
    directives,
})