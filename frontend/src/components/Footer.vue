<template>
    <footer class="footer">
        <button type="button" class="scroll__up" @click="scrollUp" title="подняться к шапке сайта">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM385 231c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-71-71V376c0 13.3-10.7 24-24 24s-24-10.7-24-24V193.9l-71 71c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9L239 119c9.4-9.4 24.6-9.4 33.9 0L385 231z"/>
            </svg>
        </button>
        <p class="scroll__info"> - Подняться к шапке сайта.</p>
        <div class="footer__conteiner" :style="'width:' + 600 + 'px'">
            <div class="footer__info">
                <p>© 2024 OOO "Сокра.тим" | <a href="#">Все права защищены</a> | <a href="#">Условия предоставления услуг</a> | <a href="#">Конфиденциальность</a> | <a href="#">Юридические аспекты</a></p>
            </div>
            <div class="footer__conteiner__body">
                <div class="footer__social-networks">
                    <button class="telegram">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                            <path d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"/>
                        </svg>
                        <p class="soc__description">telegram</p>
                    </button>
                    <button class="vk">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M31.5 63.5C0 95 0 145.7 0 247V265C0 366.3 0 417 31.5 448.5C63 480 113.7 480 215 480H233C334.3 480 385 480 416.5 448.5C448 417 448 366.3 448 265V247C448 145.7 448 95 416.5 63.5C385 32 334.3 32 233 32H215C113.7 32 63 32 31.5 63.5zM75.6 168.3H126.7C128.4 253.8 166.1 290 196 297.4V168.3H244.2V242C273.7 238.8 304.6 205.2 315.1 168.3H363.3C359.3 187.4 351.5 205.6 340.2 221.6C328.9 237.6 314.5 251.1 297.7 261.2C316.4 270.5 332.9 283.6 346.1 299.8C359.4 315.9 369 334.6 374.5 354.7H321.4C316.6 337.3 306.6 321.6 292.9 309.8C279.1 297.9 262.2 290.4 244.2 288.1V354.7H238.4C136.3 354.7 78 284.7 75.6 168.3z"/>
                        </svg>
                        <p class="soc__description">vk</p>
                    </button>
                    <button class="youtube">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/>
                        </svg>
                        <p class="soc__description">youtube</p>
                    </button>
                    <button class="instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                        </svg>
                        <p class="soc__description">instagram</p>
                    </button>
                    <button class="facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/>
                        </svg>
                        <p class="soc__description">facebook</p>
                    </button>
                </div>
            </div>
        </div>
        <div class="footer__cockies">
            <button type="button" class="cookies__btn" title="настройка сайта" @click="openCoockiesForm">Cookies</button>
            <div class="cookies__form" v-show="isOpenCoockiesForm">
                <button class="form__close-window" @click="openCoockiesForm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
                    </svg>
                </button>
                <div class="form__body">
                    <h1>Настройки сайта:</h1>
                    <form>
                        <div>
                            <label for="them">Тема:</label>
                            <input name="them" id="them" type="checkbox">
                        </div>
                        <div>
                            <label for="lang">Язык:</label>
                            <select name="lang" id="lang">
                                <option selected value="">Русский</option>
                                <option value="">English</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    data() {
        return {
            isOpenCoockiesForm: false
        }
    },
    methods: {
        scrollUp() {
            window.scrollTo({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });
        },
        openCoockiesForm() {
            this.isOpenCoockiesForm = !this.isOpenCoockiesForm
        }
    }
}
</script>

<style lang="scss" scoped>
$cookiesBg: rgb(193, 193, 216);
$cookiesBorder: rgb(166, 166, 175);

