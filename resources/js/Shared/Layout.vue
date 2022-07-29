<template>
    <div id="main-wrapper">

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="header-content">
                            <div class="header-left">
                                <div class="brand-logo">
                                    <Link class="mini-logo" href="/admin/dashboard">
                                    <img src="/images/favicon.png" alt="" width="40">
                                    </Link>
                                </div>
                            </div>
                            <div class="header-right">

                                <div class="dark-light-toggle theme-switch" onclick="themeToggle()">
                                    <span class="dark"><i class="ri-moon-line"></i></span>
                                    <span class="light"><i class="ri-sun-line"></i></span>
                                </div>

                                <div class="dropdown profile_log dropdown">
                                    <div data-bs-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                                        <div class="user icon-menu active"><span><img src="/images/icon.jpg"
                                                    alt=""></span>
                                        </div>
                                    </div>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                        class="dropdown-menu dropdown-menu-right">
                                        <div class="user-email">
                                            <div class="user">
                                                <span class="thumb">
                                                    <img src="/images/icon.jpg" alt="">
                                                </span>
                                                <div class="user-info">
                                                    <h5>Super User</h5>
                                                    <span>suadmin@gmail.com</span>
                                                </div>
                                            </div>
                                        </div>
                                        <Link class="dropdown-item" href="">
                                            <span><i class="ri-user-line"></i></span>Profile
                                        </Link>
                                        <Link class="dropdown-item logout" href="#">
                                            <i class="ri-logout-circle-line"></i>Logout
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <div class="brand-logo">
                <Link class="full-logo" href="/admin/dashboard"><img src="/images/favicon.png" alt="" width="30"></Link>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <Link href="/admin/dashboard">
                        <span><i class="ri-layout-grid-fill"></i></span>
                        <span class="nav-text">Dashboard</span>
                        </Link>
                    </li>
                    <li class="">
                        <Link href="/admin/students">
                            <span><i class="ri-star-line"></i></span>
                            <span class="nav-text">Registration</span></Link>
                    </li>
                    <li class="">
                        <Link href="#">
                            <span><i class="ri-briefcase-line"></i></span>
                            <span class="nav-text">School Setting</span></Link>
                    </li>
                    <li class="">
                        <Link href="#">
                            <span><i class="ri-account-box-line"></i></span>
                            <span class="nav-text">Users Management</span></Link>
                    </li>
                    <li class="">
                        <Link href="#">
                            <span><i class="ri-heart-line"></i></span>
                            <span class="nav-text">Users Management</span></Link>
                    </li>
                    <li class="">
                        <Link href="#">
                            <span><i class="ri-wallet-line"></i></span>
                            <span class="nav-text">Receipt</span></Link>
                    </li>
                    <li class="">
                        <Link href="#">
                            <span><i class="ri-settings-3-line"></i></span>
                            <span class="nav-text">Settings</span></Link>
                    </li>
                    <li class=" logout"><Link href="#">
                            <span><i class="ri-logout-circle-line"></i></span>
                            <span class="nav-text">Logout</span>
                        </Link>
                    </li>
                </ul>
            </div>
        </div>

        <slot />

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
