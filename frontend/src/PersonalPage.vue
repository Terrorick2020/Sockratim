<template>
    <Header :logoImg="logoImg" :links="links" />
    <PersoneHead />
    <PersonePanel :user_data="user_data" />
    <Footer />
</template>

<script>
import Header from "./components/Header.vue";
import PersoneHead from "./components/PersoneHead.vue";
import PersonePanel from "./components/PersonePanel.vue";
import Footer from "./components/Footer.vue";

export default {
    components: { Header, PersoneHead, PersonePanel, Footer },
    props: {
        user_data: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            logoImg: 'client__logo.png',
            links: [
                {
                    "dir": "/home",
                    "name": "Главная"
                },
                {
                    "dir": "/home",
                    "name": "Выйти"
                }
            ]
        }
    }
}
</script>

<style lang="scss"></style>