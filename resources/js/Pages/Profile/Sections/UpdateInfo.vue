<script setup>
import ImageUpload from "../../../Component/ImageUpload.vue";
import { router, useForm } from "@inertiajs/vue3";
import InputField from "../../../Component/InputField.vue";
import PrimaryBtn from "../../../Component/PrimaryBtn.vue";
import Title from "../../../Component/Title.vue";

const props = defineProps({
    user: Object,
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    avatar: null,
    preview: props.user.avatar ? `/storage/${props.user.avatar}` : null, // Ensure correct path
});

const resendEmail = (e) => {
    router.post(
        route("verification.send"),
        {},
        {
            onStart: () => (e.target.disabled = true),
            onFinish: () => (e.target.disabled = false),
        }
    );
};
const submitForm = () => {
    form.transform((data) => {
        const formData = new FormData();
        formData.append("_method", "PATCH");
        formData.append("name", data.name);
        formData.append("email", data.email);

        if (data.avatar instanceof File) {
            formData.append("avatar", data.avatar);
        }

        return formData;
    }).post(route("profile.info"), {
        forceFormData: true,
    });
};
</script>

<template>
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <Title>Update Information</Title>
                <p class="text-center mb-3">
                    Update your account's profile Information and email address.
                </p>
                <form @submit.prevent="submitForm">
                    <div class="text-center">
                        <ImageUpload
                            v-model="form.avatar"
                            :preview="form.preview"
                            :error="form.errors.avatar"
                        />
                    </div>

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
                    <div
                        v-if="user.email_verified_at === null"
                        class="flex items-center gap-2"
                    >
                        <p>Your email address is unverified.</p>
                        <button
                            @click="resendEmail"
                            class="text-blue-500 hover:underline disabled:text-slate-400 disabled:cursor-wait"
                        >
                            Click here to re-send the verification link
                        </button>
                    </div>
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
