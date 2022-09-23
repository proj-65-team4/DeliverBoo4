<template>
    <div>
        <div class="row py-2">
            <div class="col">
                <router-link :to="{name: 'restaurant.products', params:{'restaurant_id': restaurant.user_id}}">
                    <div class="card p-4">
                        <!-- <img :src="restaurant.image" alt="" class="img-fluid"> -->
                        <h5>{{ restaurant.restaurant_name }}</h5>
                        <h6>{{ restaurant.address}}, {{ restaurant.city }}</h6>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        restaurant: Object
    }
}
</script>

<style lang="scss" scoped>
a {
    text-decoration: none;
    color: black;
    transition: all 0.2s ease-in-out;

    &:hover {
        color: rgb(40, 191, 214);
    }
}
</style>