<template>
    <div class="side-header">
        <a class="header-brand1" href="#">
            <img :src="logo" lass="header-brand-img light-logo" alt="logo" style="max-width: 100px;">
            <!-- <img :src="logo" class="header-brand-img light-logo1" alt="logo">/ -->
        </a>
        <!-- LOGO -->
    </div>
</template>

<script>
export default {

    data() {
        return {

        };
    },

    mounted() {

    },

    methods: {

    },
    computed: {
        logo() {
            return '/assets/images/logo.png'
        }
    }
};
</script>

<style scoped>

</style>
