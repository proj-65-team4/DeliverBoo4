<template>
    <div>
        <div class="bg-footer">
            <div class="container">
                <div class="row pt-5 pb-4">
                    <div class="col">
                        <div class="footer-title pb-3">Scopri DeliveBoo</div>
                        <ul class="link-list">
                            <li v-for="link in scopriLinks" :key="link.link"> 
                                <a :href="link.href">{{ link.link }}</a> 
                            </li>
                        </ul>
                    </div>     
                    <div class="col">
                        <div class="footer-title pb-3">Servizio Clienti</div>
                        <ul class="link-list">
                            <li v-for="link in clientiLinks" :key="link.link">
                                <a :href="link.href">{{ link.link }}</a> 
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <div class="footer-title pb-3">Note legali</div>
                        <ul class="link-list">
                            <li v-for="link in legalLinks" :key="link.link"> 
                                <a :href="link.href">{{ link.link }}</a>
                            </li>
                        </ul>
                    </div>         
                    <div class="col">
                        <div class="footer-title pb-3">Porta DeliveBoo con te</div>
                        <div class="">
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
        margin: 0 0.5rem;
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
        li {
            margin: 1rem 0;
        }
    }

    @media only screen and (max-width: 460px){
        /* .link-list a{
            font-size: 13px;
        } */
    }
</style>