<template>
    <a href="#" v-on:click="teste()" class="btn">HABILITAR-SE PARA O LEILÃO</a>
</template>

<script>
    export default {
        name: "HabilitacaoLeilao",
        methods: {
            teste() {
                event.preventDefault();
                alert('Habilitar-se para o Leilão.');
            }
        }
    }
</script>

<style scoped>

</style>
