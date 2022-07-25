
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
                            <form action="#" @submit.prevent="getStudentData">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6  mb-2">
                                        <label class="form-label">Payment Code</label>
                                        <input name="paymentCode" type="text" class="form-control"
                                            v-model="confirmationForm.paymentCode">
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6  mb-2">
                                        <label class="form-label">Program Type</label>
                                        <select name="level" class="form-control" v-model="confirmationForm.program">
                                            <option value="NUC" selected>NUC</option>
                                            <option value="CES">CES</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-4 col-xl-4 col-lg-4  mb-2">
                                        <label class="form-label">Email</label>
                                        <input name="email" type="text" class="form-control"
                                            v-model="confirmationForm.email">
                                    </div>
                                    <div class="col-xxl-4 col-xl-4 col-lg-4  mb-2">
                                        <label class="form-label">Phone</label>
                                        <input name="phone" type="text" class="form-control"
                                            v-model="confirmationForm.phone">
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
                                            <option v-for="faculty in faculties" :value="faculty.id">Faculty of {{
                                            faculty.name }}</option>
                                        </select>
                                    </div>

                                    <div class="col-xxl-4 col-xl-4 col-lg-4  mb-2">
                                        <label class="form-label">Department</label>
                                        <select name="department" class="form-control"
                                            v-model="confirmationForm.department">
                                            <option selected>Select Department</option>
                                            <option v-for="department in departments" :value="department.id"
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
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12" v-if="!validatedStudent">
                    <div class="card">
                        <div class="card-body">
                            <form @submit.prevent="registerStudent">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6  mb-2">
                                        <label class="form-label">Full Name</label>
                                        <input name="fullName" type="text" class="form-control"
                                            :value="mainForm.fullName" placeholder="Enter Full Name">
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6  mb-2">
                                        <label class="form-label">Matric Number</label>
                                        <input name="MatricNumber" type="text" class="form-control"
                                            v-model="mainForm.matricNumber" placeholder="Enter number">
                                    </div>

                                    <div class="col-xxl-12 col-xl-12 col-lg-12  mb-2">
                                        <label class="form-label">Courses</label>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 text-center"
                                                v-for="course in courses">
                                                <div class="balance-stats courses c-pointer" :title="course.title"
                                                    @click="checkTheBox(course.id, '#courseCheckBox')">
                                                    <h3>{{ course.title.substring(0, 20) }}</h3>
                                                    <p>NGN {{ course.fee.toLocaleString('en-US') }}</p>
                                                    <input type="checkbox" name="course" :value="course.id"
                                                        :id="'courseCheckBox'+course.id" class="d-none" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12 col-xl-12 col-lg-12  mb-2">
                                        <label class="form-label">Are you Writing as Carryover</label>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 text-center"
                                                v-for="retakeCourse in retakeCourses">
                                                <div class="balance-stats retakecourses c-pointer"
                                                    :title="retakeCourse.title"
                                                    @click="checkTheBox(retakeCourse.id, '#retakeCourseRadio')">
                                                    <h3>{{ retakeCourse.title.substring(0, 20) }}</h3>
                                                    <p>NGN {{ retakeCourse.fee.toLocaleString('en-US') }}</p>
                                                    <input type="checkbox" name="retakeCourse" :value="retakeCourse.id"
                                                        :id="'retakeCourseRadio'+retakeCourse.id" class="d-none" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12 col-xl-12 col-lg-12  mb-2">
                                        <label class="form-label">Ventures</label>
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 text-center"
                                                v-for="venture in ventures">
                                                <div class="balance-stats c-pointer" :title="venture.name"
                                                    @click="checkRadioButton(venture.id, '#ventureRadio')">
                                                    <h3>{{ venture.name.substring(0, 20) }}</h3>
                                                    <p>NGN {{ venture.fee.toLocaleString('en-US') }}</p>
                                                    <input type="radio" name="venture" :value="venture.id"
                                                        :id="'ventureRadio'+venture.id" class="d-none" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-4 col-xl-4 col-lg-4  mb-2">
                                        <label class="form-label"></label>
                                        <input name="paymentCode" type="text" class="form-control"
                                            v-model="mainForm.paymentCode">
                                    </div>

                                </div>
                                <div class="mt-3"><button type="submit" class="btn btn-primary mr-2">Save</button>
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
                email: null,
                level: null,
            }),
            mainForm: this.$inertia.form({
                fullName: "Olang Daniel",
                matricNumber: null,
                email: null,
                phoneNumber: null,
                gender: null,
                programType: null,
                faculty: null,
                department: null,
                level: null,
                coursesToRegister: [],
                venture: null,
            }),
            formData: new FormData(),
            validatedStudent: false,
            inputValue: "",
            departments: [],
        };
    },
    methods: {
        async getStudentData() {
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
            this.validatedStudent = parent.student
        },
        registerStudent() {
            console.log(this.mainForm.venture);
            // this.mainForm.post('/admin/student-management/store');
        },
        async callDepartment() {
            const departments = await axios.get(`/departments/${this.confirmationForm.faculty}`)
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
            console.log(checkbox, checkboxDom)
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
    }

}
</script>


