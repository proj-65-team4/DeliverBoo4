<template>
    <div>
        <TheNavbar class="fixed-top"></TheNavbar>
        <div class="jumbotron" :class="[this.$route.name === 'home' ? 'home-jumbo' : 'pages-jumbo']">
            <div class="bg-jumbo"><img src="/img/food2-jumbo.png" alt=""></div>
        </div>
    </div>
</template>

<script>

import TheNavbar from './TheNavbar.vue';
    export default {
    components: { TheNavbar },
    
}
</script>

<style lang="scss" scoped>
    .jumbotron{
        position:relative;
    }
    .home-jumbo {
        min-height: 700px;
    }
    .pages-jumbo {
        min-height: 300px;
    }
    .bg-jumbo{
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
    .bg-jumbo img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: 50% 80%;
    }


@media only screen and (max-width: 468px){
    .jumbotron{
        height: 250px;
    }
}
</style>