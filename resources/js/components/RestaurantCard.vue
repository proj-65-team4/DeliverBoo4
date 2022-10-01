<template>
    <div class="py-3 m-auto">
                <router-link :to="{name: 'restaurant.products', params:{'restaurant_slug': restaurant.slug}}">
                    <div class="row p-3 rounded custom-card">
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
                                    <!-- <div class="d-flex align-items-center gap-1">
                                        <i class="fa-solid fa-star"></i><span>{{ score }}</span>
                                        <span v-if="score >= 3.5 && score < 4" class="good">Buono</span>
                                        <span v-if="score >= 4 && score < 4.5" class="verygood">Molto buono</span>
                                        <span v-if="score >= 4.5" class="excellent">Eccellente</span>
                                    </div> -->

                                    <div class="">
                                        <div v-if="score >= 3.5 && score < 4" class="good">
                                            <i class="fa-solid fa-star"></i><span class="ps-1">{{ score }}</span>
                                            <span>Buono</span>
                                        </div>
                                        <div v-if="score >= 4 && score < 4.5" class="verygood">
                                            <i class="fa-solid fa-star"></i><span class="ps-1">{{ score }}</span>
                                            <span>Molto buono</span>
                                        </div>
                                        <div v-if="score >= 4.5" class="excellent">
                                            <i class="fa-solid fa-star"></i><span class="ps-1">{{ score }}</span>
                                            <span>Eccellente</span>
                                        </div>
                                    </div>
                                    
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
    data() {
        return{
            distance: null,
            score:null,

        }
    },
    methods: {
        randomDistance() {
            this.distance = Math.floor(Math.random() * (5 * 10 - 0.1 * 10) + 0.1 * 10) / (1*10)
            return this.distance;
        },
        randomScore() {
            this.score = Math.floor(Math.random() * (5 * 10 - 3.5 * 10) + 3.5 * 10) / (1*10)
            return this.score;
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
    },
    mounted() {
        this.randomScore();
    }
}
</script>

<style lang="scss" scoped>
a {
    text-decoration: none;
    color: black;
    transition: all 0.2s ease-in-out;

    &:hover {
        color: black;
    }
}

.custom-card {
    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    transition: 0.15s all ease-in-out;
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

.good {
    color: #356952;
}

.verygood {
    color: #4F772D;
}

.excellent {
    color: #007E8A;
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