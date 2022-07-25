<template>
    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="#">
                            <img :src="logo" class="header-brand-img desktop-logo" alt="logo">
                            <img :src="logo" class="header-brand-img light-logo1" alt="logo">
                        </a>

                        <div class="d-flex order-lg-2 ms-auto header-right-icons">

                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">

                                        <!-- SIDE-MENU -->
                                        <div class="dropdown d-flex profile-1">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                                <span class="avatar  profile-user brround">{{ userAvater }}</span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading">
                                                    <div class="text-center">
                                                        <h5 class="text-dark mb-0 fs-14 fw-semibold">{{ auth.user.name }} </h5>
                                                        <small class="text-muted">{{ auth.user.role }}</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider m-0"></div>
                                                <Link class="dropdown-item" href="/logout">
                                                    <i class="dropdown-icon fe fe-alert-circle"></i> Log Out
                                                </Link>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">

                    <Logo/>

                    <Navigation/>
                </div>
                <!--/APP-SIDEBAR-->
            </div>

            <!--app-content open-->
            <div class="main-content app-content mt-7">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <BreadCrumbs/>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <slot />
                        <!-- ROW-1 CLOSED -->

                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
            <!--app-content closed-->
        </div>

        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © 2022 All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER CLOSED -->
    </div>
</template>

<script>

import { Head, Link } from '@inertiajs/inertia-vue3';
import BreadCrumbs from './Breadcrumbs.vue';
import Logo from './Logo.vue';
import Navigation from './Navigation.vue';

export default {

    components: {
        Head,
        Link,
        Logo,
        BreadCrumbs,
        Navigation,
    },

    props: {
        auth: Object,
    },

    data() {
        return {

        };
    },

    mounted() {

    },

    methods: {

    },

    computed: {
        logo() {
            return '/assets/images/logo.png'
        },
        userAvater() {
            return this.auth.user.role == 'admin' ? 'AD' : 'SD' ;
        }
    }
};
</script>


<style scoped>

</style>
