<template>
    <Head>
        <title>Student Detail</title>
    </Head>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card p-0">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-5 col-sm-6">
                                    <h3 class="mt-2">Student Details</h3>
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
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <div class="row" >
                                    <div class="col-md-12 col-xl-6 ">
                                        <div class="thumbnail p-5 justify-content-center">
                                            <div class="caption">
                                                <h4 class="text-capitalize">NAME : <strong>{{ student.name }}</strong></h4>
                                                <h4>EMAIL : <strong>{{ student.email }}</strong></h4>
                                                <h4>REGISTRATION NUMBER : <strong>{{ student.registration_number }}</strong></h4>
                                                <h4>DEPARTMENT : <strong>{{ student.department }}</strong></h4>
                                                <h4>FACULTY : <strong>{{ student.faculty }}</strong></h4>
                                                <h4>GENDER : <strong>{{ student.gender }}</strong></h4>
                                                <h4>SESSION : <strong>{{ student.sessionOfEnrolement }}</strong></h4>
                                                <h4>DATE OF BIRTH : <strong>{{ student.dob }}</strong></h4>
                                                <h4>MOBILE NUMBER : <strong>{{ student.mobileNumber }}</strong></h4>
                                                <h4>DATE OF ADMISSION : <strong>{{ student.dateOfAdmision }}</strong></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modaldemo8">
                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Edit Student Detail</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">

                            <form class="form-horizontal">
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" :value="student.name" >
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" :value="student.email">
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Mobile Number</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" :value="student.mobileNumber">
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Faculty</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" :value="student.faculty">
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Department</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" :value="student.department">
                                    </div>
                                </div>
                            </form>
                            <button class="btn btn-primary">Save changes</button> <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
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
    props: {
        student: Object,
    }
}
</script>
