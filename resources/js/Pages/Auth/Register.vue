<script setup>

import {useForm} from "@inertiajs/vue3";
import {route} from "ziggy-js";

const form = useForm({
    name : null,
    email : null,
    password : null
})

const submit = () => {
    form.post(route('register'))
}

</script>

<template>
    <Head title="Register"/>
    <section class="bg-light py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="mb-5">
                        <div class="text-center mb-4">
                            <Link :href="route('register')">
                                <img :src="('storage/avatars/trading_journal_logo.png')" alt="BootstrapBrain Logo" width="100" height="100" class="rounded-4">
                            </Link>
                        </div>
                        <h4 class="text-center mb-2">Registration Form</h4>
                    </div>
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <form @submit.prevent="submit">
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Username" v-model="form.name">
                                            <label for="name" class="form-label">Username</label>
                                            <small class="text-danger fw-bold" v-if="form.errors.name">*{{form.errors.name}}</small>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" v-model="form.email">
                                            <label for="email" class="form-label">Email</label>
                                            <small class="text-danger fw-bold" v-if="form.errors.email">*{{form.errors.email}}</small>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" v-model="form.password">
                                            <label for="password" class="form-label">Password</label>
                                            <small class="text-danger fw-bold" v-if="form.errors.password">*{{form.errors.password}}</small>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="iAgree" id="iAgree" required>
                                            <label class="form-check-label text-secondary" for="iAgree">
                                                I agree to the <a href="#!" class="link-primary text-decoration-none">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-lg" :disabled="form.processing">Sign up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-4">
                        <p class="m-0 text-secondary text-center">Already have an account? <Link :href="route('login')" class="link-primary text-decoration-none">Sign in</Link></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>

</style>
