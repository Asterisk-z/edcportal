<template>
    <Head>
        <title>Student Management</title>
    </Head>
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
                                        <Link href="/admin/student-management/add" class="btn btn-primary me-2">Admit Student</Link>
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
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Faculty</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(student, key) in students.data">
                                            <td>{{ key + 1}}</td>
                                            <td>{{ student.name }}</td>
                                            <td>{{ student.email }}</td>
                                            <td>{{ student.department }}</td>
                                            <td>{{ student.faculty }}</td>
                                            <td>
                                                <Link :href="`/admin/student-management/${student.id}/display/${student.registrationNumber}`" class="btn btn-primary btn-sm ml-3">
                                                    <i class="fa fa-eye fa-1.5x "></i>
                                                </Link>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <ul class="pagination mt-5 justify-content-center" >

                                <li class="page-item " v-for="(link, key) in students.links" :class="{ 'active' : link.active ,  'page-prev' : (key == students.links[0]),  'page-next' : ( key == students.links[students.links.length - 1]) }">
                                    <a class="page-link" :key="`link-${key}`" :href="link.url" tabindex="-1" v-html="link.label"></a>
                                </li>

                            </ul>
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
    mounted(){
        console.log(this.students.links);
    },
    layout: Layout,
    props: {
        students: Object,
    }
}
</script>
