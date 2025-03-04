<script setup>
import Button from "../../../Component/Button.vue";
</script>

<template>
    <nav
        class="bg-white dark:bg-gray-300 fixed w-full z-10 top-0 start-0 border-b border-gray-200 dark:border-gray-300 py-2"
    >
        <div
            class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-4"
        >
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img
                    src="/public/assets/imgs/logo (1).png"
                    class="h-8"
                    alt="Flowbite Logo"
                    style="opacity: 0.8; height: 32px"
                />
                <span
                    class="self-center text-xl font-semibold whitespace-nowrap dark:text-black"
                    ><strong>Sample</strong></span
                >
            </a>
            <div
                class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse"
            >
                <Button as="Link" :href="route('login')" intent="primary"
                    >Login</Button
                >
                <button
                    data-collapse-toggle="navbar-sticky"
                    type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky"
                    aria-expanded="false"
                >
                    <span class="sr-only">Open main menu</span>
                    <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 17 14"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15"
                        />
                    </svg>
                </button>
            </div>
            <div
                class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                id="navbar-sticky"
            >
                <ul
                    class="flex flex-col md:flex-row p-2 md:p-0 mt-2 md:mt-0 font-medium rounded-lg md:space-x-6 md:border-0 md:bg-transparent"
                >
                    <li>
                        <Link
                            :href="route('landingpage')"
                            class="py-1 px-2 hover:text-green-700"
                            >Home</Link
                        >
                    </li>
                    <li>
                        <a href="#" class="py-1 px-2 hover:text-green-700"
                            >About</a
                        >
                    </li>
                    <li>
                        <a href="#" class="py-1 px-2 hover:text-green-700"
                            >Services</a
                        >
                    </li>
                    <li>
                        <a href="#" class="py-1 px-2 hover:text-green-700"
                            >Contact</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
