import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./pages/home.vue";
import ProductShow from "./pages/ProductShow.vue";
import ProductIndex from './pages/ProductIndex.vue';
import RestaurantIndex from './pages/RestaurantIndex.vue';

Vue.use(VueRouter);

export const routes = [

  { 
    path: "/", 
    component: Home, 
    name: "home" 
  },

  {
    path: "/prodotti",
    component: ProductIndex,
    name: "product.index",
    meta: { title: "Ristorante" },
  },


  {
    path: "/prodotto/:id",
    component: ProductShow,
    name: "product.show",
    meta: { title: "Prodotto ristorante" },
  },

  {
    path: "/restaurants/:id",
    component: RestaurantIndex,
    name: "restaurants.index",
    meta: { title: "Ristoranti" },
  },

];
