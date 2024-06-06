<template>
    <header class="header">
        <div class="header__desctop-finder" :style="'height: ' + windowSize + 'px'" v-show="isFindeMode">
            <div class="desctop-finder__conteiner">
                <input type="text" id="desctop_finder" name="desctop_finder" placeholder="Поиск" v-model="finderText">
                <div class="conteiner__btns">
                    <button class="find_btn">Поиск</button>
                    <button class="exit_btn" @click="openFinderForm">Выйти</button>
                </div>
            </div>
        </div>
        <div class="header_logo">
            <router-link to="/home">
                <img :src="'../assets/' + logoImg" alt="Logo" class="logo__img">
            </router-link>
            <div class="logo__text">
                <h1 class="text__title">Сокра.тим</h1>
                <p class="text_description">Избавим Вас от длинных ссылок!</p>
            </div>
        </div>
        <nav class="header__nav-desctop" v-if="screenWidth > 1024">
            <ul class="nav-desctop__links">
                <li class="links__find">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" title="Найти" @click="openFinderForm" v-show="!isFindeMode">
                        <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                    </svg>
                </li>
                <li v-for="(item, index) in links" :key="index">
                    <router-link :to="item.dir">{{ item.name }}</router-link>
                </li>
            </ul>
        </nav>
        <button class="nav-mobile__btn" v-else-if="screenWidth <= 1024" @click="openMenu = !openMenu">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/>
            </svg>
        </button>
        <nav class="header__nav-mobile" v-show="openMenu">
            <ul class="nav-mobile__links">
                <li class="links__find">
                    <div class="find__body">
                        <input type="text" id="mobile_finder" name="mobile_finder" placeholder="Поиск" v-model="finderText">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" title="Найти">
                            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                        </svg>
                    <button @click="finderText = ''">Поиск</button>
                    </div>
                </li>
                <li v-for="(item, index) in links" :key="index">
                    <router-link :to="item.dir">{{ item.name }}</router-link>
                </li>
            </ul>
        </nav>
    </header>
</template>

<script>
export default {
    props: {
        links: {
            type: Array,
            required: true
        },
        logoImg: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            screenWidth: screen.width,
            openMenu: false,
            windowSize: screen.height,
            isFindeMode: false,
            finderText: ''
        }
    },
    mounted() {
        this.onScreenResize()
    },
    methods: {
        onScreenResize() {
            window.addEventListener('resize', () => {
                this.screenWidth = screen.width;
            });
        },
        openFinderForm() {
            this.isFindeMode = !this.isFindeMode;
            this.finderText = '';
        }
    }
}
</script>

