import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./pages/home.vue";
import RestaurantProducts from './pages/RestaurantProducts.vue';
import RestaurantIndex from './pages/RestaurantIndex.vue';
import Checkout from './pages/Checkout.vue';
import ThankYou from './pages/ThankYou.vue';

Vue.use(VueRouter);

export const routes = [

  { 
    path: "/", 
    component: Home, 
    name: "home" 
  },

  {
    path: "/:restaurant_id/products",
    component: RestaurantProducts,
    name: "restaurant.products",
    meta: { title: "Ristorante" },
  },

  {
    path: "/restaurants/:id",
    component: RestaurantIndex,
    name: "restaurants.index",
    meta: { title: "Ristoranti" },
  },

  {
    path: "/ordini",
    component: Checkout,
    name: "Checkout",
    meta: { title: "Checkout" },
  },
  {
    path: "/thankyou",
    component: ThankYou,
    name: "ThankYou",
    meta: { title: "ThankYou" },
  },
];
