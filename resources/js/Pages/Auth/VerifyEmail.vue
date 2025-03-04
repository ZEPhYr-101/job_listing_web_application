<script setup>
import AuthLayout from "../../Layouts/HomeLayouts/AuthLayout.vue";
import Title from "../../Component/Title.vue";
import PrimaryBtn from "../../Component/PrimaryBtn.vue";
import { useForm } from "@inertiajs/vue3";

defineOptions({ layout: AuthLayout });

const form = useForm({});

const submit = () => {
    form.post(route("verification.send"));
};
</script>

<template>
    <Head :title="`| ${$page.component}`" />
    <Title>Email Verification</Title>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-14">
                <!-- Adjust width: col-md-6, col-lg-8, etc. -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Verify Email</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Thanks for signing up! Before getting started, could
                            you verify your email address by clicking on the
                            link we just emailed to you? If you didn't receive
                            the email, we will gladly send you another.
                        </p>
                        <form @submit.prevent="submit" class="mt-4">
                            <PrimaryBtn :disabled="form.processing"
                                >Resend Verification Email</PrimaryBtn
                            >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /.row -->
</template>
