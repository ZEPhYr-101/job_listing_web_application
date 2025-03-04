<script setup>
import Navlink from "../../../Component/Navlink.vue";
</script>
<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">Sample LOGO</span>
        </a>
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column">
                    <li class="nav-item">
                        <Navlink
                            routeName="dashboard"
                            componentName="Dashboard"
                            label="Dashboard"
                            icon="fas fa-tachometer-alt"
                        />
                    </li>
                    <li class="nav-item">
                        <Navlink
                            routeName="user"
                            componentName="Users"
                            label="Users"
                            icon="fas fa-users"
                        />
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
</template>
