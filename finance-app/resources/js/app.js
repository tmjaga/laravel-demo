import './bootstrap';

import {createApp} from 'vue';
import App from './components/app.vue';
import ApexCharts from 'vue3-apexcharts';

const app = createApp(App).use(ApexCharts);
app.mount('#app');
