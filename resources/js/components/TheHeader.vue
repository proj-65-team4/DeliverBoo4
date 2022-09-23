<template>
    <div>
        <TheNavbar class="fixed-top"></TheNavbar>
        <div class="jumbotron" id="jumbotron">
            <div class="bg-jumbo"><img src="/img/food-jumbo.jpg" alt=""></div>
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
    .bg-jumbo{
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
    .bg-jumbo img{
        width: 100%;
        height: 95%;
        object-fit: cover;
        object-position: 50% 80%;
    }

    @media only screen and (max-width: 460px){
        .jumbotron{
        height: 250px;
        position:relative;
    }
    }
</style>