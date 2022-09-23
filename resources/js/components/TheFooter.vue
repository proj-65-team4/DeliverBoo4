<template>
    <div>
        <div class="bg-footer">
            <div class="container">
                <div class="row justify-content-between py-4 flex-nowrap">
                    <div class="col-3 d-flex align-items-center flex-column">
                        <div class="fw-bold d-inline pb-3">Scopri DeliveBoo</div>
                        <ul class="link-list">
                            <li v-for="link in scopriLinks" :key="link.link"> <a :href="link.href">{{ link.link }}</a> </li>
                        </ul>
                    </div>     
                    <div class="col-3 d-flex align-items-center flex-column">
                        <div class="fw-bold d-inline pb-3">Servizio Clienti</div>
                        <ul class="link-list">
                            <li v-for="link in clientiLinks" :key="link.link"> <a :href="link.href">{{ link.link }}</a> </li>
                        </ul>
                    </div>
                    <div class="col-3 d-flex align-items-center flex-column">
                        <div class="fw-bold d-inline pb-3">Note legali</div>
                        <ul class="link-list">
                            <li v-for="link in legalLinks" :key="link.link"> <a :href="link.href">{{ link.link }}</a> </li>
                        </ul>
                    </div>         
                    <div class="col-3 d-flex align-items-center flex-column">
                        <div class="fw-bold pb-3">Porta DeliveBoo con te</div>
                        <div class="text-center h-100">
                            <a href="#"><img src="img/app-store.png" alt="" class="w-50 mt-2"></a>
                            <a href="#"><img src="img/play-store.png" alt="" class="w-50 mt-4"></a>
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
    .bg-footer {
        background-color: #FFCA3A;
    }
    .link-list {
        list-style-type: none;
        margin-bottom: 0;
        font-size: 0.9rem;
        a {
            color: white;
            text-decoration: none;
            padding: 1rem 1rem;
            transition: 0.3s ease-in-out;
            &:hover {
                    color:  white;
                    text-shadow: 0.3rem 0.5rem 1rem rgba(black, 0.5);
                    text-decoration: underline;
                }
        }
        li {
            margin: 0.5rem 0;
        }
    }
</style>