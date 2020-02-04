<template>

    <div class="lance">
        <div class="texto">
            Dê seu lance
        </div>
        <div class="formulario">
            <form @submit.prevent="grava()">
                <input type="hidden" id="lance_id_lotes" name="lance_id_lotes" :value="lote_id">
                <input type="hidden" id="lance_id_leiloes" name="lance_id_leiloes" :value="leilao_id">
                <input type="hidden" id="lance_id_users" name="lance_id_users" :value="user_id">

                <input type="text" class="form-control mb-1"
                       placeholder="Informe o valor (Ex. R$ 20.000,00)">

                <button class="btn btn-cor-secundaria btn-block">Confirmar lance</button>

            </form>
        </div>
    </div>

</template>

<script>
    export default {
        name: "LeilaoLances",
        methods: {
            grava() {
                alert('Lance para o leilão.');
            }
        }
    }
</script>

<style scoped>

</style>
