<script setup>
    import {onMounted, ref} from 'vue';
    import moment from 'moment';

    // reactive variable to store response result
    let result = ref([]);

    // attach callback function the component was mounted.
    onMounted(
        async () => {
            getFinance()
        }
    );

    // call laravel Route via axios
    const getFinance = async() => {
        let response = await axios.get("api/get_finance")
        result.value = response.data.finance_data.results
    }
</script>

<template>
    <div class="pt-4 text-center">
        <h1><strong>Vue.js component</strong></h1>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Open</th>
                <th scope="col">High</th>
                <th scope="col">Low</th>
                <th scope="col">Close</th>
                <th scope="col">adjClose</th>
                <th scope="col">Volume</th>
            </tr>
        </thead>
        <tbody>
            <tr  v-for="row in result" :key ="row.id" >
                <td scope="row">{{ moment(row.t / 1000).format('DD-MM-YYYY HH:mm:ss') }}</td>
                <td>{{ row.o }}</td>
                <td>{{ row.h }}</td>
                <td>{{ row.l }}</td>
                <td>{{ row.c }}</td>
                <td>{{ row.vw }}</td>
                <td>{{ row.v }}</td>
            </tr>
        </tbody>
    </table>
</template>
