<template>
    <div class="regBody">
        <div class="wrapper">
            <div class="regBody__form-box">
                <h2>Вход</h2>
                <form action="#" class="regBody__form">
                    <div class="form__input-box">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                            </svg>
                        </span>
                        <input type="text" id="email" name="email" required v-model="user_email">
                        <label for="email">Почта</label>
                    </div>
                    <div class="form__input-box">
                        <span class="icon icon-pass" @click="showPassword">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" v-if="openPass">
                                <path d="M352 144c0-44.2 35.8-80 80-80s80 35.8 80 80v48c0 17.7 14.3 32 32 32s32-14.3 32-32V144C576 64.5 511.5 0 432 0S288 64.5 288 144v48H64c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V256c0-35.3-28.7-64-64-64H352V144z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" v-else>
                                <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/>
                            </svg>
                        </span>
                        <input :type="openPass ? 'text' : 'password'" id="password" name="password" required v-model="user_password">
                        <label for="password">Пароль</label>
                    </div>
                    <div class="remember_me">
                        <label for="">Запомнить меня?</label>
                        <input type="checkbox" v-model="rememberMe">
                    </div>
                    <div class="form__error" v-show="myError.length > 0">
                        <p>{{ '*' + myError }}</p>
                    </div>
                    <button type="button" @click="logUser">Войти</button>
                    <div class="login__yet">
                        <p>Нет акаунта?</p>
                        <a href="/#/registration">Зарегистрироваться</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { mapActions } from 'vuex';

export default {
    data() {
        return {
            openPass: false,
            user_email: '',
            user_password: '',
            myError: '',
            rememberMe: false
        }
    },
    methods: {
        showPassword() {
            this.openPass = !this.openPass;
        },
        async logUser() {
            try {
                if ( !this.user_email.includes( '@' ) || this.user_email.split( '@' )[0] < 3 || this.user_email[ this.user_email.length - 3 ] !== '.' ) {
                    this.myError = 'Неверный формат почты!';
                    throw new Error( this.myError );
                } else if ( this.user_password.length < 5 ) {
                    this.myError = 'Пароль должен содержить не менее 5ти символов!';
                    throw new Error( this.myError );
                }

                const response = await axios.post( 'http://localhost:8888/public/?url=permition/login', {
                    'email': this.user_email,
                    'password': this.user_password,
                }, {
                    headers: {
                        // 'Content-Type': 'application/json'
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                });

                if ( response.data.result === 'success' ) {
                    mapActions(['axiosUserInfo']);
                    this.$store.dispatch('axiosUserHistory', this.user_email );
                    this.$router.push('/client');
                } else if ( response.data.result === 'not_found' ) {
                    this.myError = 'Пользователя с такими учетными данными не существует!';
                } else {
                    console.log('Authentication failed:', response.data.result );
                }
            } catch ( error ) {
                console.error( 'Failed to send login request:', error.message );
            }
        }

    }
}
</script>

<style lang="scss" scoped>
.regBody {
    width: 100%;
    min-height: 90lvh;
    display: flex;
    align-items: center;
    justify-content: center;

    .wrapper {
        width: 400px;
        height: 550px;
        border-radius: 20px;
        margin: 20px;
        box-shadow: 4px 10px 8px rgba(27, 27, 27, 0.5);

        .regBody__form-box {
            widows: 100%;
            height: 100%;
            border: 1px solid black;
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 4px 10px 8px rgba(27, 27, 27, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 15px 25px;
    
            h2 {
                font-size: 1.9em;
                text-align: center;
            }
    
            .regBody__form {
                width: 100%;
    
                .form__input-box {
                    position: relative;
                    width: 100%;
                    height: 50px;
                    border-bottom: 2px solid rgb(114, 114, 114);
                    margin: 40px 0;
    
                    .icon {
                        position: absolute;
                        right: 8px;
                        font-size: 1.2em;
                        line-height: 57px;

                        &.icon-pass {
                            cursor: pointer;
                        }
    
                        svg {
                            width: 15px;
                            height: 15px;
                        }
                    }
    
                    input {
                        width: 100%;
                        height: 100%;
                        background: transparent;
                        border: none;
                        outline: none;
                        font-size: 1.2em;
                        color: rgb(63, 41, 41);
                        font-weight: 600;
                        padding: 0 35px 0 5px;
    
                        &:focus~label,  &:valid~label{

                            top: -5px
                        }
                    }
    
                    label {
                        position: absolute;
                        top: 50%;
                        left: 5px;
                        transform: translateY(-50%);
                        font-size: 1em;
                        transition: all 0.3s ease;
                    }
                }

                .remember_me {
                    margin-bottom: 20px;
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                    padding: 0 25px 0 5px;

                    input {
                        scale: 1.3;
                        cursor: pointer;
                    }
                }

                .form__error {

                    p {
                        color: rgb(143, 7, 7);
                        margin-bottom: 20px;
                        font-size: 13px;
                    }
                }
    
                button {
                    width: 100%;
                    height: 50px;
                    border-radius: 10px;
                    cursor: pointer;
                    background: rgb(118, 141, 138);
                    transition: all 0.5s ease;
                    color: rgb(0, 0, 0);
    
                    &:hover {
                        scale: 1.02;
                        translate: 4px -2px;
                        color: rgb(255, 255, 255);
                        background: rgb(77, 94, 92);
                    }
                }

                .login__yet {
                    margin-top: 30px;
                    width: 100%;
                    display: flex;
                    flex-direction: row;
                    padding: 0 20px 0 5px;
                    justify-content: space-between;

                    a {
                        
                        &:hover {
                            text-decoration: underline;
                            letter-spacing: 1.3px;
                        }
                    }
                }
            }
        }
    }
}
</style>