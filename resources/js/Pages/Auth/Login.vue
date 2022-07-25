<template>

    <Head>
        <title>Login</title>
    </Head>

    <div class="authincation section-padding">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-xl-5 col-md-6">

                    <div class="auth-form card">
                        <div class="card-body">
                            <div class="mini-logo text-center my-4">=

                                <Link href="/">
                                <img src="images/logo.png" alt="" class="logo">
                                </Link>
                            </div>
                            <form action="rou" method="post" @submit.prevent="login">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="email" type="text" class="form-control" placeholder="Email Address"
                                            :class="{'is-invalid': errors.email}" v-model="form.email">
                                        <span class="w-100 text-red text-capitalize ps-7 font-1 mt-1"
                                            v-if="errors.email">{{ errors.email }}</span>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Password</label>
                                        <input name="password" type="password" class="form-control"
                                            placeholder="**********" v-model="form.password"
                                            :class="{'is-invalid': errors.password}">
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input name="acceptTerms" type="checkbox" class="form-check-input ">
                                            <label class="form-check-label">Remember me</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 d-grid gap-2"><button type="submit"
                                        class="btn btn-primary mr-2">Login</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>


<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {

  components: {
    Head,
    Link,
  },

  props: {
      errors: String
  },

  data() {
      return {
        //   error: String,
          form: this.$inertia.form({
              email: 'suadmin@gmail.com',
              password: '123456',
              remember: true,
          }),
      }
  },

  methods: {
      login() {
          this.form.post('/login');
      }
  }
}
</script>


<style scoped>

</style>