.footer {
    border-top: 2px solid rgb(215, 215, 215);
    padding: 25px 0 40px 0;
    position: relative;
    margin-top: 50px;

    .scroll__up {
        position: absolute;
        left: 0px;
        cursor: pointer;
        height: 70px;
        display: flex;
        align-items: end;
        padding: 3px 3px;
        border-radius: 25px;

        @media (max-width: 424px) {
            bottom: 10px;
            left: 0;
        }
    
        &:hover {
            
            svg {
                translate: 0 -31px;
    
                path {
                    fill: #0158c1;
                }
            }
        }
    
        svg {
            width: 30px;
            height: 30px;
            transition: all 1s ease;
    
            path {
                transition: all 0.8s ease;
            }
        }
    }

    .scroll__info {
        display: none;

        @media (max-width: 424px) {
            display: block;
            position: absolute;
            left: 60px;
            bottom: 30px;
        }
    }

    .footer__conteiner {
        width: 100%;

        .footer__info {
            width: 100%;
            text-align: center;
            transition: all 0.8s ease;

            @media (min-width: 1250px) {
                width: 100%;
            }

            @media (max-width: 1249px) and (min-width: 780px) {
                width: 90%;
                margin: 0 auto;
            }

            @media (max-width: 780px) {
                width: 80%;
                margin: 0 auto;
            }

            p {
                font-size: 15px;

                a {

                    &:hover {
                        text-decoration: underline;
                    }
                }
            }
        }

        .footer__conteiner__body {
            margin-top: 40px;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: space-around;

            @media (max-width: 424px) {
                flex-direction: column-reverse;
                gap: 20px;
            }
            

            .footer__social-networks {
                width: 60%;

                @media (max-width: 510px) and (min-width: 425px) {
                    width: 40%;
                }

                @media (max-width: 424px) {
                    width: 100%;
                    display: flex;
                    justify-content: space-around;
                    margin-bottom: 60px;
                }

                button {
                    border: 0;
                    cursor: pointer;
                    transition: all 0.8s ease;

                    .soc__description {
                        display: none;
                    }

                    &:not(:first-of-type) {
                        margin-left: 30px;
                    }

                    &:hover {
                        scale: 1.05;
                        translate: 6px -3px;

                        .soc__description {
                            @media (min-width: 650px) {
                                display: block;
                            }
                        }
                    }
                }

                .telegram {
                    
                    svg {
                        width: 30px;
                        height: 30px;

                        path {
                            transition: all 0.4 ease;
                        }

                        &:hover {

                            path {
                                fill: #229ED9;
                            }
                        }
                    }
                }

                .vk {
                    
                    svg {
                        width: 30px;
                        height: 30px;

                        path {
                            transition: all 0.4 ease;
                        }

                        &:hover {

                            path {
                                fill: #3466a0;
                            }
                        }
                    }
                }

                .youtube {
                    
                    svg {
                        width: 30px;
                        height: 30px;

                        path {
                            transition: all 0.4 ease;
                        }

                        &:hover {

                            path {
                                fill: #FF0000;
                            }
                        }
                    }
                }

                .instagram {
                    
                    svg {
                        width: 30px;
                        height: 30px;

                        path {
                            transition: all 0.4 ease;
                        }

                        &:hover {

                            path {
                                fill: #3a3acb;
                            }
                        }
                    }
                }

                .facebook {
                    
                    svg {
                        width: 30px;
                        height: 30px;

                        path {
                            transition: all 0.4 ease;
                        }

                        &:hover {

                            path {
                                fill: #0158c1;
                            }
                        }
                    }
                }
            }
        }
    }

    .footer__cockies {
        width: 100%;
        display: flex;
        justify-content: end;

        @media (max-width: 570px) and (min-width: 510px) {
            margin-top: 30px;
        }

        @media (max-width: 424px) {
            margin-bottom: 60px;
        }
        
        .cookies__btn {
            cursor: pointer;
            font-size: 16px;
            transition: all 0.8s ease;
            color: rgb(170, 170, 170);
            border: 3px solid rgb(170, 170, 170);
            border-radius: 5px;
            width: 120px;
            height: 43px;

            @media (max-width: 510px) and (min-width: 425px) {
                width: 85px;
                height: 48px;
            }

            @media (max-width: 424px) {
                width: 100%;
                height: 48px;
            }

            &:hover {
                scale: 1.05;
                translate: 8px -4px;
                color: rgb(255, 255, 255);
                border-color: rgb(40, 71, 184);
                background: rgb(40, 71, 184);
            }
        }

        .cookies__form {
            width: 375px;
            height: 280px;
            background: $cookiesBg;
            border: 1px solid $cookiesBorder;
            border-radius: 5px;
            position: absolute;
            right: 2%;
            bottom: 120px;
            overflow: hidden;

            @media (max-width: 450px) and (min-width: 390px) {
                scale: 0.85;
            }

            @media (max-width: 450px) {
                right: 0.5%;
                width: 260px;
            }

            .form__close-window {
                position: absolute;
                z-index: 120;
                right: 10px;
                top: 10px;
                border: none;
                background: $cookiesBg;
                cursor: pointer;
                transition: all 0.6s ease;

                &:hover {
                    scale: 1.1;
                    translate: 2px -1px;

                    svg {

                        path {
                            fill: rgb(241, 76, 76);
                        }
                    }
                }

                svg {
                    width: 30px;
                    height: auto;

                    path {
                        fill: rgb(68, 68, 68);
                    }
                }
            }

            @keyframes rotate_animate {
                0% {
                    rotate: 0deg;
                }

                100% {
                    rotate: 360deg;
                }
            } 

            &::after {
                content: '';
                position: absolute;
                background: linear-gradient(#672c45, #b94475, #f564a0);
                width: 375px;
                height: 280px;
                top: -51%;
                left: -51%;
                transform-origin: bottom right;
                animation: rotate_animate 4s infinite linear;
                z-index: 5;
            }

            &::before {
                content: '';
                position: absolute;
                background: linear-gradient(#2e8c76, #309a85, #46ffce);
                width: 375px;
                height: 280px;
                bottom: -51%;
                right: -51%;
                transform-origin: top left;
                animation: rotate_animate 4s infinite linear;
                z-index: 5;
            }

            .form__body {
                padding: 25px 15px;
                position: relative;
                width: 98.5%;
                height: 98.5%;
                background: $cookiesBg;
                z-index: 10;
                margin: 0 auto;
                margin-top: 0.75%;
                border-radius: 5px;

                form {
                    margin-top: 40px;
                    display: flex;
                    flex-direction: column;

                    div {
                        height: 60px;
                        padding: 10px 20px;
                        display: flex;
                        flex-direction: row;
                        justify-content: space-between;

                        label {
                            font-size: 18px;
                        }

                        input[type="checkbox"] {
                            cursor: pointer;
                            position: relative;
                            width: 60px;
                            height: 30px;
                            -webkit-appearance: none;
                            -moz-appearance: none;
                            -ms-appearance: none;
                            appearance: none;
                            background: #8596ce;
                            outline: none;
                            border-radius: 20px;
                            box-shadow: inset 0 0 5px rgba(0,0,0, .25);
                            transition: all 0.5s ease;

                            &:checked {
                                background: rgb(103, 116, 130);

                                &::before {
                                    left: 30px;
                                }
                            }

                            &::before {
                                content: '';
                                position: absolute;
                                width: 30px;
                                height: 30px;
                                border-radius: 50%;
                                top: 0;
                                left: 0;
                                scale: 1.1;
                                background: white;
                                transition: all 0.5s ease;
                                box-shadow: 0 0 5px rgba(0,0,0, .3);
                            }
                        }

                        select {
                            height: 30px;
                            width: 90px;
                            cursor: pointer;
                            outline: none;
                            -webkit-appearance: none;
                            -moz-appearance: none;
                            -ms-appearance: none;
                            appearance: none;
                            background: rgba(60, 60, 60, 0.296);
                            border-radius: 5px;
                            color: rgb(237, 243, 255);
                            padding: 2px 15px;

                            &::-ms-expand {
                                display: none;
                            }
                        }
                    }
                }
            }
        }
    }
}
</style>