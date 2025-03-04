<script setup>
import { useForm } from "@inertiajs/vue3";
import InputField from "../../../Component/InputField.vue";
import PrimaryBtn from "../../../Component/PrimaryBtn.vue";
import Title from "../../../Component/Title.vue";

const form = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.put(route("profile.password"), {
        onSuccess: () => form.reset(),
        onError: () => form.reset(),
        preserveScroll: true,
    });
};
</script>

<template>
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <Title>Update Password</Title>
                <p class="text-center mb-3">
                    Emsure your using a long, random password to stay secure.
                </p>
                <form @submit.prevent="submit">
                    <InputField
                        name="Current Password"
                        type="password"
                        v-model="form.current_password"
                        icon="fas fa-lock"
                        placeholder="Current Password"
                        :message="form.errors.current_password"
                    />
                    <InputField
                        name="New Password"
                        type="password"
                        v-model="form.password"
                        icon="fas fa-lock"
                        placeholder="New Password"
                        :message="form.errors.password"
                    />
                    <InputField
                        name="Confirm New Password"
                        type="password"
                        v-model="form.password_confirmation"
                        icon="fas fa-lock"
                        placeholder="Confirm New Password"
                        :message="form.errors.password"
                    />
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 d-flex">
                            <PrimaryBtn
                                :disabled="form.processing"
                                class="flex-grow-1"
                                >Save</PrimaryBtn
                            >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<!-- <script setup></script>

<template>
    <Head :title="`| ${$page.component}`" />
</template> -->
