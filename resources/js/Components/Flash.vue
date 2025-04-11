<script setup>
import { computed, ref, watch, onMounted, nextTick } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const toastEl = ref(null)
const toastInstance = ref(null)

const success = computed(() => page.props.flash?.success)
const error = computed(() => page.props.flash?.error)
const flashMessage = computed(() => success.value || error.value)

watch(flashMessage, (newVal) => {
    if (newVal) {
        showToast()
    }
})

const showToast = () => {
    nextTick(() => {
        if (!toastEl.value) return

        // Use window.bootstrap or directly bootstrap if properly imported
        const bsToast = window.bootstrap ? window.bootstrap.Toast : bootstrap.Toast

        if (toastInstance.value) {
            toastInstance.value.dispose()
        }

        toastInstance.value = new bsToast(toastEl.value, {
            autohide: true,
            delay: 5000
        })

        toastInstance.value.show()

        setTimeout(() => {
            page.props.flash = {}
        }, 3000)
    })
}

onMounted(() => {
    if (flashMessage.value) {
        showToast()
    }
})
</script>

<template>
    <!-- Toast element (always in DOM but hidden when no message) -->
    <div v-show="flashMessage"
         ref="toastEl"
         class="toast position-fixed top-0 end-0 m-3"
         role="alert"
         aria-live="assertive"
         aria-atomic="true"
         :class="{
         'text-bg-success': success,
         'text-bg-danger': error
       }">
        <div class="toast-header">
            <img :src="('/storage/avatars/trading_journal_logo.png')"
                 class="rounded me-2"
                 alt="Logo"
                 width="30">
            <strong class="me-auto">Trade Like a PRO</strong>
            <small>Just now</small>
            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="toast"
                    aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ success || error }}
        </div>
    </div>
</template>

<style scoped>
.toast {
    z-index: 9999;
}
</style>
