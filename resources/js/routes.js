import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./pages/Home.vue";
import ProductShow from "./pages/ProductShow.vue"
import ProductIndex from './pages/ProductIndex.vue';

Vue.use(VueRouter);

export const routes = [

  { 
    path: "/", 
    component: Home, 
    name: "home.index" 
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

];
