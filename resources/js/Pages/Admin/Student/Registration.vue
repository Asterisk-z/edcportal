
<template>

    <Head>
        <title>Student Registration</title>
    </Head>



    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Student Registration</h4>
                        </div>
                        <div class="card-body">
                            <form action="#" @submit.prevent="getStudentData" v-if="!validatedStudent">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6  mb-2">
                                        <label class="form-label">Payment Code</label>
                                        <input name="paymentCode" type="text" class="form-control"
                                            v-model="confirmationForm.paymentCode">
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6  mb-2">
                                        <label class="form-label">Full Name</label>
                                        <input name="name" type="text" class="form-control"
                                            v-model="confirmationForm.name" placeholder="Enter Full Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-4 col-xl-4 col-lg-4  mb-2">
                                        <label class="form-label">Email</label>
                                        <input name="email" type="text" class="form-control"
                                            v-model="confirmationForm.email" placeholder="Enter Email">
                                    </div>
                                    <div class="col-xxl-4 col-xl-4 col-lg-4  mb-2">
                                        <label class="form-label">Registration Number</label>
                                        <input name="phone" type="text" class="form-control"
                                            v-model="confirmationForm.regNumber"
                                            placeholder="Enter Registration number">
                                    </div>
                                    <div class="col-xxl-4 col-xl-4 col-lg-4  mb-2">
                                        <label class="form-label">Sex</label>
                                        <select name="level" class="form-control" v-model="confirmationForm.gender">
                                            <option value="male" selected>Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-4 col-xl-4 col-lg-4  mb-2">
                                        <label class="form-label">Faculty</label>
                                        <select name="faculty" class="form-control" v-model="confirmationForm.faculty"
                                            @change="callDepartment">
                                            <option selected>Select Faculty</option>
                                            <option v-for="faculty in faculties" :value="[faculty.id, faculty.name]">
                                                Faculty of {{
                                                faculty.name }}</option>
                                        </select>
                                    </div>

                                    <div class="col-xxl-4 col-xl-4 col-lg-4  mb-2">
                                        <label class="form-label">Department</label>
                                        <select name="department" class="form-control"
                                            v-model="confirmationForm.department">
                                            <option selected>Select Department</option>
                                            <option v-for="department in departments"
                                                :value="[department.id, department.name.toLowerCase()]"
                                                class="text-capitalize">Department
                                                of
                                                {{ department.name.toLowerCase() }}</option>
                                        </select>
                                    </div>

                                    <div class="col-xxl-4 col-xl-4 col-lg-4  mb-2">
                                        <label class="form-label">Level</label>
                                        <select name="level" class="form-control" v-model="confirmationForm.level">
                                            <option value="100" selected>100</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                            <option value="400">400</option>
                                            <option value="500">500</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary mr-2">Search
                                        Student</button>
                                </div>
                            </form>

                            <div class="table-responsive table-icon" v-if="validatedStudent">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Details We Expect</th>
                                            <th>Details You Provided</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <span><i class="ri-check-line text-success me-1"></i></span>
                                            </td>
                                            <td>{{ validatedStudent.name }}</td>
                                            <td>{{ confirmationForm.name }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span><i class="ri-check-line text-success me-1"></i></span>
                                            </td>
                                            <td>{{ validatedStudent.registration_number }}</td>
                                            <td>{{ confirmationForm.regNumber }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span><i class="ri-check-line text-success me-1"></i></span>
                                            </td>
                                            <td>{{ validatedStudent.session }}</td>
                                            <td>{{ confirmationForm.session }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span><i class="ri-check-line text-success me-1"></i></span>
                                            </td>
                                            <td>{{ validatedStudent.payment_code }}</td>
                                            <td>{{ confirmationForm.paymentCode }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span><i class="ri-check-line text-success me-1"></i></span>
                                            </td>
                                            <td>{{ validatedStudent.faculty }}</td>
                                            <td>{{ confirmationForm.faculty[1] }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span><i class="ri-check-line text-success me-1"></i></span>
                                            </td>
                                            <td>{{ validatedStudent.department }}</td>
                                            <td>{{ confirmationForm.department[1] }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span><i class="ri-close-line text-danger"></i></span>
                                            </td>
                                            <td>{{ validatedStudent.level }}</td>
                                            <td>{{ confirmationForm.level }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12" v-if="validatedStudent">
                    <div class="card">
                        <div class="card-body">
                            <form @submit.prevent="registerStudent">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6  mb-2">
                                        <label class="form-label">Program Type</label>
                                        <select name="level" class="form-control" v-model="mainForm.programType">
                                            <option value="NUC" selected>NUC</option>
                                            <option value="CES">CES</option>
                                        </select>
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6  mb-2">
                                        <label class="form-label">Phone Number</label>
                                        <input name="MatricNumber" type="text" class="form-control"
                                            v-model="mainForm.phoneNumber" placeholder="Enter number">
                                    </div>

                                    <div class="col-xxl-12 col-xl-12 col-lg-12  mb-2">
                                        <label class="form-label">Courses</label>
                                        <div class="row">
                                            <template v-for="course in courses" :title="course.level">
                                                <input type="checkbox" name="course" :value="course.id"
                                                    :id="'courseCheckBox'+course.id"
                                                    v-model="mainForm.coursesToRegister"
                                                    v-if="confirmationForm.level >= course.level" />{{ course.title }}
                                                <!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 text-center"
                                                    v-if="confirmationForm.level >= course.level">
                                                    <div class="balance-stats courses c-pointer "
                                                        @click="checkTheBox(course.id, '#courseCheckBox')">
                                                        <h3>{{ course.title }}</h3>
                                                        <p>NGN {{ course.fee.toLocaleString('en-US') }} </p>
                                                        <p>{{ course.level }} Level Student</p>


                                                    <input type="checkbox" name="course" :value="course.id"
                                                            :id="'courseCheckBox'+course.id"
                                                            v-model="mainForm.coursesToRegister" hidden />
                                                    </div>
                                                </div> -->
                                            </template>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12 col-xl-12 col-lg-12  mb-3">
                                        <label class="form-label">Are you Writing as Carryover</label>
                                        <div class="row">
                                            <template v-for="retakeCourse in retakeCourses" :title="retakeCourse.title">
                                                <input type="checkbox" name="retakeCourse" :value="retakeCourse.id"
                                                    :id="'retakeCourseRadio'+retakeCourse.id"
                                                    v-model="mainForm.coursesToRetake" />{{ retakeCourse.title }}
                                                <!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 text-center"
                                                    v-if="parseInt(confirmationForm.level) + 100 >= retakeCourse.level">
                                                    <div class="balance-stats retakecourses c-pointer h-100 mb-4"
                                                        @click="checkTheBox(retakeCourse.id, '#retakeCourseRadio')">
                                                        <h3>{{ retakeCourse.title }}</h3>
                                                        <p>NGN {{ retakeCourse.fee.toLocaleString('en-US') }} </p>
                                                        <p>{{ retakeCourse.level }} Level Student</p>
                                                        <input type="checkbox" name="retakeCourse"
                                                            :value="retakeCourse.id"
                                                            :id="'retakeCourseRadio'+retakeCourse.id" class="d-none"
                                                            v-model="mainForm.coursesToRetake" />
                                                    </div>
                                                </div> -->
                                            </template>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-xl-6 col-lg-6  mb-2">
                                        <label class="form-label">Ventures</label>
                                        <select name="level" class="form-control" v-model="mainForm.venture">
                                            <option v-for="venture in ventures" :value="venture.id">{{ venture.name }} - NGN {{
                                                venture.fee.toLocaleString('en-US') }}</option>
                                        </select>
                                    </div>

                                    <!-- <div class="col-xxl-12 col-xl-12 col-lg-12  mb-2">
                                        <label class="form-label">Ventures</label>
                                        <div class="row">

                                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 text-center"
                                                v-for="venture in ventures">
                                                <div class="balance-stats c-pointer" :title="venture.name"
                                                    @click="checkRadioButton(venture.id, '#ventureRadio')">
                                                    <h3>{{ venture.name.substring(0, 20) }}</h3>
                                                    <p>NGN {{ venture.fee.toLocaleString('en-US') }}</p>
                                                    <input type="radio" name="venture" :value="venture.id"
                                                        :id="'ventureRadio'+venture.id" class="d-none"
                                                        v-model="mainForm.ventures" />
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                </div>
                                <div class="mt-3"><button type="submit" class="btn btn-primary mr-2">Register</button>
                                </div>
                            </form>
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
import axios from "axios";
import swal from 'sweetalert';

export default {
    components: {
        Link,
        Head,
    },
    layout: Layout,
    props: {
        errors: Object,
        faculties: Object,
        ventures: Object,
        courses: Object,
        retakeCourses: Object,
    },
    mounted() {
        self = this;
    },
    data() {
        return {
            confirmationForm: this.$inertia.form({
                paymentCode: '033145214511632389913951',
                faculty: null,
                department: null,
                level: 400,
                regNumber: null,
                name: null,
                gender: null,
                email: null,
                session: '2020/2021',
            }),
            mainForm: this.$inertia.form({
                phoneNumber: null,
                programType: null,
                coursesToRegister: [],
                coursesToRetake: [],
                venture: 1,
                confirmData: null,
                apiData: null,
            }),
            formData: new FormData(),
            validatedStudent: false,
            inputValue: "",
            departments: [],
            checkedNames: null,
        };
    },
    methods: {
        async getStudentData() {

            if (this.confirmationForm.paymentCode == null || this.confirmationForm.level == null || this.confirmationForm.gender == null
                || this.confirmationForm.faculty == null || this.confirmationForm.department == null || this.confirmationForm.email == null
                || this.confirmationForm.regNumber == null || this.confirmationForm.name == null) {
                return swal({
                        title: "Error",
                        text: "All Field is required",
                        button: "Try Again",
                });
            } else {
                this.formData.append('paymentCode', this.confirmationForm.paymentCode);
                this.formData.append('level', this.confirmationForm.level);
                parent.student = this.validatedStudent;
                const student = await axios.post('/admin/students/verify/payment', this.formData)
                    .then(function (response) {
                        if (response.data) {
                            parent.student = response.data;
                        } else {
                            throw 'cancel'
                        }
                    })
                    .catch(function (error) {
                        swal({
                            title: "Error",
                            text: "Wrong Payment Code",
                            icon: "error",
                            button: "Try Again",
                        });
                    });
                this.validatedStudent = parent.student;
            }
        },
        registerStudent() {
            this.mainForm.confirmData = this.confirmationForm;
            this.mainForm.apiData = this.validatedStudent;
            // console.log(this.mainForm);
            this.mainForm.post('/admin/students/register');
        },
        async callDepartment() {
            const departments = await axios.get(`/departments/${this.confirmationForm.faculty[0]}`)
                .then(function (response) {
                    return response.data;
                })
            this.departments = departments;

        },
        checkRadioButton(id, field) {
            const oldActiveParent = document.querySelector('.balance-stats.active');
            if (oldActiveParent) oldActiveParent.classList.remove('active');
            const radio = field + id;
            const radioDom = document.querySelector(radio);
            radioDom.checked = true;
            const radioParent = document.querySelector(radio).parentElement;
            if (radioDom.checked) {
                radioParent.classList.add('active');
                this.mainForm.venture = id;
            }

        },
        checkTheBox(id, field) {

            const checkbox = field + id;
            const checkboxDom = document.querySelector(checkbox);
            checkboxDom.checked = !checkboxDom.checked;
            const checkboxParent = document.querySelector(checkbox).parentElement;
            if (checkboxDom.checked) {
                checkboxParent.classList.add('active');
            } else {
                checkboxParent.classList.remove('active');
            }

        },
        reset() {
            this.mainForm = mapValues(this.mainForm, () => null)
        }
    },
    computed: {
        getFaculty(id) {
            // this.faculties.map(faculty => {
            //     if (faculty.id == id) {
            //         return faculty
            //     }
            // })
            return id
        },
        getDepartment(id) {

        },
    }

}
</script>


