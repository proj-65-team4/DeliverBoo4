<template>
    <div>
        <TheHeader></TheHeader>
        
        <TheMain></TheMain>

        <TheFooter></TheFooter>
    </div>
</template>

<script>
import TheHeader from "./components/TheHeader.vue";
import TheFooter from "./components/TheFooter.vue";
import TheMain from "./components/TheMain.vue";

export default {
    components: { TheHeader, TheFooter, TheMain },
};
</script>

<style lang="scss" scoped>
@import "../sass/app.scss";

</style>