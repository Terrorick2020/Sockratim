import { createRouter, createWebHashHistory } from "vue-router";
import MainPage from "./MainPage.vue";
import LoginPage from "./LoginPage.vue";
import RegistrationPage from "./RegistrationPage.vue";
import PersonalPage from "./PersonalPage.vue"


export default createRouter({
    history: createWebHashHistory(),
    routes: [
        { path: '/home', component: MainPage, meta: { title: 'Главная страница' } , alias: "/" },
        { path: '/registration', component: RegistrationPage, meta: { title: 'Регистрация' } },
        { path: '/login', component: LoginPage, meta: { title: 'Авторизация' } },
        { path: '/client', component: PersonalPage, meta: { title: 'Личный кабинет' } },
    ]
});