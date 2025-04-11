<script setup>

import Flash from "@/Components/Flash.vue";
import Layout from "@/Layout/Layout.vue";

const props = defineProps({
    trades : Array
})

</script>

<template>
    <Head title="Trades"/>
    <Flash/>
    <Layout>
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                <tr class="text-center">
                    <th>Date</th>
                    <th>Symbol</th>
                    <th>Entry Price</th>
                    <th>Stop Loss Price</th>
                    <th>Take Profit price</th>
                    <th>Strategy check</th>
                    <th>Type</th>
                    <th>Result</th>
                    <th>Profit</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <tr v-for="trade in props.trades" :key="trade.id">
                    <td>{{ trade.date }}</td>
                    <td>{{ trade.symbol }}</td>
                    <td>{{ trade.entry_price }}</td>
                    <td>{{ trade.stop_loss_price }}</td>
                    <td>{{ trade.profit_target_price }}</td>
                    <td>
                        <ul>
                            <li v-for="rule in trade.strategy_rules" :key="rule.id" class="badge rounded-pill" :class="rule.pivot.followed ? 'text-bg-success' : 'text-bg-danger'">
                                {{ rule.name }}
                            </li>
                        </ul>
                    </td>
                    <td>{{ trade.type }}</td>
                    <td>{{ trade.outcome }}</td>
                    <td>{{ trade.profit }}</td>
                </tr>
                </tbody>

            </table>
        </div>
    </Layout>
</template>

<style scoped>

</style>
