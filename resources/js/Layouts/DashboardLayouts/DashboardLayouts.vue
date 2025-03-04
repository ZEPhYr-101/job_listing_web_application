<script setup>
import { onMounted } from "vue";
import TopNav from "./Sections/TopNav.vue";
import SideNav from "./Sections/SideNav.vue";

onMounted(() => {
    document.body.className =
        "sidebar-mini layout-fixed layout-navbar-fixed font-Montserrat";
});
</script>

<template>
    <Notifications class="fixed top-4 right-4 z-50" />
    <div class="wrapper">
        <TopNav />
        <SideNav />
        <div class="content-wrapper" style="min-height: 840px">
            <div class="content-header">
                <!-- <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $page.component }}</h3>
                        <div class="card-tools">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li
                                        class="breadcrumb-item active"
                                        aria-current="page"
                                    >
                                        {{ $page.component }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <slot />
                </div>
            </div>
        </div>
        <aside
            class="control-sidebar control-sidebar-dark"
            style="display: none"
        >
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">Anything you want</div>
            <!-- Default to the left -->
            <strong
                >Copyright © 2014-2021
                <a href="https://adminlte.io">AdminLTE.io</a>.</strong
            >
            All rights reserved.
        </footer>
        <div id="sidebar-overlay"></div>
    </div>
</template>
