<template>
    <Header :logoImg="logoImg" :links="links" />
    <Advertisement />
    <Conditions />
    <Footer />
</template>

<script>
import Header from "./components/Header.vue";
import Advertisement from "./components/Advertisement.vue";
import Conditions from "./components/Conditions.vue";
import Footer from "./components/Footer.vue";

export default {
    components: { Header, Advertisement, Conditions, Footer },
    data() {
        return {
            logoImg: 'mainPage__logo.png',
            links: [
                {
                    "dir": "/home",
                    "name": "Главная"
                },
                {
                    "dir": "/login",
                    "name": "Войти"
                },
                {
                    "dir": "/registration",
                    "name": "Регистрация"
                }
            ]
        }
    }
}
</script>

<style lang="scss"></style>