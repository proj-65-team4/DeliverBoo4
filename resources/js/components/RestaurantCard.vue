<template>
    <div>
        <div class="row py-2">
            <div class="col">
                <router-link :to="{name: 'restaurant.products', params:{'restaurant_id': restaurant.user_id}}">
                    <div class="row p-3 border rounded shadow">
                        <div class="col-3">
                            <div class="w-100">
                                <img :src="'/storage/'+restaurant.image" alt="" v-if="restaurant.image" class="w-100 rounded card-img">
                                <img src="https://cwdaust.com.au/wpress/wp-content/uploads/2015/04/placeholder-restaurant.png" alt="" class="card-img rounded" v-else>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="fw-bold">{{ restaurant.restaurant_name }}</h5>
                            <div class="row">
                                <div class="col">
                                    <h6>{{ restaurant.address}}</h6>
                                    <h6> {{ restaurant.city}}</h6>
                                </div>
                                <div class="col text-muted">
                                    <div><i class="fa-solid fa-location-dot"></i> {{ randomDistance() }} km</div>
                                    <div><i class="fa-solid fa-truck"></i> Consegna: {{ deliveryPrice() }}</div>
                                </div>
                            </div>
                            <div>

                            </div>
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
        restaurant: Object,
    },
    data: {
        distance: null,
    },
    methods: {
        randomDistance() {
            this.distance = Math.floor(Math.random() * (5 * 10 - 0.1 * 10) + 0.1 * 10) / (1*10)
            return this.distance;
        },
        deliveryPrice() {
            if (this.distance < 1.5) {
                return 'Gratuita'
            } else if (this.distance > 1 && this.distance < 3) {
                return 'Gratuita - Ordine minimo € 10'
            } else {
                return 'Gratuita - Ordine minimo € 15'
            }
        }
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

.card-img {
    max-width: 100%;
    max-height: 150px;
    object-fit: cover;
}
</style>