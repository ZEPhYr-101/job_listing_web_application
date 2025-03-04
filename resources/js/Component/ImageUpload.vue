<script setup>
import { ref, defineProps, defineEmits, watch } from "vue";

const props = defineProps({
    modelValue: Object, // ✅ Allow File object
    preview: String,
    error: String,
});

const emit = defineEmits(["update:modelValue"]);

const previewImage = ref(props.preview || "storage/avatars/man.png");

watch(
    () => props.preview,
    (newPreview) => {
        if (newPreview) previewImage.value = newPreview;
    }
);

const change = (e) => {
    const file = e.target.files[0];
    if (file) {
        emit("update:modelValue", file); // Emit File object
        previewImage.value = URL.createObjectURL(file);
    }
};
</script>

<template>
    <div class="grid place-items-center">
        <div
            class="relative w-28 rounded-full overflow-hidden border border-slate-300"
        >
            <label
                for="avatar"
                class="absolute inset-0 grid content-end cursor-pointer"
            >
                <span class="bg-white/70 pb-2 text-center">Avatar</span>
            </label>
            <input type="file" id="avatar" @change="change" hidden />
            <img
                class="object-cover w-28 h-28"
                :src="previewImage"
                alt="avatar"
            />
        </div>
        <p class="text-red-500 text-sm" v-if="error">{{ error }}</p>
    </div>
</template>
