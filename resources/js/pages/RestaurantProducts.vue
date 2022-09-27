<template>
    <div>
        <div class="container">
            <!-- PROVA CARRELLO IN PAGINA! -->
            <!-- <div v-if="cart.length === 0">Il tuo carrello è vuoto</div>
            <div class="row flex-column" v-else>
                <div
                    class="col-3 card my-2"
                    v-for="item in cart"
                    :key="item.id + item.name"
                >
                    <img :src="item.image" alt="" style="width: 250px" />
                    <span>Prodotto aggiunto: {{ item.name }}</span>
                    <span>Quantità: {{ item.quantity }}</span>
                    <span> Prezzo: {{ (item.price * item.quantity).toFixed(2) }}</span>
                </div>
            </div> -->
            

            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item" v-for="course in courses" :key="course.id">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            :data-bs-target="'#flush-collapseOne-'+course.id"
                            aria-expanded="false"
                            aria-controls="flush-collapseOne"
                            @click="changeID(course.id)" >
                            <span class="fw-bold">{{course.name}}</span>
                        </button>
                    </h2>

                    <div :id="'flush-collapseOne-'+course.id" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row mt-4 mb-5">
                <div
                    class="col-sm-12 col-md-4"
                    v-for="(product, index) in filteredProducts"
                    :key="product.id"
                >
                    <!-- v-if="product.product_course_id == course.id" -->
                    <div  class="product-card">
                        <img :src="product.image" alt="" />

                        <div class="under-image">
                            <div class="title-price">
                                <h5>{{ product.name }}</h5>
                                <h5>€ {{ product.price }}</h5>
                            </div>

                            <h6 class="ps-3">{{ product.description }}</h6>

                            <div class="cart-btn">
                                <div>
                                    <span>Aggiungi al carrello</span>
                                    <i class="fa-solid fa-hand-point-right"></i>
                                </div>
                                <div>quantità</div>
                                <div class="d-flex flex-column">
                                    <button @click="addCart(index)" class="btn">
                                        <i class="fa-solid fa-chevron-up"></i>
                                    </button>
                                    <button
                                        @click="removeCart(index)"
                                        class="btn"
                                    >
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        </div>
                    </div>

                </div>
            </div>

            
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            products: [],
            courses: [],
            cart: [],
            total: 0,
            id: null
        };
    },
    computed: {
        fetchData() {
            axios
                .get("/api/" + this.$route.params.restaurant_id + "/products")
                .then((resp) => {
                    console.log(resp.data);
                    this.products = resp.data.products;
                    this.courses = resp.data.courses;
                    
                });
        },
        filteredProducts(){
            return this.products.filter((el)=>{
                return el.product_course_id == this.id ? el : '' ;
            })
        }
    },
    watch: {
        cart: {
            handler(product) {
                localStorage.cart = JSON.stringify(product);
            },
            deep: true,
        },
    },
    methods: {
        removeCart(index) {
            const item = this.cart.find(
                (product) => product.id === this.products[index].id
            );
            if (item !== undefined && item.quantity !== 0) {
                item.quantity--;
                if (item.quantity === 0) {
                    const eliminaIndice = this.cart.findIndex(
                        (product) => product.id === this.products[index].id
                    );
                    this.cart.splice(eliminaIndice, 1);
                }
            }
        },
        addCart(index) {
            
            const item = this.cart.find(product => product.id === this.products[index].id);
            
            if(item === undefined ){

            if(this.cart.find(product => product.user_id == this.products[index].user_id) || localStorage.cart === undefined || JSON.parse(localStorage.cart).length === 0 ){
                this.cart.push(
                {
                ...this.products[index],
                quantity : 1,
                }
                );
            }else{
                alert("Aggiunta non valida")
            }
            }
            else 
            item.quantity++;
        },
        changeID(id){
            this.id = id;
        }
        
    },
    mounted() {
        if (localStorage.cart) {
            this.cart = JSON.parse(localStorage.cart);
        }
        this.fetchData();
    },
};
</script>

<style lang="scss" scoped>
.cart-btn {
    background-color: #3dd9bc;
    width: 100%;
    font-weight: 700;
    display: flex;
    position: absolute;
    bottom: 0;
    align-items: center;
    justify-content: space-between;
    padding: 0 0.5rem;
    margin-top: 1rem;
    color: #fff;
    & i {
        color: #fff;
    }
}
.product-card {
    width: 100%;
    display: flex;
    margin-bottom: 2rem;
    flex-direction: row;
    border-radius: 5px;
    box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.2);
}

.product-card img {
    width: 180px;
    height: 180px;
    object-fit: cover;
    object-position: center;
    flex-shrink: 0;
}

.product-card h6 {
    display: none;
}

.title-price {
    padding: 12px 12px 0px 12px;
}

.under-image {
    position: relative;
    width: 100%;
}

.accordion-button:focus {
    z-index: 3;
    border-color: #fff;
    outline: 0;
    box-shadow: none;
}

.accordion-button:not(.collapsed) {
    color: black;
    background-color: #fff;
    box-shadow: inset 0 calc(var(--bs-accordion-border-width) * -1) 0 var(--bs-accordion-border-color);
}



@media only screen and (max-width: 460px) {
    .product-card {
        width: 100%;
        margin-bottom: 2rem;
        display: flex;
        flex-direction: column;
    }
    .product-card img {
        width: 100%;
        height: 210px;
    }

    .product-card h6 {
        display: inline-block;
    }

    .under-image {
        position: relative;
        height: 180px;
    }

    .title-price {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 12px 0px 12px;
    }
}
</style>
