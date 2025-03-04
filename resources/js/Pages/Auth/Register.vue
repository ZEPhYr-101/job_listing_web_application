<script setup>
import { useForm } from "@inertiajs/vue3";
import InputField from "../../Component/InputField.vue";
import Button from "../../Component/Button.vue";
import Title from "../../Component/Title.vue";
import HomeLayouts from "../../Layouts/HomeLayouts/HomeLayouts.vue";

defineOptions({ layout: HomeLayouts });

const form = useForm({
    avatar: null,
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    // preview: null,

    // preview: "storage/avatars/man.png",
    errors: {},
});

const submit = () => {
    form.post(route("register"), {
        onError: () => form.reset("password", "password_confirmation"),
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
            <Title>Register an Account</Title>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form @submit.prevent="submit" class="space-y-4">
                    <!-- <ImageUpload
                    v-model="form.avatar"
                    :preview="form.preview"
                    :error="form.errors.avatar"
                /> -->
                    <InputField
                        name="Name"
                        type="name"
                        v-model="form.name"
                        icon="fas fa-user"
                        placeholder="Name"
                        :message="form.errors.name"
                    />
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
                    <div class="flex justify-end">
                        <Button :disabled="form.processing" intent="primary"
                            >Register</Button
                        >
                        <!-- <PrimaryBtn :disabled="form.processing">
                            Register
                        </PrimaryBtn> -->
                    </div>
                </form>
                <p class="mt-2 text-sm text-gray-600">
                    <Link
                        :href="route('login')"
                        class="text-green-700 hover:underline hover:text-green-400"
                        >Already Have Account?</Link
                    >
                </p>
            </div>
        </div>
    </div>
</template>
