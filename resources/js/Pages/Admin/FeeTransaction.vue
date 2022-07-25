<template>
    <Head>
        <title>Fee Transaction Management</title>
    </Head>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card p-0">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-5 col-sm-6">
                                    <h3 class="mt-2">Fee Transaction Management</h3>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-7 col-sm-6">
                                    <div class="float-sm-end float-none my-1">
                                        <label for="">Filter By</label>
                                        <select name="name" id="" class="form-control d-inline">
                                            <option value="">Only School Fee</option>
                                            <option value="">Only Acceptance Fee</option>
                                            <option value="">Only Departmental Fee</option>
                                            <option value="">Only Hostel Fee</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table border text-nowrap text-md-nowrap mb-0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Fee Title</th>
                                            <th>Fee Code</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Daname</td>
                                            <td>School Fee </td>
                                            <td>sfciewbdedfbe923ehwdwd</td>
                                            <td>200000</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Daname</td>
                                            <td>Acceptance Fee </td>
                                            <td>sfciewbdedfbe923ehwdwd</td>
                                            <td>20000</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Daname</td>
                                            <td>Hostel Fee </td>
                                            <td>sfciewbdedfbe923ehwdwd</td>
                                            <td>2000</td>
                                            <td></td>
                                        </tr>

                                    </tbody>
                                </table>
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
