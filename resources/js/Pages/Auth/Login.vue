<script setup>
import HomeLayouts from "../../Layouts/HomeLayouts/HomeLayouts.vue";
import { useForm } from "@inertiajs/vue3";
import InputField from "../../Component/InputField.vue";
import PrimaryBtn from "../../Component/PrimaryBtn.vue";
import Button from "../../Component/Button.vue";
import CheckBox from "../../Component/CheckBox.vue";
import Title from "../../Component/Title.vue";

defineOptions({ layout: HomeLayouts });

const form = useForm({
    email: null,
    password: null,
    remember: null,
});

const submit = () => {
    form.post(route("login"), {
        onError: () => form.reset("password"),
    });
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
            <Title>Login Your Account</Title>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form @submit.prevent="submit">
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

                    <div
                        class="d-flex align-items-center justify-content-between mt-3"
                    >
                        <CheckBox name="remember" v-model="form.remember">
                            Remember me
                        </CheckBox>
                        <Button :disabled="form.processing" intent="primary"
                            >Login</Button
                        >
                        <!-- <PrimaryBtn :disabled="form.processing">
                            Login
                        </PrimaryBtn> -->
                    </div>
                </form>
                <p class="mt-4 text-sm text-gray-600">
                    <Link
                        :href="route('password.request')"
                        class="text-green-700 hover:underline hover:text-green-400"
                    >
                        I forgot my password
                    </Link>
                </p>
                <p class="mt-2 text-sm text-gray-600">
                    <Link
                        :href="route('register')"
                        class="text-green-700 hover:underline hover:text-green-400"
                    >
                        Register a new membership
                    </Link>
                </p>
            </div>
        </div>
    </div>

    <!-- <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card">
            <div class="card-body login-card-body">
                <form @submit.prevent="submit">
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

                    <div
                        class="d-flex align-items-center justify-content-between mt-3"
                    >
                        <CheckBox name="remember" v-model="form.remember">
                            Remember me
                        </CheckBox>
                        <PrimaryBtn :disabled="form.processing">
                            Login
                        </PrimaryBtn>
                    </div>
                </form>

                <p class="mt-4 text-sm text-gray-600">
                    <Link
                        :href="route('password.request')"
                        class="text-blue-500 hover:underline"
                    >
                        I forgot my password
                    </Link>
                </p>
                <p class="mt-2 text-sm text-gray-600">
                    <Link
                        :href="route('register')"
                        class="text-blue-500 hover:underline"
                    >
                        Register a new membership
                    </Link>
                </p>
            </div>
        </div>
    </div> -->
</template>
