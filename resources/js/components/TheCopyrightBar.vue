<template>
    <div>
        <div class="copyright-bg">
            <div class="container copyright-container">
                <div class="copyright-bar py-3">
                    <div>
                        <div>Made with <i class="fa-solid fa-heart"></i> + <img class="brain-ico" src="https://img.icons8.com/external-glyph-icons-maxicons/85/000000/external-brain-medical-glyph-glyph-icons-maxicons.png"/> by Team 4</div>
                        <div class="d-flex gap-2 align-items-center team-names">
                            <div>© 2022</div>
                            <a href="https://github.com/felicetto13">Felice</a>
                            <a href="https://github.com/Michael-Bombini">Michael</a>
                            <a href="https://github.com/erica201193">Erica</a>
                            <a href="https://github.com/br4nc4">Giuseppe</a>
                            <a href="https://github.com/LucaSk-x">Luca</a>
                        </div>
                    </div>
        
                    <div class=" d-flex d-none d-md-block">
                        <a class="social-icon facebook-icon mx-2" href="#facebook"><i class="fa-brands fa-facebook fa-lg"></i></a>
                        <a class="social-icon insta-icon mx-2" href="#insta"><i class="fa-brands fa-instagram fa-lg"></i></a>
                        <a class="social-icon twitter-icon mx-2"  href="#twitter"><i class="fa-brands fa-twitter fa-lg"></i></a>
                    </div>
        
                    <div class="logo">
                        <img id="deliveboo" src="/img/deliveboo-logo.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>

</script>

<style lang="scss" scoped>
    #deliveboo{
        width: 120px;
        filter: brightness(0) invert(1);
    }

    .social-icon {
        transition: 0.3s ease-in-out;
    }
    .facebook-icon {
        &:hover{
            color: #1877F2;
        }
    }
    .insta-icon {
        &:hover{
            color: #E4405F;

        }
    }
    .twitter-icon {
        &:hover{
            color: #1DA1F2;
        }
    }

    
    .copyright-bg {
        background: #0b0b0b;
        width: 100%;


    }
.copyright-container {
    border-top: 1px solid #3da5d9;
}

    .copyright-bar{ 
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;

        & a{
            text-decoration: none;
            color: white;
        }

        & li{
            display: inline-block;
        }
        

    }

    .brain-ico {
        width: 20px;
        filter: brightness(0) invert(1);

    }

.team-names {
    a {
        color: #4ecdf0;
        transition: all 0.3s ease;
    
    &:hover {
        transform: scale(1.1);
        transition: all 0.3s ease;
        color: #22a7fa;
    }
    }

}

    @media only screen and (max-width: 460px){
        #deliveboo{
        width: 100px;
        }
    }
</style>
