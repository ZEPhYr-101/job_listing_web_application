<script setup>
import HomeLayouts from "../Layouts/HomeLayouts/HomeLayouts.vue";
import AlertLayouts from "../Layouts/AlertLayouts.vue";
defineOptions({ layout: HomeLayouts });
</script>

<template>
    <Head :title="`| ${$page.component}`" />
    <!-- <AlertLayouts  /> -->
    <div class="container">
        <!-- <Button intent="primary" leftIcon="fa-solid fa-right-to-bracket"
            >Primary</Button
        >
        <Button intent="secondary" leftIcon="fa-solid fa-right-to-bracket"
            >Secondary</Button
        >
        <Button intent="danger" leftIcon="fa-solid fa-right-to-bracket"
            >Danger</Button
        >
        <Button intent="text" leftIcon="fa-solid fa-right-to-bracket"
            >Text</Button
        >

        <Button disabled intent="danger" leftIcon="fa-solid fa-right-to-bracket"
            >Danger</Button
        > -->
    </div>
</template>
