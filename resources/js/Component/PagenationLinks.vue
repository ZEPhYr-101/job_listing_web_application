<script setup>
defineProps({
    paginator: {
        type: Object,
        required: true,
    },
});

const makeLabel = (label) => {
    if (label.includes("Previous")) {
        return '<i class="fa-solid fa-chevron-left text-green-600"></i>'; // Green arrow
    } else if (label.includes("Next")) {
        return '<i class="fa-solid fa-chevron-right text-green-600"></i>'; // Green arrow
    } else {
        return label;
    }
};
</script>

<template>
    <div class="flex items-center justify-between mt-4">
        <p class="text-green-600 text-sm">
            Showing {{ paginator.from }} to {{ paginator.to }} of
            {{ paginator.total }} results
        </p>
        <nav>
            <ul class="flex space-x-1 m-0">
                <li
                    v-for="(link, index) in paginator.links"
                    :key="index"
                    :class="[
                        'page-item',
                        { 'cursor-not-allowed opacity-50': !link.url },
                    ]"
                >
                    <component
                        :is="link.url ? 'Link' : 'span'"
                        :href="link.url"
                        v-html="makeLabel(link.label)"
                        class="page-link px-2 py-1 border-2 border-green-500 text-green-600 transition-all hover:text-white hover:border-green-500 text-xs"
                        :class="{
                            'bg-green-600 text-white': link.active, // Active state with green background
                            'bg-white': !link.active, // Inactive state with white background
                        }"
                        preserve-scroll
                    />
                </li>
            </ul>
        </nav>
    </div>
</template>
