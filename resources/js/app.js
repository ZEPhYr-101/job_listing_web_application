import './bootstrap';
import '../css/app.css';
import '@fortawesome/fontawesome-free/css/all.css';
import './templateJs/jquery.js';
import './templateJs/bootstrap.js';
import Swal from 'sweetalert2'
import './templateJs/toastr.js';
import './templateJs/adminlte.js';
import 'flowbite';

import Notifications from './Component/Notifications.vue';
import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import DashboardLayouts from './Layouts/DashboardLayouts/DashboardLayouts.vue';
import { ZiggyVue } from "../../vendor/tightenco/ziggy"

// Make toastr globally accessible
window.Swal = Swal;


createInertiaApp({
    title: (title) => `Sample App ${title}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })

        // Try to find the page dynamically
        let page = pages[`./Pages/${name}.vue`]

        // Handle nested folders by searching for the correct match
        if (!page) {
            const matchedKey = Object.keys(pages).find(key => key.endsWith(`/${name}.vue`))
            if (matchedKey) {
                page = pages[matchedKey]
            }
        }

        // If still not found, throw an error
        if (!page) {
            console.error(`Page not found: ./Pages/${name}.vue`);
            throw new Error(`Page not found: ${name}`);
        }

        page.default.layout = page.default.layout || DashboardLayouts
        return page
    },

    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('Head', Head)
            .component('Link', Link)
            .component('Notifications', Notifications)
            .mount(el)
    },
    progress: {
        color: 'cyan',
        showSpinner: true,
    }
})