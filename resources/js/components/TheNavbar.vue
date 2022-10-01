<template>
    <div>
        <!-- navbar -->
        <nav id="navscroll" class="my-navbar bg-color">
            <button
                class="btn position relative fixed-cart"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling"
                aria-controls="offcanvasScrolling"
                v-if="this.$route.name !== 'Checkout' && this.$route.name !== 'ThankYou'"
                @click="carts()"
            ><!--  -->
                <i class="fa-solid fa-cart-shopping"></i>
            </button>

            <div
                class="offcanvas offcanvas-end"
                data-bs-scroll="false"
                data-bs-backdrop="true"
                tabindex="-1"
                id="offcanvasScrolling"
                aria-labelledby="offcanvasScrollingLabel"
            >
                <div class="offcanvas-header">
                    <i class="fa-solid fa-cart-shopping fa-lg icon-color"></i>
                    <div>
                        <h5 class="offcanvas-title d-inline fw-bold" id="offcanvasScrollingLabel">
                            Carrello
                        </h5>
                    </div>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"
                    ></button>
                </div>
                <hr>
                <div class="offcanvas-body">
                    
                    <template v-if="cart.length === 0" >
                        <span>Carrello vuoto</span>
                    </template>
                    <template v-else>
                        <div class="row row-cols-3 border-bottom border-dark py-2">
                                <div class="col"><strong>Prodotto</strong></div>
                                <div class="col text-center"><strong>Quantità</strong></div>
                                <div class="col text-center"><strong>Totale</strong></div>
                            </div>
                            <div class="border-bottom border-dark py-2">
                                    <div v-for="item in cart" :key="item.id" class="row row-cols-3">
                                    <div class="col">{{ item.name }}</div>
                                    <div class="col text-center">{{ item.quantity }}</div>
                                    <div class="col text-center">€ {{
                                        (
                                            item.quantity * parseFloat(item.price)
                                        ).toFixed(2)
                                    }}</div>
                                </div>
                            </div>
                            <div class="py-2">
                                <router-link :to="{name:'Checkout'}" class="d-block btn btn-primary">
                                <button type="button" class=" bg-transparent border-0 text-white" data-bs-dismiss="offcanvas">
                                    Checkout
                                    </button>
                                    </router-link>
                            </div>
                        
                    </template>
                </div>
            </div>

            <div class="logo">
                <router-link :to="{ name: 'home' }">
                    <img id="deliveboo" src="/img/deliveboo-logo.svg" alt="" />
                </router-link>
            </div>

            <!-- <ul class="list-unstyled mb-0">
                <li> -->
                    <div class="d-flex align-items-center gap-3">
                        <template v-if="this.$route.name !== 'home'">
                            <router-link :to="{name:'home'}">
                                <button type="button" class="btn login"><i class="fa-solid fa-house fa-lg"></i></button>
                            </router-link>
                        </template>
    
                        <a class="login" href="/login">
                            <i class="fa-solid fa-right-to-bracket"></i> Accedi
                        </a>
                    </div>
                <!-- </li>
            </ul> -->
        </nav>
    </div>
</template>

<script>
window.addEventListener("scroll", function () {
    if (this.window.pageYOffset > 620) {
        document.getElementById("navscroll").style.background = "#ffab00";
    } else {
        document.getElementById("navscroll").style.background = "rgba(0,0,0,0.2)";
    }
});
/* setInterval(() => {
                JSON.parse(localStorage.cart).forEach(element => {
                    return element.quantity
                });
                console.log(JSON.parse(localStorage.cart).length)
            }, 2000); */

export default {
    data() {
        return {
            cart: [],
            length: 0,
            bool: false,
        };
    },
    methods: {
        carts() {
            /* setInterval(() => {
                console.log(JSON.parse(localStorage.cart).length)
            }, 2000); */
            if(localStorage.cart != undefined && localStorage.cart.length>0){
                this.bool=true
            }else{
                this.bool=false
            }
            /*  this.length = JSON.parse(localStorage.cart).length; */
            /* console.log(this.cart.length);
            console.log("push"); */
            this.cart = JSON.parse(localStorage.getItem("cart"));
        },
    },
    /* computed: {
        carts() {

            setInterval(() => {
                JSON.parse(localStorage.cart.quantity)
                console.log(JSON.parse(localStorage.cart).length)
            }, 2000);
            
        },
    }, */
    mounted() {
        this.carts();
    },
};
</script>

<style lang="scss" scoped>
.icon-color{
    color: #3db7d9;
}
.scrolled {
    background: #ffab00;
}

#deliveboo {
    width: 175px;
}

/* .cart {
    display: none;
}
.counter-cart {
    position: absolute;
    width: 10px;
    aspect-ratio: 1;
    padding: 0.15rem;
    border-radius: 50%;
    background-color: red;
} */

.my-navbar {
    background: rgba(0, 0, 0, 0.2);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.8rem 170px;
    width: 100%;
    transition: background 0.8s ease;

    & a {
        text-decoration: none;
        color: white;
        font-weight: bold;
        font-size: 18px;
    }

    & li {
        display: inline-block;
    }
}

.login {
    border-radius: 4px;
    border: none;
    color: #fff;
    text-align: center;
    padding: 0.7rem 0.9rem;
    background: #3da5d9;
    height: 50px;
    &:hover{
        background: #3db7d9;
    }

    & i {
        font-size: 1rem;
    }
}

.fixed-cart {
    position: fixed;
    bottom: 0;
    margin: 80px 70px;
    width: 60px;
    height: 60px;
    right: 0;
    border-radius: 50px;
    background-color: #3db7d9;

    &:hover , &:active , &:focus {
        background-color: #dc623d;
        border: 1px transparent;
    }
    

    & i {
        font-size: 1.7rem;
        color: white;
    }
}


@media only screen and (max-width: 1368px) {
    .my-navbar{
        padding: 0.6rem 100px;
    }
}

@media only screen and (max-width: 1138px) {
    .my-navbar{
        padding: 0.6rem 50px;
    }
}

@media only screen and (max-width: 968px) {
    .my-navbar{
        padding: 0.6rem 0.7rem;
    }
}

@media only screen and (max-width: 568px) {
    #deliveboo {
        width: 130px;
    }

    .my-navbar {
        padding: 0.6rem 0.7rem;
    }

    .my-navbar a {
        font-size: 15px;
    }

    .login {
        padding: 0.4rem 0.5rem;
        margin-right: 0;
    }

    .login i {
        font-size: 0.8rem;
    }
}
</style>
