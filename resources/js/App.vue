<template>
    <div class="container display-6">
        <TheNavbar></TheNavbar>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        <i class="fa-solid fa-user"></i>
        <Home></Home>

        <TheFooter></TheFooter>
    </div>
</template>

<script>
import TheNavbar from "./components/TheNavbar.vue";
import TheFooter from "./components/TheFooter.vue";
import Home from "./pages/Home.vue";

export default {
    components: { TheNavbar, TheFooter, Home },
};
</script>

<style lang="scss" scoped>
@import "../sass/app.scss";
i {
    width: 32px;
    height: 32px;
}
</style>
