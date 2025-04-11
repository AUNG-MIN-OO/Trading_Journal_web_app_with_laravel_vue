<script setup>

import Layout from "@/Layout/Layout.vue";
import Flash from "@/Components/Flash.vue";

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
                                ${{$page.props.auth.user.balance}}
                            </p>
                            <div class="mb-0">
                                <span class="badge text-success me-2">
                                    +9.0%
                                </span>
                                <span class="fw-bold">
                                    Since Last Month
                                </span>
                            </div>
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
                                +1000
                            </p>
                            <div class="mb-0">
                                <span class="badge text-success me-2">
                                    +9.0%
                                </span>
                                <span class="fw-bold">
                                    Since Last Month
                                </span>
                            </div>
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
                                89%
                            </p>
                            <div class="mb-0">
                                <span class="badge text-success me-2">
                                    +9.0%
                                </span>
                                <span class="fw-bold">
                                    Since Last Month
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-7">
                    <h3 class="fw-bold fs-4 my-3">
                        Users
                    </h3>
                    <table class="table table-striped">
                        <thead>
                        <tr class="highlight">
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 col-md-5">
                    <h3 class="fw-bold fs-4 my-3">
                        Reports Overview
                    </h3>
                    <canvas id="line-chart" width="800" height="450"></canvas>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style scoped>

</style>
