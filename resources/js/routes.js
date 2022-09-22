import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./pages/Home.vue";
import ProductShow from "./pages/RestorantShow.vue"
import ProductIndex from './pages/RestorantIndex.vue'
import { component } from "vue/types/umd";

Vue.use(VueRouter);

export const routes = [

  { 
    path: "/", 
    component: Home, 
    name: "home.index" 
  },

  {
    path: "/prodotti",
    component: RestorantIndex,
    name: "restorant.index",
    meta: { title: "Ristorante" },
  },

  {
    path: "/Prodotto/:id",
    component: ProductShow,
    name: "restorant.show",
    meta: { title: "Prodotto ristorante" },
  },

];
