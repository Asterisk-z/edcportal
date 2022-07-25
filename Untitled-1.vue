
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card p-0">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-5 col-sm-6">
                                    <h3 class="mt-2">Student Management</h3>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-7 col-sm-6">
                                    <div class="float-sm-end float-none my-1">
                                        <Link href="/admin/students-management" class="btn btn-success me-2"><i
                                            class="fa fa-arrow-left"></i> Back</Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-wrap mb-4" v-if="Object.keys(errors).length > 0 ">
                                <div class="">
                                    <div class="alert alert-danger">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40"
                                                viewBox="0 0 24 24">
                                                <path fill="#f07f8f"
                                                    d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z" />
                                                <circle cx="12" cy="17" r="1" fill="#e62a45" />
                                                <path fill="#e62a45"
                                                    d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z" />
                                            </svg></span>
                                        <p class="text-capitalize d-inline pl-3">{{ Object.values(errors)[0] }}</p>
                                    </div>
                                </div>
                            </div>
                            <form id="adminForm" @submit.prevent="admitStudent">
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Full Name :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" :class="{'is-invalid': errors.name}"
                                            placeholder="Full Name" v-model="form.name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Registration Number :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"
                                            :class="{'is-invalid': errors.registrationNumber}"
                                            placeholder="Registration Number" v-model="form.registrationNumber">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Mobile Number :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"
                                            :class="{'is-invalid': errors.mobileNumber}" placeholder="Mobile Number"
                                            v-model="form.mobileNumber">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Department :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"
                                            :class="{'is-invalid': errors.department}" placeholder="Department"
                                            v-model="form.department">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Faculty : :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" :class="{'is-invalid': errors.faculty}"
                                            placeholder="Faculty" v-model="form.faculty">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-2 form-label">Gender :</label>
                                    <div class="col-md-4">
                                        <select name="gender" class="form-control form-select select2"
                                            :class="{'is-invalid': errors.gender}" v-model="form.gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <label class="col-md-2 form-label">Date Of Birth:</label>
                                    <div class="col-md-4">
                                        <input type="date" class="form-control" :class="{'is-invalid': errors.dob}"
                                            v-model="form.dob">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <button type="submit" href="javascript:void(0)"
                                            class="btn btn-primary float-end is_disabled">Admin Student</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>