<style lang="scss" scoped>
.header {
    margin-top: 10px;
    width: 100%;
    min-height: 100px;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
    border-bottom: 2px solid rgb(215, 215, 215);

    .header__desctop-finder {
        width: 100%;
        background: rgba(255, 255, 255, 0.815);
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1000;
        display: flex;
        justify-content: center;
        align-items: center;

        .desctop-finder__conteiner {
            position: fixed;
            display: flex;
            flex-direction: column;
            gap: 30px;
            justify-content: start;

            input {
                width: 650px;
                outline: none;
                padding: 8px 20px;
                border-radius: 10px;
            }

            .conteiner__btns {

                .find_btn {
                    width: 120px;
                    padding: 6px 0;
                    cursor: pointer;
                    border-radius: 5px;
                    border-color: rgb(105, 105, 220);
                    background: rgb(253, 253, 253);

                    &:hover {
                        background: rgb(105, 105, 220);
                        color: white;
                    }
                }
    
                .exit_btn {
                    width: 120px;
                    padding: 6px 0;
                    cursor: pointer;
                    border-radius: 5px;
                    background: rgb(237, 84, 28);
                    margin-left: 40px;

                    &:hover {
                        color: white;
                    }
                }

                button {
                    transition: all 0.8s ease;
                }

                button:hover {
                    scale: 1.05;
                    translate: 6px -3px;
                }
            }
        }
    }

    .header_logo {
        width: 40%;
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 20px;

        @media (max-width: 1023px) {
            width: 75%;
        }

        .logo__img {
            width: 100px;
            height: 100px;
            cursor: pointer;

            @media (max-width: 500px) and (min-width: 415px) {
                width: 80px;
                height: 80px;
            }

            @media (max-width: 415px) {
                width: 65px;
                height: 65px;
            }

            @keyframes rotate_cat {
                0%, 50%, 100% {
                    transform: rotate(0deg);
                }

                25% {
                    transform: rotate(-25deg);
                }

                75% {
                    transform: rotate(25deg);
                }
            }

            &:hover {
                animation: rotate_cat 3s linear;
            }
        }

        .logo__text {
            
            .text__title {
                @media (min-width: 1460px) {
                    font-weight: 800;
                    font-size: 35px;
                }

                @media (min-width: 1040px) and (max-width: 1460)  {
                    font-weight: 700;
                    font-size: 32px;
                }

                @media (min-width: 500px) and (max-width: 1040px)  {
                    font-weight: 650;
                    font-size: 30px;
                }

                @media (max-width: 500px) {
                    font-weight: 550;
                    font-size: 27px;
                }
            }

            .text_description {
                @media (min-width: 1460px) {
                    font-weight: 500;
                    font-size: 20px;
                }

                @media (min-width: 1040px) and (max-width: 1460px)  {
                    font-weight: 400;
                    font-size: 18px;
                }

                @media (min-width: 500px) and (max-width: 1040px)  {
                    font-weight: 400;
                    font-size: 16px;
                }

                @media (max-width: 500px) {
                    font-weight: 350;
                    font-size: 14px;
                }
            }
        }
    }

    .header__nav-desctop {
        width: 60%;

        @media (max-width: 1023px) {
            width: 25%;
        }

        .nav-desctop__links {
            width: 100%;
            height: 100%;
            list-style: none;
            display: flex;
            flex-direction: row;
            justify-content: end;
            align-items: center;
            transition: all 0.8s ease;

            .links__find {
                margin-right: 3.5%;

                svg {
                    width: 20p;
                    height: 20px;
                    cursor: pointer;
                    transition: all 0.5s ease;

                    &:hover {
                        rotate: 20deg;

                        path {
                            fill: rgb(21, 21, 21);
                        }
                    }

                    path {
                        fill: rgb(104, 104, 104);
                        transition: all 0.5s ease;
                    }
                }
            }

            li:not(:first-of-type) {
                width: 130px;
                border: 1px solid silver;
                text-align: center;
                padding: 5px 0;
                cursor: pointer;
                transition: all 0.8s ease;
                
                &:not(:last-of-type) {
                    margin-right: 5%;
                }

                &:hover {
                    scale: 1.05;
                    translate: 10px -5px;
                    border-color: rgb(130, 130, 130)
                }
            }
        }
    }

    .nav-mobile__btn {
        border: 0;
        
        svg {
            width: 50px;
            height: 50px;

            @media (max-width: 500px) {
                width: 38px;
                height: 38px;
            }
        }
    }

    .header__nav-mobile {
        width: 100%;

        .nav-mobile__links {
            list-style: none;
            text-align: center;

            li {
                padding: 10px 0;

                &:not(:first-of-type) {
                    border-top: 1px solid rgb(227, 227, 227);

                    &:hover {
                        background-color: rgb(169, 169, 169);

                        a {
                            color: aqua;
                        }
                    }
                }
            }  

            .links__find {
                width: 100%;
                display: flex;
                justify-content: center;

                .find__body {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: space-between;
                    position: relative;
                    width: 400px;

                    @media (max-width: 450px) {
                        justify-content: center;
                    }

                    input {
                        width: 220px;
                        min-height: 30px;
                        padding: 5px 40px 5px 15px;
                        font-size: 15px;
                        border-radius: 5px;
                        outline: none;
                        border-color: rgb(72, 72, 72);

                        @media (max-width: 450px) {
                            width: 80%;
                            margin-bottom: 20px;
                        }
                    }
        
                    svg {
                        width: 17px;
                        height: 17px;
                        position: absolute;
                        left: 48%;
                        top: 8px;
                        cursor: pointer;
                        transition: all 0.5s ease;

                        @media (max-width: 450px) {
                            left: 82%;
                        }
    
                        &:hover {
                            rotate: 20deg;
    
                            path {
                                fill: rgb(21, 21, 21);
                            }
                        }
    
                        path {
                            fill: rgb(104, 104, 104);
                            transition: all 0.5s ease;
                        }
                    }

                    button {
                        width: 120px;
                        padding: 6px 0;
                        cursor: pointer;
                        border-radius: 5px;
                        border-color: rgb(105, 105, 220);
                        background: rgb(253, 253, 253);
                        transition: all 0.8s ease;

                        @media (max-width: 450px) {
                            width: 80%;
                            margin-bottom: 20px;
                        }

                        &:hover {
                            background: rgb(105, 105, 220);
                            color: white;
                            scale: 1.05;
                            translate: 6px -3px;
                        }
                    }
                }

            }
        }
    }
}
</style>