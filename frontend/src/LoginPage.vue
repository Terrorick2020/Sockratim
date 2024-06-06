<template>
    <Header :logoImg="logoImg" :links="links" />
    <LogForm />
    <Footer />
</template>

<script>
import Header from "./components/Header.vue";
import LogForm from "./components/LogForm.vue";
import Footer from "./components/Footer.vue";


export default {
    components: { Header, LogForm, Footer },
    data() {
        return {
            logoImg: 'login__logo.png',
            links: [
                {
                    "dir": "/home",
                    "name": "Главная"
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