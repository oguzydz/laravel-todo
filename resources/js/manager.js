import { App, plugin } from "@inertiajs/inertia-vue";
import Vue from "vue";

import { InertiaProgress } from "@inertiajs/progress";
InertiaProgress.init();

import "../css/index.css";

Vue.use(plugin);

const el = document.getElementById("app");

new Vue({
    render: (h) =>
        h(App, {
            props: {
                initialPage: JSON.parse(el.dataset.page),
                resolveComponent: (name) =>
                    import(`./Pages/${name}/Index.vue`).then(
                        (module) => module.default
                    ),
            },
        }),
}).$mount(el);
