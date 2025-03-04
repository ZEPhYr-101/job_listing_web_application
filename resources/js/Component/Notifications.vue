<script setup>
import { usePage } from "@inertiajs/vue3";
import { watch } from "vue";
import Swal from "sweetalert2";

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
    customClass: {
        popup: "bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 flex items-center",
        title: "text-gray-800 dark:text-gray-200 text-sm font-medium",
        icon: "mr-2",
        timerProgressBar: "bg-blue-500 dark:bg-blue-300",
    },
});

const showToast = (type, message) => {
    Toast.fire({
        icon: type,
        title: message,
    });
};

// Watch for flash message updates and show notifications
const page = usePage();
watch(
    () => page.props.flash,
    (flash) => {
        if (flash?.success) {
            showToast("success", flash.success);
        }
        if (flash?.error) {
            showToast("error", flash.error);
        }
        if (flash?.warning) {
            showToast("warning", flash.warning);
        }
        if (flash?.info) {
            showToast("info", flash.info);
        }
    },
    { deep: true, immediate: true }
);
</script>
