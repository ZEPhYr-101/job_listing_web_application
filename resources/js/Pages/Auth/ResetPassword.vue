<script setup>
import AuthLayout from "../../Layouts/HomeLayouts/AuthLayout.vue";
import { useForm } from "@inertiajs/vue3";
import InputField from "../../Component/InputField.vue";
import Button from "../../Component/Button.vue";
import PrimaryBtn from "../../Component/PrimaryBtn.vue";
import Title from "../../Component/Title.vue";

defineOptions({ layout: AuthLayout });

const props = defineProps({
    token: String,
    email: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("password.update"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head :title="`| ${$page.component}`" />
    <div class="card">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
            <Title>Resset Password</Title>
            <form @submit.prevent="submit" class="space-y-4">
                <InputField
                    name="Email"
                    type="email"
                    v-model="form.email"
                    icon="fa-solid fa-at"
                    placeholder="Email"
                    :message="form.errors.email"
                />
                <InputField
                    name="Password"
                    type="password"
                    v-model="form.password"
                    icon="fas fa-lock"
                    placeholder="Password"
                    :message="form.errors.password"
                />
                <InputField
                    name="Confirm Password"
                    type="password"
                    v-model="form.password_confirmation"
                    icon="fas fa-lock"
                    placeholder="Confirm Password"
                />
                <div disabled="form.processing" class="flex justify-end">
                    <Button intent="primary" class="flex-grow-1"
                        >Reset Password</Button
                    >
                    <!-- <PrimaryBtn :disabled="form.processing">
                        Reset Password
                    </PrimaryBtn> -->
                </div>
            </form>
        </div>
    </div>
</template>
