<script setup>
const model = defineModel({
    type: null,
    required: true,
});

defineProps({
    name: {
        type: String,
        required: true,
    },
    icon: {
        type: String,
    },
    type: {
        type: String,
        default: "text",
    },
    placeholder: {
        type: String,
    },
    message: String,
});
</script>

<template>
    <div class="input-group mb-3">
        <div class="relative w-full">
            <label class="block mb-1 text-gray-700">{{ name }}</label>
            <div class="relative">
                <input
                    v-model="model"
                    :type="type"
                    :class="[
                        'w-full p-2 pr-10 text-base border rounded-lg focus:outline-none focus:ring-2',
                        message
                            ? 'border-red-500 ring-1 ring-red-500 focus:ring-red-500'
                            : 'border-gray-300 focus:ring-blue-500',
                    ]"
                    :placeholder="placeholder"
                />

                <div
                    class="absolute inset-y-0 right-3 flex items-center text-gray-500 pointer-events-none"
                >
                    <i :class="icon"></i>
                </div>
            </div>
            <small class="text-red-500 text-sm mt-1 block" v-if="message">{{
                message
            }}</small>
        </div>
    </div>
</template>
