<template>
    <div class="conditions">
        <div class="conditions__body">
            <h3 class="body__title">Что надо сделать, чтобы начать?</h3>
            <router-link to="/login" class="body__link">Авторизоваться!</router-link>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
.conditions {
    margin-top: 50px;
    text-align: center;
    padding: 10px 20px;
    display: flex;
    justify-content: start;

    .conditions__body {
        display: flex;
        flex-direction: row;
        width: 100%;
        gap: 10%;

        .body__title {
            font-size: 20px;
        }

        .body__link {
            font-size: 17px;

            &:hover {
                letter-spacing: 2px;
            }
        }
    }
}
</style>