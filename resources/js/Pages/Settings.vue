<script setup>

import Layout from "@/Layout/Layout.vue";
import {useForm} from "@inertiajs/vue3";
import {route} from "ziggy-js";
import Flash from "@/Components/Flash.vue";
import {ref} from "vue";

const form = useForm({
    avatar : null,
    preview : null,
})

const fileInput = ref(null)
const inputKey = ref(Date.now())

const handleAvatarChange = (e)=>{
    const file = e.target.files[0];
    if (file){
        form.avatar = file;
        form.preview = URL.createObjectURL(file);
    }
}

const submit = ()=>{
    form.post(route('settings.updateAvatar'),{
        onSuccess: () => {
            form.avatar=""
            form.preview = null
            inputKey.value = Date.now() // force re-render of file input
        }
    })
}

</script>

<template>
    <Head title="Settings"/>
    <Layout>
        <Flash/>
        <div>
            <h1 class="mb-0">Settings</h1>
            <p class="text-muted">Manage settings for your profile</p>
            <hr>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-4">
                            <div>
                                <img :src="form.preview ?? ('storage/'+$page.props.auth.user.avatar)" alt="" width="150" class="rounded-circle">
                            </div>
                        </div>
                        <div class="col-12 col-md-9 col-lg-8">
                            <div>
                                <h4>Profile picture</h4>
                                <p>We support PNGs, JPEG under 10MB</p>
                            </div>
                            <input type="file" class="form-control" @change="handleAvatarChange" :key="inputKey" ref="fileInput">
                            <small class="fw-bold text-danger" v-if="form.errors.avatar">*{{form.errors.avatar}}</small>
                            <button class="form-control btn btn-primary mt-3"
                                    @click.prevent="submit"
                                    :disabled="form.processing"
                            >
                                Update Profile Avatar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style scoped>

</style>
