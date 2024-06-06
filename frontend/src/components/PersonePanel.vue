<template>
    <div class="persone-panel">
        <div class="persone-panel__conteiner">
            <form class="conteiner__input">
                <div class="input__text">
                    <h1>Сокра.тим</h1>
                    <p>Неоходимо сократить ссылку? Сейчас мы это сделаем!</p>
                </div>
                <div class="input__action">
                    <input type="text" placeholder="Введите ссылку" v-model="link">
                    <input type="text" placeholder="Введите сокращение" v-model="convertention">
                </div>
                <div class="form__error" v-show="myError.length > 0">
                    <p>{{ '*' + myError }}</p>
                </div>
                <button type="button" @click="convertLink">Преобразовать</button>
            </form>
            <div class="conteiner__output">
                <h2 class="output__title">Ваша история:</h2>
                <div class="output__form">
                    <div class="output__empty" v-if="itemList.length === 0">
                        <div class="item">
                            <p>Здесь пока ничего нет.</p>
                        </div>
                    </div>
                    <div class="output__items" v-else>
                        <div class="item" v-for="(elem, index) in itemList" :key="index">
                            <div>
                                <h4>Исходная:</h4>
                                <a :href="elem.long_link" target="_blank">{{ elem.long_link }}</a>
                            </div>
                            <div>
                                <h4>Сокращённая:</h4>
                                <a :href="elem.long_link" target="_blank">{{ elem.shorted_link }}</a>
                            </div>
                            <button title="удалить запись" @click="deleteItem( elem.id )">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    props: {
        user_data: {
            type: Object,
            required: true
        }
    },
    computed: mapGetters(['userHistory', 'historySize']),
    data() {
        return {
            link: '',
            convertention: '',
            myError: '',
            itemList: []
        }
    },
    methods: {
        deleteItem( id ) {
            this.itemList = this.itemList.filter(elem => elem.id != id);
        },
        convertLink() {
            if ( this.link.length < 5 ) {
                this.myError = 'Неправильный формат первоначальной ссылки!';
                return;
            } else if ( this.convertention.length < 2 ) {
                this.myError = 'Сокращение должно содержать не менее 2х символов';
                return;
            }

            var new_link = 'localhost:1111/s/' + this.convertention;

            var len = this.itemList.length;
            if ( len === 0 ) {
                var new_id = 0
            } else {
                let new_id = this.itemList[ len - 1 ].id + 1
            }
            this.itemList.push({
                'id': new_id,
                'long_link': this.link,
                'shorted_link': new_link,
            });

            this.link = '';
            this.convertention = '';
        }
    }
}
</script>

<style lang="scss" scoped>
.persone-panel {
    margin-top: 50px;
    padding: 10px 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;

    .persone-panel__conteiner {
        width: 500px;
        min-height: 600px;

        .conteiner__input {
            width: 100%;

            .input__text {
                text-align: center;

                h1 {
                    font-size: 40px;
                    font-weight: 900;
                }

                p {
                    margin-top: 10px;
                    font-size: 15px;
                    font-weight: 300;
                    font-style: italic;
                }
            }

            .input__action {
                display: flex;
                flex-direction: column;
                margin-top: 40px;
                gap: 20px;

                input {
                    height: 40px;
                    outline: none;
                    padding: 5px 10px;
                    font-size: 15px;
                }
            }

            .form__error {
                margin-top: 20px;
                margin-bottom: 10px;

                p {
                    color: rgb(143, 7, 7);
                    font-size: 13px;
                }
            }

            button {
                margin-top: 30px;
                width: 220px;
                height: 36px;
                cursor: pointer;
                border-radius: 5px;
                transition: all 0.8s ease;
                color: rgb(86, 86, 86);
                border-color: rgb(47, 47, 47);

                &:hover {
                    scale: 1.05;
                    translate: 8px -4px;
                    color: rgb(255, 255, 255);
                    border-color: rgb(13, 29, 86);
                    background: rgb(39, 66, 163);
                }
            }
        }

        .conteiner__output {
            margin-top: 70px;
            width: 100%;

            .output__title {
                font-size: 30px;
            }

            .output__empty {

                .item {
                    margin-top: 25px;
                    border: 2px solid silver;
                    border-radius: 10px;
                    
                    p {
                        text-align: center;
                        font-size: 20px;
                        padding: 15px 20px;
                        color: rgb(132, 96, 96);
                    }
                }
            }

            .output__items {
                
                .item {
                    position: relative;
                    margin-top: 20px;
                    border: 2px solid silver;
                    border-radius: 10px;
                    padding: 10px 20px 10px 7px;
                    overflow: auto;

                    div {
                        display: flex;
                        flex-direction: row;
                        flex-wrap: wrap;
                        justify-content: start;
                        gap: 7px;

                        &:not(:first-of-type) {
                            margin-top: 15px;
                        }

                        a {
                            transition: all 0.5s ease;
                            word-wrap: wrap;

                            &:hover {
                                text-decoration: underline;
                            }
                        }
                    }

                    button {
                        cursor: pointer;
                        position: absolute;
                        top: 7px;
                        right: 7px;
                        border: none;
                        transition: all 0.5s ease;

                        &:hover {
                            translate: 2px -1px;
                            scale: 1.05;

                            svg {

                                path {
                                    fill: rgb(204, 62, 62);
                                }
                            }
                        }

                        svg {
                            width: 20px;
                            height: auto;

                            path {
                                transition: all 0.8s ease;
                            }
                        }
                    }
                }
            }
        }
    }
}
</style>