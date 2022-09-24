<template>
    <div class="category-item">
        <div class="overlay"> 
            <div class="content">
                <h2>{{category.name}}</h2>
                <p class="d-md-none d-lg-block">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, repellat!</p>
                <router-link :to="{name:'restaurants.index', params:{id: category.id}}" >Trova i ristoranti <i class="fa-solid fa-utensils mx-2"></i> </router-link></div>
                
            </div>
        <img :src="category.image" alt="">
       
        
    </div>
    
</template>

<script>
    export default {
        name : "TheCategory",
        props : {
            category : Object
        },

        data(){
            return{
            }
        }
    }
</script>

<style lang="scss" scoped>
.category-item {position: relative;}    
img {
    width: 100%;
    aspect-ratio: 16/9;
    object-fit: cover;
    object-position: center;
    background-position:  center;
}

.overlay {
    position : absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.4);
}
h2 {
    font-weight: bolder;
}

.content {
    padding: 1.4rem;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: space-around;
    color: #fff;


}

p {
    flex-grow: 1;
}

a {
    background-color: #dc623d;
    font-weight: bold;
    padding: 0.4rem;
    color: inherit;
    text-decoration: none;
    transition: transform 0.4s ease;
 
&:hover {
    color: inherit;
    transform: scale(1.1);
    transition: transform 0.4s ease;
}

}


</style>