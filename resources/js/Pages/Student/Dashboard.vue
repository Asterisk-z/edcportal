<template>
    <Head>
        <title>Student Dashboard</title>
    </Head>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden bg-primary-gradient text-white">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h4 class="">Pay School Fee</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden bg-secondary-gradient text-white " >
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h4 class="">Pay Acceptance Fee</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden bg-azure text-white">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h4 class="">Pay Department Fee</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden bg-dark-gradient text-white">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h4 class="">Pay Hostel Fee</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="cal1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import { Head, Link } from '@inertiajs/inertia-vue3';
import Layout from '~/Shared/Layout.vue';

export default {

    components: {
        Head,
        Link,
    },

    layout: Layout,

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
