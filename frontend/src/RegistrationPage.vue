<template>
    <Header :logoImg="logoImg" :links="links" />
    <RegForm />
    <Footer />
</template>

<script>
import Header from "./components/Header.vue";
import RegForm from "./components/RegForm.vue";
import Footer from "./components/Footer.vue";

export default {
    components: { Header, RegForm, Footer },
    data() {
        return {
            logoImg: 'registration__logo.png',
            links: [
                {
                    "dir": "/home",
                    "name": "Главная"
                },
                {
                    "dir": "/login",
                    "name": "Войти"
                }
            ]
        }
    }
}
</script>

<style lang="scss"></style>