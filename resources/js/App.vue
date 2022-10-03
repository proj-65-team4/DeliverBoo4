<template>
    <div>
        <TheHeader></TheHeader>
        
        <TheMain></TheMain>

        <TheFooter></TheFooter>
        <TheCopyrightBar></TheCopyrightBar>
    </div>
</template>

<script>
import TheHeader from "./components/TheHeader.vue";
import TheFooter from "./components/TheFooter.vue";
import TheMain from "./components/TheMain.vue";
import TheCopyrightBar from "./components/TheCopyrightBar.vue";

export default {
    components: { TheHeader, TheFooter, TheMain, TheCopyrightBar },
};

</script>

<style lang="scss" scoped>
@import "../sass/app.scss";

</style>