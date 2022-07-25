<template>
<div class="main-sidemenu">
    <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
    <ul class="side-menu" v-if="this.auth.user.role == 'admin'">
        <li class="sub-category">
            <h3>Navigation</h3>
        </li>

        <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/dashboard">
                <i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Dashboard</span>
            </Link>
        </li>
        <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/students-management">
                <i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Students</span>
            </Link>
        </li>
        <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/school-management">
                <i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">School Management</span>
            </Link>
        </li>
        <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/fee-management">
                <i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Fees</span>
            </Link>
        </li>
        <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/library-management">
                <i class="side-menu__icon fe fe-book"></i><span class="side-menu__label">Library</span>
            </Link>
        </li>
    </ul>
    <ul class="side-menu" v-else>
        <li class="sub-category">
            <h3>Navigation</h3>
        </li>

        <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/student/dashboard">
                <i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Dashboard</span>
            </Link>
        </li>
        <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/student/course">
                <i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Course Registration</span>
            </Link>
        </li>
        <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/student/library">
                <i class="side-menu__icon fe fe-book"></i><span class="side-menu__label">Library</span>
            </Link>
        </li>
       <!-- <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/students-management">
                <i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Session</span>
            </Link>
        </li>
         <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/students-management">
                <i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Department</span>
            </Link>
        </li>
        <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/students-management">
                <i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Faculty</span>
            </Link>
        </li>
        <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/students-management">
                <i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Courses</span>
            </Link>
        </li>
        <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/students-management">
                <i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Hostel</span>
            </Link>
        </li>-->
        <!-- <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/students-management">
                <i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Medical Center</span>
            </Link>
        </li> -->
        <!-- <li class="slide">
            <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/students-management">
                <i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Transcript</span>
            </Link>
        </li> -->
    </ul>
    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
</div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {

    components: {
        Link,

    },

    props: {
        auth: Object
    },

    data() {
        return {

        };
    },

    mounted() {

    },

    methods: {

    },
};
</script>

<style scoped>

</style>
