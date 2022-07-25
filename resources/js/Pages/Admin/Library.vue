<template>
    <Head>
        <title>Library Management</title>
    </Head>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card p-0">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-5 col-sm-6">
                                    <h3 class="mt-2">Library Management</h3>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-7 col-sm-6">
                                    <div class="float-sm-end float-none my-1">
                                        <Link class="btn btn-primary me-2" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modaldemo8">Add New Book</Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12  col-xl-6">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/assets/images/book.png" class="card-img-left h-100 mx-5" alt="img">
                            </div>
                            <div     class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Book Title</h5>
                                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi quisquam neque maiores ipsa omnis est minus ratione quaerat fuga ut enim quia perferendis adipisci commodi odit hic, aliquid illo autem?.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12  col-xl-6">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/assets/images/book.png" class="card-img-left h-100 mx-5" alt="img">
                            </div>
                            <div     class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Book Title</h5>
                                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi quisquam neque maiores ipsa omnis est minus ratione quaerat fuga ut enim quia perferendis adipisci commodi odit hic, aliquid illo autem?.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12  col-xl-6">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/assets/images/book.png" class="card-img-left h-100 mx-5" alt="img">
                            </div>
                            <div     class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Book Title</h5>
                                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi quisquam neque maiores ipsa omnis est minus ratione quaerat fuga ut enim quia perferendis adipisci commodi odit hic, aliquid illo autem?.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12  col-xl-6">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/assets/images/book.png" class="card-img-left h-100 mx-5" alt="img">
                            </div>
                            <div     class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Book Title</h5>
                                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi quisquam neque maiores ipsa omnis est minus ratione quaerat fuga ut enim quia perferendis adipisci commodi odit hic, aliquid illo autem?.</p>
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
