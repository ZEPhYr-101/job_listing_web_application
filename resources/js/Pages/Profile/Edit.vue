<script setup>
import DeleteAccount from "./Sections/DeleteAccount.vue";
import UpdateInfo from "./Sections/UpdateInfo.vue";
import UpdatePassword from "./Sections/UpdatePassword.vue";

defineProps({
    user: Object,
});
</script>

<template>
    <Head :title="`| ${$page.component}`" />
    <div class="container-fluid">
        <div class="row">
            <UpdateInfo :user="user" />
            <UpdatePassword />
            <DeleteAccount />
        </div>
    </div>
</template>
