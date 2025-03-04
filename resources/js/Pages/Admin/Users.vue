<script setup>
import { ref, watch } from "vue";
import PagenationLinks from "../../Component/PagenationLinks.vue";
import { router } from "@inertiajs/vue3";
import { debounce } from "lodash";

const props = defineProps({
    users: Object,
    searchInput: String,
    can: Object,
});

const search = ref(props.searchInput);

watch(
    search,
    debounce(
        (q) => router.get("/user", { search: q }, { preserveState: true }),
        500
    )
);

const getDate = (date) =>
    new Date(date).toLocaleDateString("en-us", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
</script>
<template>
    <Head :title="`| ${$page.component}`" />
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registered User</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px">
                    <input
                        type="text"
                        name="table_search"
                        class="form-control float-right"
                        placeholder="Search"
                        v-model="search"
                    />

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table w-full table-auto border-collapse">
                <thead>
                    <tr class="border-b bg-gray-100">
                        <th scope="col" class="p-4 text-left">
                            <div class="flex items-center">
                                <input
                                    id="checkbox-all-search"
                                    type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500"
                                />
                                <label for="checkbox-all-search" class="sr-only"
                                    >checkbox</label
                                >
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left">Name</th>
                        <th class="px-6 py-4 text-left">Email</th>
                        <th class="px-6 py-4 text-left">Registration Date</th>
                        <th v-if="can.delete_user" class="px-6 py-4 text-left">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="user in users.data"
                        :key="user.id"
                        class="border-b hover:bg-gray-50 transition"
                    >
                        <td class="p-4">
                            <div class="flex items-center">
                                <input
                                    type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500"
                                />
                                <label class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img
                                    :src="
                                        user.avatar
                                            ? 'storage/' + user.avatar
                                            : 'storage/avatars/man.png'
                                    "
                                    class="w-8 h-8 rounded-full mr-2 border border-gray-300 shadow"
                                    alt="User Image"
                                />
                                <span class="text-gray-800">{{
                                    user.name
                                }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ user.email }}</td>
                        <td class="px-6 py-4">
                            {{ getDate(user.created_at) }}
                        </td>
                        <td v-if="can.delete_user" class="px-6 py-4">
                            <button
                                class="px-3 py-1 text-white bg-red-600 rounded hover:bg-gray-700"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <PagenationLinks :paginator="users" />
        </div>
        <!-- /.card-body -->
    </div>
</template>
