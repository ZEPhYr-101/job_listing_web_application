<script setup>
import SideNavBtn from "./SideNavBtn.vue";
const props = defineProps({
    routeName: String,
    label: String,
    icon: String,
    componentName: String,
});
</script>

<template>
    <div class="p-1 flex justify-center w-full">
        <SideNavBtn
            as="Link"
            intent="text"
            :href="route(routeName)"
            :class="{
                'bg-green-800 text-white': $page.component === componentName,
            }"
        >
            <i :class="['h-5 w-5 mr-2', icon]"></i>
            <span class="truncate">{{ label }}</span>
        </SideNavBtn>
    </div>
</template>
