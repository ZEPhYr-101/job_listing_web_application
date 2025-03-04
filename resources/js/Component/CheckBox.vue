<script setup>
const model = defineModel();

defineProps({
    name: String,
});
</script>

<template>
    <div class="icheck-primary me-2">
        <input type="checkbox" v-model="model" :id="name" />
        <label :for="name" class="ms-2 cursor-pointer">
            <slot />
        </label>
    </div>
</template>
