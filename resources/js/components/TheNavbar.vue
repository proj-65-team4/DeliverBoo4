<template>
    <div>
        <!-- navbar -->
        <nav id="navscroll" class="my-navbar bg-color">
            <div class="cart">
                <span class="las la-shopping-cart"></span>
            </div>

            <div class="logo">
                <router-link :to="{ name: 'home' }">
                    <img id="deliveboo" src="/img/deliveboo-logo.svg" alt="" />
                </router-link>
            </div>

            <ul class="list-unstyled mb-0">
                <li>
                    <a class="login btn" href="/login">
                        <i class="fa-solid fa-right-to-bracket"></i> Login</a
                    >
                </li>

                <li>
                    <a class="register btn" href="/register"
                        ><i class="fa-solid fa-user"></i>Register</a
                    >
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
window.addEventListener("scroll", function () {
    if (this.window.pageYOffset > 510) {
        document.getElementById("navscroll").style.background = "#ffab00";
    } else {
        document.getElementById("navscroll").style.background ="rgba(0,0,0,0.2)";
    }
});

export default {};
</script>

<style lang="scss" scoped>
.bgcolor, .scrolled{
    background: #ffab00;
}

#deliveboo {
    width: 175px;
}

.cart {
    display: none;
}

.my-navbar {
    background: rgba(0, 0, 0, 0.2);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.8rem 200px;
    width: 100%;
    transition: background 0.8s ease;

    & a {
        text-decoration: none;
        color: white;
        font-weight: bold;
        font-size: 18px;
    }

    & li {
        display: inline-block;
    }
}

.login {
    border-radius: 4px;
    border: none;
    color: #fff;
    text-align: center;
    padding: 0.5rem 0.9rem;
    margin-right: 1rem;
    background: #3da5d9;
    &:hover {
        background: rgb(40, 191, 214);
    }
    & i {
        font-size: 1rem;
    }
}

.register {
    border-radius: 4px;
    border: none;
    color: #fff;
    text-align: center;
    padding: 0.5rem 0.9rem;
    background: #ffab00;
    &:hover {
        background: #ffca3a;
    }
    & i {
        font-size: 1rem;
        padding-right: 0.3rem;
    }
}

@media only screen and (max-width: 460px) {
    #deliveboo {
        width: 130px;
    }

    .my-navbar {
        padding: 0.6rem 0.7rem;
    }

    .my-navbar a {
        font-size: 15px;
    }

    .login {
        padding: 0.3rem 0.5rem;
    }

    .login i {
        font-size: 0.8rem;
    }

    .register {
        padding: 0.3rem 0.5rem;
    }

    .register i {
        font-size: 0.8rem;
    }
}
</style>
