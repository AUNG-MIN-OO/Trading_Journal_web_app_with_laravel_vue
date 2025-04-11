<script setup>

import {route} from "ziggy-js";
</script>

<template>
    <aside id="sidebar">
        <div class="d-flex justify-content-between p-4">
            <div class="sidebar-logo">
                <a href="/">Trade Like PRO</a>
            </div>
            <button class="toggle-btn border-0" type="button">
                <i id="icon" class='bx bxs-chevrons-right'></i>
            </button>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="bx bxs-user-account"></i>
                    <span>Profile</span>
                </a>
            </li>
            <!--            normal link-->
            <li class="sidebar-item">
                <Link :href="route('trades.show')" class="sidebar-link">
                    <i class='bx bx-candles'></i>
                    <span>Trades</span>
                </Link>
            </li>
            <!--            button with one-step link-->
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="bx bxs-bug-alt"></i>
                    <span>Auth</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Login</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Register</a>
                    </li>
                </ul>
            </li>
            <!--            button with 2-step links-->
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                    <i class="bx bxs-bar-chart-alt-2"></i>
                    <span>Multi Level</span>
                </a>
                <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                            Two Links
                        </a>
                        <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse ">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Link 1</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Link 2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="bx bxs-bell-ring"></i>
                    <span>Notification</span>
                </a>
            </li>
            <li class="sidebar-item">
                <Link :href="route('settings')" class="sidebar-link">
                    <i class="bx bxs-cog"></i>
                    <span>Settings</span>
                </Link>
            </li>
        </ul>
        <div class="sidebar-footer">
            <a href="#" class="sidebar-link">
                <i class="bx bx-log-out"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>
</template>

<style scoped>

</style>
