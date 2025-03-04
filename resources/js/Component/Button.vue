<script setup>
import { computed } from "vue";
import { cva } from "class-variance-authority";

const props = defineProps({
    leftIcon: String,
    rightIcon: String,
    loading: Boolean,
    disabled: Boolean,
    as: {
        type: [String, Object],
        default: "button",
    },
    intent: {
        type: String,
        validator: (val) =>
            ["primary", "secondary", "danger", "text"].includes(val),
        default: "primary",
    },
});

const buttonClass = computed(() => {
    return cva(
        "inline-flex items-center justify-center  text-sm min-h-[40px] px-3 py-0.5 font-semibold transition-colors",
        {
            variants: {
                intent: {
                    primary: "bg-green-700 hover:bg-green-600 text-white",
                    secondary: "bg-black/50 hover:bg-black/40 text-white",
                    danger: "bg-red-600 text-white hover:bg-red-500 ",
                    text: "text-gray-700 hover:bg-black/10",
                },
                disabled: {
                    true: "!bg-gray-100 !text-gray-400 cursor-not-allowed",
                },
            },
        }
    )({
        intent: props.intent,
        disabled: props.disabled,
    });
});
</script>
<template>
    <component :disabled="props.disabled" :is="props.as" :class="buttonClass">
        <svg
            v-if="props.loading"
            class="animate-spin h-5 w-5 absolute"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
        >
            <circle
                class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4"
            ></circle>
            <path
                class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
            ></path>
        </svg>
        <div
            v-if="!props.loading"
            :class="['h-5 w-5 mr-2', props.loading && 'invisible']"
        >
            <i :class="leftIcon"></i>
        </div>
        <span :class="[props.loading && 'invisible']">
            <slot />
        </span>
        <div
            v-if="!props.loading"
            :class="['h-5 w-5 ml-2', props.loading && 'invisible']"
        >
            <i :class="leftIcon"></i>
        </div>
    </component>
</template>
