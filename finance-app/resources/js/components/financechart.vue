<script>

export default {
    data(){
        return {
            series: [
                {
                    name: "High - 2022",
                    data: []
                },
                {
                    name: "Low - 2022",
                    data: []
                }
            ],
            chartOptions: {
                chart: {
                    height: 350,
                    type: 'line',
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#77B6EA', '#545454'],
                dataLabels: {
                    enabled: true,
                },
                stroke: {
                    curve: 'smooth'
                },
                title: {
                    text: 'High & Low Prices for the Apple Inc.',
                    align: 'left'
                },
                grid: {
                    borderColor: '#e7e7e7',
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                markers: {
                    size: 1
                },
                xaxis: {
                    categories: null,
                    title: {
                        text: 'Date'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Price'
                    },
                    min: 150,
                    max: 200
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    floating: true,
                    offsetY: -25,
                    offsetX: -5
                },
                noData: {
                    text: "Loading ...",
                    align: 'center',
                    verticalAlign: 'middle',
                    offsetX: 0,
                    offsetY: 0,
                    style: {
                        color: undefined,
                        fontSize: '14px',
                        fontFamily: undefined
                    }
                }
            }
        }
    },
    async mounted() {
        let response = await axios.get("api/get_finance_chart")
        this.chartOptions = {
            ...this.chartOptions, ...{
                xaxis: {
                    categories: response.data.finance_data.dates
                }
            }
        }

        this.$data.series[0].data = response.data.finance_data.high;
        this.$data.series[1].data = response.data.finance_data.low;
    }
}
</script>
<template>
    <apexchart type="line" height="350" :options="chartOptions" :series="series"></apexchart>
</template>
