<template>
    <form @submit.prevent="grava()">

        <input type="hidden" @input="habilitacao.id_lote = $event.target.value" id="id_lotes" name="id_lotes" :value="lote_id">
        <input type="hidden" @input="habilitacao.id_leilao = $event.target.value" id="id_leiloes" name="id_leiloes" :value="leilao_id">
        <input type="hidden" @input="habilitacao.id_user = $event.target.value" id="id_users" name="id_users" :value="user_id">

        <button class="btn">HABILITAR-SE PARA O LEILÃO</button>
    </form>

</template>

<script>
    export default {
        name: "HabilitacaoLeilao",
        data() {
            return {
                habilitacao: {
                    id_lote: '',
                    id_leilao: '',
                    id_user: ''
                }
            }
        },
        props: {
               lote_id: {
                   required: true,
                   type: String
               },
               leilao_id: {
                   required: true,
                   type: String
               },
               user_id: {
                   required: true,
                   type: String
               }
        },
        methods: {
            grava() {
                alert('Habilitar-se para o Leilão.');

                window.axios.post('/habilitar', {
                    id_lote: document.getElementById('id_lotes').value,
                    id_leilao: document.getElementById('id_leiloes').value,
                    id_user: document.getElementById('id_users').value
                }).then(function (response) {
                        console.log(response);
                }).catch(function (error) {
                        console.log(error);
                });
            }
        }
    }
</script>

<style scoped>
    form {
        display: inline-block;
    }
</style>
