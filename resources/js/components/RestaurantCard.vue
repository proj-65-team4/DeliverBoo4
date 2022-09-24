<template>
    <div>
        <div class="row py-2">
            <div class="col">
                <router-link :to="{name: 'restaurant.products', params:{'restaurant_id': restaurant.user_id}}">
                    <div class="card p-4 d-flex flex-row">

                        <div >
                            <img :src="'/storage/'+restaurant.image" alt="" class="img-thumbnail" v-if="restaurant.image">
                            <img src="https://cwdaust.com.au/wpress/wp-content/uploads/2015/04/placeholder-restaurant.png" alt="" class="img-thumbnail" v-else>

                        </div>
                        <div>
                            <h5>{{ restaurant.restaurant_name }}</h5>
                        <h6>{{ restaurant.address}}, {{ restaurant.city }}</h6>
                        </div>
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