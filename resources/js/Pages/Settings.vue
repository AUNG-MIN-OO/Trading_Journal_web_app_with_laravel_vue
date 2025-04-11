<script setup>

import Layout from "@/Layout/Layout.vue";
import {useForm, usePage} from "@inertiajs/vue3";
import {route} from "ziggy-js";
import Flash from "@/Components/Flash.vue";
import {ref} from "vue";

const { props } = usePage();  // Access the shared page props (which includes the user) as $page is not working
const user = props.auth.user;

const form = useForm({
    avatar : null,
    preview : null,
    balance : user.balance,
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
    form.post(route('settings.update.avatar'),{
        onSuccess: () => {
            form.avatar=""
            form.preview = null
            inputKey.value = Date.now() // force re-render of file input
        }
    })
}

const submitBalance = ()=>{
    form.post(route('settings.update.balance'),{
        onSuccess : () => {
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
            <hr>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div>
                        <label for="balance">Edit Account Balance</label>
                        <div class="d-flex col-12 col-md-4">
                            <input type="text" class="form-control" v-model="form.balance">
                            <button class="btn btn-sm btn-primary ms-3" @click.prevent="submitBalance" :disabled="form.processing">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style scoped>

</style>
