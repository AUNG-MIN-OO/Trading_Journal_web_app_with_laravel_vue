<script setup>

import Sidebar from "@/Components/Sidebar.vue";
import Main_Navbar from "@/Components/Main_Navbar.vue";
import Main_footer from "@/Components/Main_footer.vue";

</script>

<template>
    <div class="wrapper">
        <Sidebar/>
        <!--    main side-->
        <div class="main">
            <Main_Navbar/>
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <slot></slot>
                </div>
            </main>
            <!--        footer-->
            <Main_footer/>
        </div>
    </div>
</template>

<style scoped>

</style>
