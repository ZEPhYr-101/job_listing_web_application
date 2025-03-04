<script setup>
import { useForm } from "@inertiajs/vue3";
import InputField from "../../../Component/InputField.vue";
import Title from "../../../Component/Title.vue";
import { ref } from "vue";

const showConfirmPassword = ref(false);

const form = useForm({
    password: "",
});

const submit = () => {
    form.delete(route("profile.destroy"), {
        onError: () => form.reset(),
        preserveScroll: true,
    });
};
</script>

<template>
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <Title>Delete Account</Title>
                <p class="text-center mb-3">
                    Once Your Account is Deleted, all of its resources data will
                    be permanently deleted. This action cannot be undone
                </p>
                <div v-if="showConfirmPassword">
                    <form @submit.prevent="submit">
                        <InputField
                            name="Confirm Password"
                            type="password"
                            v-model="form.password"
                            icon="fas fa-lock"
                            placeholder="Confirm Password"
                            :message="form.errors.password"
                        />

                        <div class="row d-flex justify-content-center">
                            <div class="col-12 d-flex gap-2">
                                <button
                                    :disabled="form.processing"
                                    class="flex-grow-1 btn btn-danger"
                                >
                                    Confirm
                                </button>
                                <button
                                    @click="showConfirmPassword = false"
                                    class="btn btn-primary flex-grow-1"
                                >
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-12 d-flex">
                        <button
                            v-if="!showConfirmPassword"
                            @click="showConfirmPassword = true"
                            class="px-6 py-2 rounded-lg bg-red-500 text-white flex-grow-1"
                        >
                            <i
                                class="fa-solid fa-triangle-exclamation mr-2"
                            ></i>
                            Delete Account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
