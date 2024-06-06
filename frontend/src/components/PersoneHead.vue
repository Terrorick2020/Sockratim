<template>
    <div class="client-head">
        <div class="container">
            <div class="client-head__info">
                <h3>Пользователь:</h3>
                <p class="info__user-name">{{ userInfo.user_name }}</p>
            </div>
            <div class="client-head__attrs">
                <div class="attrs__icon">
                    <img src="../assets/persone_icon_1.png" alt="">
                </div>
                <div class="attrs__persone-info" title="Личная информация">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M384 432c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l320 0zm64-16c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96C0 60.7 28.7 32 64 32l320 0c35.3 0 64 28.7 64 64l0 320zM224 352c-6.7 0-13-2.8-17.6-7.7l-104-112c-6.5-7-8.2-17.2-4.4-25.9s12.5-14.4 22-14.4l208 0c9.5 0 18.2 5.7 22 14.4s2.1 18.9-4.4 25.9l-104 112c-4.5 4.9-10.9 7.7-17.6 7.7z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    computed: mapGetters(['userInfo'])
}
</script>

<style lang="scss" scoped>
.client-head {
    border-bottom: 2px solid silver;
    background: rgb(233, 233, 233);
    padding: 10px 0;

    .container {
        width: 80%;
        height: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction: row;
        justify-content: space-between;

        .client-head__info {
            width: 50%;
            display: flex;
            flex-direction: row;
            align-items: center;

            h3 {
                font-size: 21px;
                font-weight: 500;
                margin-right: 10px;

                @media (max-width: 560px) {
                    display: none;
                }
            }

            .info__user-name {
                font-size: 18px;
                margin-top: 3px;
                min-width: 200px;
                font-style: italic;
                text-decoration: underline;
            }
        }

        .client-head__attrs {
            width: 20%;
            display: flex;
            justify-content: end;
            flex-direction: row;

            .attrs__icon {
                margin-right: 20px;

                img {
                    width: 50px;
                    height: auto;
                }
            }

            .attrs__persone-info {
                cursor: pointer;
                transition: all .5s ease;

                &:hover {
                    scale: 1.05;
                    translate: 3px -2px;
                }

                svg {
                    width: 25px;
                    height: auto;
                }
            }
        }
    }
}
</style>