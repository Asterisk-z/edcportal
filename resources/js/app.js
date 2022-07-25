import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

InertiaProgress.init({
    dalay: 250,
    color: '#000',
    showSpinner: true,
});

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    title: title => title ? ` ${title} - UNICAL EDC Portal` : `UNICAL EDC Portal`,
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
})
