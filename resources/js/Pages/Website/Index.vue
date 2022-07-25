<template>

    <Head title="Welcome" />

    <div class="wrapper clearfix" id="wrapperParallax">

        <header class="header header-transparent header-sticky">
            <nav class="navbar navbar-sticky navbar-expand-lg" id="primary-menu">
                <div class="container">
                    <a class="logo navbar-brand" href="#">
                        <img class="logo logo-dark" src="images/logo.png" alt="Logo" />
                        <img class="logo logo-light" src="images/logo-light.png" alt="Logo" />
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarContent" aria-expanded="false"><span
                            class="navbar-toggler-icon"></span></button>

                </div>
            </nav>
        </header>

        <section class="hero hero-lead" id="hero">
            <div class="hero-cotainer bg-overlay bg-overlay-dark bg-section"
                style="background-image: url('images/bgg.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                            <div class="hero-content">
                                <p class="hero-subtitle">Welcome to</p>
                                <h1 class="hero-title">University of calabar EDC Registration Portal</h1>
                                <div class="hero-action">
                                    <Link class="btn btn--primary" data-bs-toggle="slide" href="/login">
                                        Login
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

</template>


<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
export default {
    components: {
        Head,
        Link,
    },
}
</script>

<style scoped>

</style>
