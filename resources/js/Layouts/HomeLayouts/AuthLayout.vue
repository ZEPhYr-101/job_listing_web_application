<script setup>
import { onMounted } from "vue";

onMounted(() => {
    document.body.className = "font-Montserrat";
});
</script>

<template>
    <div class="flex flex-col min-h-screen">
        <div class="container mt-16 flex-1 px-4">
            <!-- Main content -->
            <div class="content">
                <slot />
            </div>
            <!-- /.content -->
        </div>
    </div>
</template>
