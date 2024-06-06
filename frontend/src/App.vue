<template>
    <div class="wrapper">
        <div class="container">
            <router-view :user_data="user_data"></router-view>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            user_data: {
                'name': 13434
            }
        }
    },
    mounted() {
    const { meta } = this.$route;
    if (meta && meta.title) {
        document.title = meta.title;
    }
    },
};
</script>

<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap');

$mainBg: #5eb66e;
$BgColor: rgb(239, 239, 239);

::selection {
    background-color: $mainBg;
}

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body {
    font-family: "Roboto Slab", serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
    background: $BgColor;
}

a {
    text-decoration: none;
    color: #a3a3a3;
    transition: all 0.5s ease;

    &:hover {
        color: #4ad2d0;
    };
};

.wrapper {
    overflow: hidden;
};

.container {
    @media(min-width: 1500px) {
        width: 1300px;
        margin: 0 auto;
    };

    @media(max-width: 1500px) and (min-width: 900px) {
        width: 80%;
        margin: 0 10%;
    };

    @media(max-width: 900px) {
        width: 90%;
        margin: 0 5%;
    };
}
</style>