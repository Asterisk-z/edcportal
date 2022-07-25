<template>
    <Head>
        <title>Faculty List</title>
    </Head>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card p-0">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-5 col-sm-6">
                                    <h3 class="mt-2">Faculty List</h3>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-7 col-sm-6">
                                    <div class="float-sm-end float-none my-1">
                                        <Link class="btn btn-primary me-2" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modaldemo8">Add Faculty</Link>
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
                            <div class="table-responsive">
                                <table class="table border text-nowrap text-md-nowrap mb-0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(faculty, key) in faculties.data">
                                            <td>{{ key + 1}}</td>
                                            <td>{{ faculty.name }}</td>
                                            <td>
                                                <Link class="btn btn-danger btn-sm ml-3">
                                                    <i class="fa fa-trash fa-1.5x "></i>
                                                </Link>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <ul class="pagination mt-5 justify-content-center" >

                                <li class="page-item " v-for="(link, key) in faculties.links" :class="{ 'active' : link.active ,  'page-prev' : (key == faculties.links[0]),  'page-next' : ( key == faculties.links[faculties.links.length - 1]) }">
                                    <a class="page-link" :key="`link-${key}`" :href="link.url" tabindex="-1" v-html="link.label"></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modaldemo8">
                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Add Faculty</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">

                            <form class="form-horizontal" @submit.prevent="addFaculty">
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Faculty Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control theme-outline-active" v-model="form.name" :class="{'is-invalid': errors.name}">
                                        <span class="text-danger" v-if="errors.name">{{ errors.name }}</span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Add</button>
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
import { Inertia } from '@inertiajs/inertia'
import Layout from '~/Shared/Layout.vue';

export default {
    components: {
        Link,
        Head,
    },
    layout: Layout,
    props: {
        faculties: Object,
        errors: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: null
            })
        }
    },
    methods: {
        addFaculty () {

            this.form.post('/admin/faculty-management/add');

            window.location.reload();

        }
    }
}
</script>
