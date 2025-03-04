<script setup>
import AuthLayout from "../../Layouts/HomeLayouts/AuthLayout.vue";
import Title from "../../Component/Title.vue";
import InputField from "../../Component/InputField.vue";
import { useForm } from "@inertiajs/vue3";
import PrimaryBtn from "../../Component/PrimaryBtn.vue";
import SessionMessages from "../../Component/SessionMessages.vue";
import { status } from "nprogress";

defineOptions({ layout: AuthLayout });

const form = useForm({
    password: null,
});

const submit = () => {
    form.post(route("password.confirm"), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head :title="`| ${$page.component}`" />
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm" style="width: 400px">
            <div class="card-body login-card-body">
                <p class="login-box-msg">
                    This is a secure area of the application. Please confirm
                    your password before continuing.
                </p>
                <form @submit.prevent="submit">
                    <div class="input-group mb-2">
                        <InputField
                            name="Password"
                            type="password"
                            v-model="form.password"
                            icon="fas fa-lock"
                            placeholder="Password"
                            :message="form.errors.password"
                        />
                    </div>
                    <div class="d-flex justify-content-center gap-2 w-100">
                        <PrimaryBtn class="flex-grow-1">Confirm</PrimaryBtn>
                    </div>
                </form>
                <p class="mt-2 text-sm text-gray-600 text-center">
                    <Link
                        :href="route('dashboard')"
                        class="text-green-700 hover:underline hover:text-green-400"
                        >Back to Dashboard</Link
                    >
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</template>

<!-- <script setup>
import AuthLayout from "../../Layouts/AuthLayout.vue";
import { useForm } from "@inertiajs/vue3";
import InputField from "../../Component/InputField.vue";
import PrimaryBtn from "../../Component/PrimaryBtn.vue";

defineOptions({ layout: AuthLayout });

const form = useForm({
    password: null,
});

const submit = () => {
    form.post(route("password.confirm"), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head :title="`| ${$page.component}`" />
    <div class="card">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
            <p>
                This is a secure area of the application. Please confirm your
                password before continuing.
            </p>
            <form @submit.prevent="submit">
                <InputField
                    name="Password"
                    type="password"
                    v-model="form.password"
                    icon="fas fa-lock"
                    placeholder="Password"
                    :message="form.errors.password"
                />
                <div class="row d-flex justify-content-center">
                    <div class="col-12 d-flex">
                        <PrimaryBtn class="flex-grow-1">Confirm</PrimaryBtn>
                    </div>
                </div>
            </form>

            <p class="mt-4 text-sm text-gray-600">
                <Link
                    :href="route('password.request')"
                    class="text-blue-500 hover:underline"
                    >I forgot my password</Link
                >
            </p>
            <p class="mt-2 text-sm text-gray-600">
                <Link
                    :href="route('register')"
                    class="text-blue-500 hover:underline"
                    >Register a new membership</Link
                >
            </p>
        </div>
    </div>
</template> -->
