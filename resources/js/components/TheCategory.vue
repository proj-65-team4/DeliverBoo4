<template>
    <div class="category-item">
        <img :src="category.image" alt="">
    </div>
    
</template>

<script>
    export default {
        name : "TheCategory",
        props : {
            category : Object
        }
    }
</script>

<style lang="scss" scoped>
img {
    width: 100%;
    aspect-ratio: 16/9;
    object-fit: cover;
    object-position: center;
    background-position:  center;
}



</style>