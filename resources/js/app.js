import 'bootstrap/dist/css/bootstrap.min.css'; // Bootstrap styles
import '../css/app.css'; // Your custom styles
import 'bootstrap'; // Bootstrap JS (optional, depending on your need)

import { createApp, h } from 'vue'
import {createInertiaApp, Head, Link} from '@inertiajs/vue3'

createInertiaApp({
    title: (title) => `Trading Journal | ${title}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Link',Link)
            .component('Head',Head)
            .mount(el)
    },
    progress: {
        color: '#fff',
        includeCSS: true,
        showSpinner: true,
    },
})

document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.querySelector('.toggle-btn');
    const icon = document.querySelector('#icon');

    if (hamburger && icon) {
        hamburger.addEventListener('click', function () {
            document.querySelector("#sidebar").classList.toggle("expand");
            icon.classList.toggle("bxs-chevrons-right");
            icon.classList.toggle("bxs-chevrons-left");
        });
    }

    const chartEl = document.getElementById("line-chart");
    if (chartEl) {
        new Chart(chartEl, {
            type: 'line',
            data: {
                labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
                datasets: [
                    {
                        data: [86,114,106,106,107,111,133,221,783,2478],
                        label: "Africa",
                        borderColor: "#3e95cd",
                        fill: false
                    },
                    {
                        data: [282,350,411,502,635,809,947,1402,3700,5267],
                        label: "Asia",
                        borderColor: "#8e5ea2",
                        fill: false
                    },
                    {
                        data: [168,170,178,190,203,276,408,547,675,734],
                        label: "Europe",
                        borderColor: "#3cba9f",
                        fill: false
                    },
                    {
                        data: [40,20,10,16,24,38,74,167,508,784],
                        label: "Latin America",
                        borderColor: "#e8c3b9",
                        fill: false
                    },
                    {
                        data: [6,3,2,2,7,26,82,172,312,433],
                        label: "North America",
                        borderColor: "#c45850",
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'World population per region (in millions)'
                    }
                }
            }
        });
    }
});

