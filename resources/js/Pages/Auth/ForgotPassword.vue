<script setup>
import AuthLayout from "../../Layouts/HomeLayouts/AuthLayout.vue";
import Title from "../../Component/Title.vue";
import InputField from "../../Component/InputField.vue";
import { useForm } from "@inertiajs/vue3";
import Button from "../../Component/Button.vue";
import PrimaryBtn from "../../Component/PrimaryBtn.vue";
import SessionMessages from "../../Component/SessionMessages.vue";
import { status } from "nprogress";

defineOptions({ layout: AuthLayout });

const form = useForm({
    email: null,
});
defineProps({
    status: String,
});

const submit = () => {
    form.post(route("password.email"));
};
</script>

<template>
    <Head :title="`| ${$page.component}`" />
    <div class="justify-center py-12 sm:px-6 lg:px-8 px-6">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img
                class="mx-auto h-10 w-auto"
                src="https://www.svgrepo.com/show/301692/login.svg"
                alt="Workflow"
            />
            <Title>Forgot Password</Title>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <p class="login-box-msg">
                    You forgot your password? Here you can easily retrieve a new
                    password.
                </p>
                <SessionMessages :status="status" />
                <form @submit.prevent="submit">
                    <div class="input-group mb-2">
                        <InputField
                            name="Email"
                            type="email"
                            v-model="form.email"
                            icon="fa-solid fa-at"
                            placeholder="Email"
                            :message="form.errors.email"
                        />
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 d-flex">
                            <Button intent="primary" class="flex-grow-1"
                                >Send Password Reset Link</Button
                            >
                            <!-- <PrimaryBtn class="flex-grow-1"
                            >Send Password Reset Link</PrimaryBtn
                        > -->
                        </div>
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <Link
                        :href="route('login')"
                        class="text-green-700 hover:underline hover:text-green-400"
                        >Login</Link
                    >
                </p>
                <p class="mb-0">
                    <Link
                        :href="route('register')"
                        class="text-green-700 hover:underline hover:text-green-400"
                        >Register a new membership</Link
                    >
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</template>
