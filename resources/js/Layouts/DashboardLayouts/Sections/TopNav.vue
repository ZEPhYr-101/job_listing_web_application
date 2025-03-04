<script setup>
import { ref } from "vue";
import Button from "../../../Component/Button.vue";
import { router } from "@inertiajs/vue3";

const getDate = (date) =>
    new Date(date).toLocaleDateString("en-us", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });

const showDropdown = ref(false);

const isProcessing = ref(false);

const handleLogout = () => {
    isProcessing.value = true;

    // Simulate processing (Replace this with your actual logout logic)
    setTimeout(() => {
        isProcessing.value = false;
    }, 3000); // Simulating a delay
};
</script>
<template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <div
            v-show="showDropdown"
            @click="showDropdown = false"
            class="fixed inset-0 z-40"
        ></div>
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a
                    class="nav-link"
                    data-widget="pushmenu"
                    href="#"
                    role="button"
                    ><i class="fa-solid fa-bars-staggered"></i
                ></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a
                    href="#"
                    class="nav-link"
                    data-toggle="dropdown"
                    aria-expanded="false"
                >
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm"
                            >3 mins</span
                        >
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm"
                            >12 hours</span
                        >
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm"
                            >2 days</span
                        >
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer"
                        >See All Notifications</a
                    >
                </div>
            </li>

            <!-- User Profile Dropdown -->
            <li v-if="$page.props.auth.user" class="relative">
                <a
                    class="flex items-center px-4 py-2 focus:outline-none cursor-pointer"
                    id="user-menu-button"
                    @click="showDropdown = !showDropdown"
                >
                    <img
                        :src="
                            $page.props.auth.user.avatar
                                ? 'storage/' + $page.props.auth.user.avatar
                                : 'storage/avatars/man.png'
                        "
                        class="w-8 h-8 rounded-full mr-2 border border-gray-300 shadow"
                        alt="User Image"
                    />
                    <span class="text-gray-800 dark:text-black">
                        <strong>{{ $page.props.auth.user.name }}</strong>
                    </span>
                    <i class="fa-solid fa-angle-down ml-1"></i>
                </a>

                <!-- Dropdown Menu -->
                <ul
                    v-show="showDropdown"
                    @click.stop
                    class="absolute z-50 right-0 mt-2 w-56 bg-white dark:bg-gray-800 shadow-lg rounded-lg"
                >
                    <!-- User Image -->
                    <li
                        class="bg-white text-gray-800 text-center p-4 rounded-t-lg"
                    >
                        <img
                            :src="
                                $page.props.auth.user.avatar
                                    ? 'storage/' + $page.props.auth.user.avatar
                                    : 'storage/avatars/man.png'
                            "
                            class="w-16 h-16 mx-auto rounded-full border-4 border-white shadow-md"
                            alt="User Image"
                        />
                        <p class="mt-2">
                            <strong>{{ $page.props.auth.user.name }}</strong>
                            <small class="block text-gray-700">
                                Member since
                                <span>{{
                                    getDate($page.props.auth.user.created_at)
                                }}</span>
                            </small>
                        </p>
                    </li>

                    <!-- Menu Footer -->
                    <li
                        class="p-3 border-t border-gray-200 dark:border-gray-600"
                    >
                        <div class="flex items-center justify-between gap-2">
                            <Button
                                as="Link"
                                :href="route('profile.edit')"
                                intent="secondary"
                                class="w-1/2 text-center"
                                @click="showDropdown = false"
                            >
                                Profile
                            </Button>

                            <Button
                                v-if="isProcessing"
                                disabled
                                loading
                                intent="danger"
                                class="w-1/2 text-center"
                            >
                                Logout
                            </Button>

                            <Button
                                v-else
                                as="Link"
                                :href="route('logout')"
                                method="post"
                                intent="danger"
                                class="w-1/2 text-center"
                                @click="handleLogout"
                            >
                                Logout
                            </Button>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</template>
