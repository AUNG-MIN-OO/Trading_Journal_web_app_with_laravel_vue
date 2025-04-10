<script setup>

import Layout from "@/Layout/Layout.vue";
</script>

<template>
    <Layout>
        <div>
            <h1 class="mb-0">Settings</h1>
            <p class="text-muted">Manage settings for your profile</p>
            <hr>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-4">
                            <div>
                                <img :src="$page.props.auth.user.avatar ? ('Storage/'+$page.props.auth.user.avatar) : ('Storage/avatars/account.jpg')" alt="" width="150" class="rounded-circle">
                            </div>
                        </div>
                        <div class="col-12 col-md-9 col-lg-8">
                            <div>
                                <h4>Profile picture</h4>
                                <p>We support PNGs, JPEG under 10MB</p>
                            </div>
                            <input type="file" class="form-control">
                            <button class="form-control btn btn-primary mt-3">Update Profile Avatar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style scoped>

</style>
