<template>
    <div>
        <div class="bg-footer">
            <div class="container">
                <div class="row test pt-5 pb-4">
                    <div class="col">
                        <div class="footer-title">Scopri DeliveBoo</div>
                        <ul class="link-list">
                            <li v-for="link in scopriLinks" :key="link.link"> 
                                <a :href="link.href"><p>{{ link.link }}</p></a> 
                            </li>
                        </ul>
                    </div>     
                    <div class="col">
                        <div class="footer-title">Servizio Clienti</div>
                        <ul class="link-list">
                            <li v-for="link in clientiLinks" :key="link.link">
                                <a :href="link.href"><p>{{ link.link }}</p></a> 
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <div class="footer-title">Note legali</div>
                        <ul class="link-list">
                            <li v-for="link in legalLinks" :key="link.link"> 
                                <a :href="link.href"><p>{{ link.link }}</p></a>
                            </li>
                        </ul>
                    </div>         
                    <div class="col">
                        <div class="footer-title">Porta DeliveBoo con te</div>
                        <div class="app-links">
                            <a href="#"><img src="/img/app-store.png" alt="" class=""></a>
                            <a href="#"><img src="/img/play-store.png" alt="" class="mt-sm-0 mt-md-4"></a>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                scopriLinks: [
                {
                    link: "Chi siamo",
                    href: "#",
                },
                {
                    link: "Ristoranti",
                    href: "/categories",
                },
                {
                    link: "Diventa partner di Deliveboo",
                    href: "#",
                },
                {
                    link: "Lavora con noi",
                    href: "#",
                },
                {
                    link: "Informativa sulla Privacy",
                    href: "#",
                },
                {
                    link: "Scarica l'app",
                    href: "#",
                },
            ],
                clientiLinks: [
                {
                    link: "Domande frequenti",
                    href: "#",
                },
                {
                    link: "Accedi",
                    href: "#",
                },
                {
                    link: "Registrati su Deliveboo",
                    href: "#",
                },
                {
                    link: "Scarica l'app di Deliveboo",
                    href: "#",
                },
                {
                    link: "Informativa sulla Privacy",
                    href: "#",
                },
                {
                    link: "Scarica l'app",
                    href: "#",
                },
            ],
                legalLinks: [
                {
                    link: "Termini e Condizioni",
                    href: "#",
                },
                {
                    link: "Informativa sulla Privacy",
                    href: "#",
                },
                {
                    link: "Politica dei cookie",
                    href: "#",
                },
                {
                    link: "Codice Etico",
                    href: "#",
                },
                {
                    link: "Media & Press",
                    href: "#",
                },
                {
                    link: "Informazioni legali",
                    href: "#",
                },
            ],
            }
        }
    }
</script>

<style lang="scss" scoped>
    img {max-width: 200px; }
    .bg-footer {
        background-color: #0b0b0b;
    }
    .footer-title {
        font-weight: bold;
        display: inline-block;
        color: #FFCA3A;
        padding-bottom: 1rem;
    }
    .link-list {
        list-style-type: none;
        margin-bottom: 0;
        font-size: 0.9rem;
        margin: 0;
        padding: 0;
        a {
            color: white;
            text-decoration: none;
            padding: 0.5rem;
            &:hover {
                    text-decoration: underline;
                }
        }
    }

    .link-list li{
        height: 50px;
    }

    .app-links{
        padding-top: 1rem;
    }


@media only screen and (max-width: 768px){
    .link-list li{
        height: 60px;
    }
}    
@media only screen and (max-width: 568px){
        a p{
            text-indent: 0px;
        }

        .link-list li{
            margin: 0;
            height: 63px;
            padding-left: 10px;
        }

        .link-list a{
            padding: 0;
        }

        p{
            margin-bottom: 0;
        }

        .row.test{
            align-items: baseline;
        }

        .footer-title{
            padding-bottom: 1.5rem;
            margin-left: 10px;
        }

        .app-links{
        padding-top: 0rem;
    }
}
</style>