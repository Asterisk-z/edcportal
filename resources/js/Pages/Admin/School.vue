<template>
    <Head>
        <title>School Management</title>
    </Head>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card p-0">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-5 col-sm-6">
                                    <h3 class="mt-2">School Management</h3>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-7 col-sm-6">
                                    <div class="float-sm-end float-none my-1">
                                        <Link class="btn btn-primary me-2" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modaldemo8">Update Student Data</Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xl-4">
                    <div class="card overflow-hidden text-dark theme-light">
                        <div class="card-body">
                            <div class="d-flex ">
                                <div class="mt-2">
                                    <h3 class="number-font "><Link href="/admin/faculty-management">Faculty</Link>    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xl-4">
                    <div class="card overflow-hidden text-dark theme-light">
                        <div class="card-body">
                            <div class="d-flex ">
                                <div class="mt-2">
                                    <h3 class="number-font "><Link href="#">Update Session</Link>    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xl-4">
                    <div class="card overflow-hidden text-dark theme-light">
                        <div class="card-body">
                            <div class="d-flex ">
                                <div class="mt-2">
                                    <h3 class="number-font "><Link href="#">Courses</Link>    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xl-4">
                    <div class="card overflow-hidden text-dark theme-light">
                        <div class="card-body">
                            <div class="d-flex ">
                                <div class="mt-2">
                                    <h3 class="number-font "><Link href="#">Department</Link>    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xl-4">
                    <div class="card overflow-hidden text-dark theme-light">
                        <div class="card-body">
                            <div class="d-flex ">
                                <div class="mt-2">
                                    <h3 class="number-font "><Link href="#">Medical</Link>    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xl-4">
                    <div class="card overflow-hidden text-dark theme-light">
                        <div class="card-body">
                            <div class="d-flex ">
                                <div class="mt-2">
                                    <h3 class="number-font "><Link href="#">Hostel</Link>    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</template>

<script>
import { Link, Head } from "@inertiajs/inertia-vue3";
import Layout from '~/Shared/Layout.vue';

export default {
    components: {
        Link,
        Head,
    },
    layout: Layout,
}
</script>
