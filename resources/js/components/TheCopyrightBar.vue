<template>
    <div>
        <div class="copyright-bg">
            <div class="container">
                <div class="copyright-bar py-2">
                    <div>
                        <div>Made with <i class="fa-solid fa-heart"></i> + <i class="fa-solid fa-brain"></i> by Team 4</div>
                        <div>© 2022 F M E G L</div>
                    </div>
        
                    <div class=" d-flex d-none d-md-block">
                        <a class="social-icon facebook-icon mx-2" href="#facebook"><i class="fa-brands fa-facebook fa-lg"></i></a>
                        <a class="social-icon insta-icon mx-2" href="#insta"><i class="fa-brands fa-instagram fa-lg"></i></a>
                        <a class="social-icon twitter-icon mx-2"  href="#twitter"><i class="fa-brands fa-twitter fa-lg"></i></a>
                    </div>
        
                    <div class="logo">
                        <img id="deliveboo" src="img/deliveboo-logo.svg" alt="">
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
        background: rgb(40, 191, 214);
        width: 100%;
    }
    .copyright-bar{ 
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;

        & a{
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        & li{
            display: inline-block;
        }
    }



    @media only screen and (max-width: 460px){
        #deliveboo{
        width: 100px;
        }
    }
</style>
