<script setup>

import {onMounted, ref} from "vue";
import Flash from "@/Components/Flash.vue";
import Layout from "@/Layout/Layout.vue";

const chartRef = ref(null)
const barChartRef = ref(null)

const { balanceHistory, stats, monthlyProfits } = defineProps({
    balanceHistory: Array,
    stats: Object,
    monthlyProfits: Array
})

let chartInstance = null
let barChartInstance = null

onMounted(() => {
    // Line Chart: Balance History
    if (chartRef.value && balanceHistory.length > 0) {
        const ctx = chartRef.value.getContext('2d')

        const chartData = {
            labels: balanceHistory.map(entry => entry.date),
            datasets: [{
                label: 'Balance Over Time',
                data: balanceHistory.map(entry => entry.balance),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.4,
                fill: true,
                pointRadius: 3,
                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
            }]
        }

        if (chartInstance) chartInstance.destroy()

        chartInstance = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        labels: { font: { size: 12 } }
                    },
                    tooltip: { mode: 'index', intersect: false },
                },
                scales: {
                    x: { title: { display: true, text: 'Date' }},
                    y: { title: { display: true, text: 'Balance' }, beginAtZero: false }
                }
            }
        })
    }

    // Bar Chart: Monthly Profit
    if (barChartRef.value && monthlyProfits.length > 0) {
        const ctxBar = barChartRef.value.getContext('2d')

        const barData = {
            labels: monthlyProfits.map(entry => entry.month),
            datasets: [{
                label: 'Monthly Profit',
                data: monthlyProfits.map(entry => entry.profit),
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        }

        if (barChartInstance) barChartInstance.destroy()

        barChartInstance = new Chart(ctxBar, {
            type: 'bar',
            data: barData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: { title: { display: true, text: 'Month' }},
                    y: {
                        beginAtZero: true,
                        title: { display: true, text: 'Profit ($)' }
                    }
                },
                plugins: {
                    legend: { display: false },
                    tooltip: { mode: 'index', intersect: false },
                }
            }
        })
    }
})

</script>

<template>
    <Head title="Dashboard"/>
    <Flash/>
    <Layout>
        <div class="mb-3">
            <h3 class="fw-bold fs-4 mb-3">
                Admin Dashboard
            </h3>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card shadow card-css">
                        <div class="card-body py-4">
                            <h6 class="mb-2 fw-bold">
                                Balance
                            </h6>
                            <p class="fw-bold mb-2">
                                ${{ stats.balance }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card shadow card-css">
                        <div class="card-body py-4">
                            <h6 class="mb-2 fw-bold">
                                Overall profit/loss
                            </h6>
                            <p class="fw-bold mb-2">
                                <span>{{stats.profit>0?'+':'-'}}</span>{{stats.profit}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card shadow card-css">
                        <div class="card-body py-4">
                            <h6 class="mb-2 fw-bold">
                                Win Rate (%)
                            </h6>
                            <p class="fw-bold mb-2">
                                {{ stats.winRate }}%
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-7">
                    <h3 class="fw-bold fs-4 my-3">Daily Profits</h3>
                    <div style="height: 400px;">
                        <canvas ref="chartRef"></canvas>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <h3 class="fw-bold fs-4 my-3">Monthly Profits</h3>
                    <div style="height: 400px;">
                        <canvas ref="barChartRef"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style scoped>
canvas {
    width: 100% !important;
    height: 100% !important;
}
</style>
