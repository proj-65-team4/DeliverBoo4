<template>
    <div class="container display-6">
        <TheNavbar></TheNavbar>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        <i class="fa-solid fa-user"></i>
        <div class="container">
        <router-view></router-view>
        </div>

        <TheFooter></TheFooter>
    </div>
</template>

<script>
import TheNavbar from "./components/TheNavbar.vue";
import TheFooter from "./components/TheFooter.vue";

export default {
    components: { TheNavbar, TheFooter },
};
</script>

<style lang="scss" scoped>
@import "../sass/app.scss";
i {
    width: 32px;
    height: 32px;
}
</style>
