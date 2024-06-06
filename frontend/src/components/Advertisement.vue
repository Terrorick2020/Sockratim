<template>
    <div class="advertisment">
        <div class="advertisment__text">
            <div class="text__body">
                <h1>Первая в России программа по сокращению ссылок</h1>
                <p>Совершенно бесплатно!</p>
                <button type="button" @click="scrollToConditions">Выберете действие</button>
            </div>
        </div>
        <div class="advertisment__logo">
            <img alt="кошечка" src="../assets/advertisment_logo.png">
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        scrollToConditions() {
            const conditionsBlock = document.querySelector('.advertisment');

            if ( !conditionsBlock ) {
                console.error( 'Не возможно найти блок условий!' );
                return;
            }

            const condHeight = conditionsBlock.offsetHeight;

            window.scrollBy({
                top: condHeight,
                left: 0,
                behavior: 'smooth'
            });
        }
    }
}
</script>

<style lang="scss" scoped>
.advertisment {
    margin-top: 50px;
    padding: 10px 30px;
    height: 80lvh;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;

    .advertisment__text {
        width: 60%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;

        @media (max-width: 767px) {
            width: 100%;
        }

        .text__body {
            width: 90%;
            height: 300px;
            text-align: start;

            h1 {
                text-align: start;
                font-weight: 800px;
                font-size: 35px;

                @media (max-width: 767px) {
                    font-size: 31px;
                }
            }

            @keyframes scale_p {
                from {
                    scale: 0.98;
                }
                to {
                    scale: 1.02;
                }
            } 

            p {
                margin-top: 20px;
                font-weight: 600px;
                font-size: 25px;
                animation: scale_p 1s infinite alternate;
                color: rgb(201, 55, 55);
                @media (max-width: 767px) {
                    font-size: 17px;
                }
            }

            button {
                cursor: pointer;
                margin-top: 35px;
                width: 60%;
                min-width: 220px;
                height: 35px;
                font-size: 20px;
                border: 2px solid rgb(105, 105, 105);
                color: rgb(105, 105, 105);
                border-radius: 5px;
                transition: all 0.8s ease;
                @media (max-width: 767px) {
                    font-size: 18px;
                }



                &:hover {
                    translate: 3px -2px;
                    color: rgb(255, 255, 255);
                    border-color: rgb(0, 0, 176);
                    background-color: rgb(0, 0, 204);
                }
                
            }
        }
    }

    .advertisment__logo {
        width: 40%;

        @media (max-width: 767px) {
            display: none;
        }

        img {
            width: 100%;
            height: auto;
        }
    }
}
</style>