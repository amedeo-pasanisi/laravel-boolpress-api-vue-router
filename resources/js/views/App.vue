<template>
    <div class="container">
        <Header />
        <Main />
    </div>
</template>

<script>
import Header from '../components/Header.vue'; //si può anche omettere il .vue
import Main from '../components/Main.vue';

export default {
    name: 'App',
    components: {
        Header,
        Main
    }
}
</script>

<style lang="scss" scoped>

</style>