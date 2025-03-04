<script setup>
import TopNav from "./Sections/TopNav.vue";
import { onMounted } from "vue";

onMounted(() => {
    document.body.className = "font-Montserrat";
});
</script>

<template>
    <Notifications class="fixed top-4 right-4 z-50" />
    <div class="flex flex-col min-h-screen">
        <TopNav />
        <div class="container mt-16 flex-1 px-4">
            <!-- Main content -->
            <div class="content">
                <slot />
            </div>
            <!-- /.content -->
        </div>
        <footer
            class="w-full bg-gray-100 text-center py-4 mt-auto px-4 border-t"
        >
            <div
                class="flex flex-wrap items-center justify-between mx-auto px-4"
            >
                <div class="hidden sm:block"><b>Version</b> 1.2.0</div>
                <div class="text-sm">
                    <strong>
                        Copyright © 2025
                        <a class="text-green-700 hover:text-green-500"
                            >SampleAdmin.io</a
                        >.
                    </strong>
                    All rights reserved.
                </div>
            </div>
        </footer>
    </div>
</template>
