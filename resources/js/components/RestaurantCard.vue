<template>
    <div class="py-3 m-auto">
                <router-link :to="{name: 'restaurant.products', params:{'restaurant_slug': restaurant.slug}}">
                    <div class="row p-3 border rounded shadow">
                        <div class="col-sm-12 col-md-3">
                            <div class="w-100">
                                <img :src="'/storage/'+restaurant.image" alt="" v-if="restaurant.image" class="w-100 rounded card-img">
                                <img src="https://cwdaust.com.au/wpress/wp-content/uploads/2015/04/placeholder-restaurant.png" alt="" class="card-img rounded" v-else>
                            </div>
                        </div>
                        <div class="col">
                            <h4 class="fw-bold text-capitalize">{{ restaurant.restaurant_name }}</h4>
                            <div class="row">
                                <div class="col-md-6 location">
                                    <h6 class="text-capitalize">{{ restaurant.address}}</h6>
                                    <h6> {{ restaurant.city}}</h6>
                                </div>
                                <div class="col-sm-12 col-md-6 random text-muted">
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
    object-position: center;
}

.location{
    flex-shrink: 0;
}

h4{
    margin-bottom: 0.8rem;
}

@media only screen and (max-width: 768px){
    .random{
        font-size: 14px;
    }
}

@media only screen and (max-width: 768px){
    .card-img{
        padding-bottom: 1rem;
    }
}
</style>