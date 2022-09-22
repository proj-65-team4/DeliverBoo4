import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./pages/Home.vue";
import RestorantShow from "./pages/RestorantShow.vue";

Vue.use(VueRouter);

export const routes = [

  { 
    path: "/", 
    component: Home, 
    name: "home.index" 
  },

  {
    path: "/restorant/:id",
    component: RestorantShow,
    name: "restorant.show",
    meta: { title: "Prodotto ristorante" },
  },

];
