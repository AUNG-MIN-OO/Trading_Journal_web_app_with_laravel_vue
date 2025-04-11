<script setup>

import {route} from "ziggy-js";

</script>

<template>
    <nav class="nav navbar navbar-expand px-4 px-3">
        <form action="" class="d-none d-sm-inline-block">
            <div class="input-group input-group-navbar">
                <input type="text" class="form-control border-0 rounded-0 pe-0" placeholder="search..." aria-label="Search">
                <button class="btn border-0 rounded-0">
                    <i class="bx bx-search"></i>
                </button>
            </div>
        </form>
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                        <img :src="$page.props.auth.user.avatar ? ('Storage/'+$page.props.auth.user.avatar) : ('Storage/avatars/account.jpg')" class="avatar img-fluid rounded-circle" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end rounded-0 border-0 shadow mt-3">
                        <Link :href="route('dashboard')" class="dropdown-item">
                            <i class='bx bx-candles'></i>
                            <span>Dashboard</span>
                        </Link>
                        <Link :href="route('trades.show')" class="dropdown-item">
                            <i class='bx bx-candles'></i>
                            <span>Trades</span>
                        </Link>
                        <div class="dropdown-divider"></div>
                        <Link :href="route('settings')" class="dropdown-item">
                            <i class="bx bx-cog"></i>
                            <span>Settings</span>
                        </Link>
                        <Link :href="route('logout')" method="post" as="button" type="button" class="dropdown-item">
                            <i class="bx bx-cog"></i>
                            <span>Logout</span>
                        </Link>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</template>

<style scoped>

</style>
