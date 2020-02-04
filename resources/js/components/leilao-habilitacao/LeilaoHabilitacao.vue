<template>
    <div>


        <button class="btn" v-if="habilitado">Habilitado</button>


        <form @submit.prevent="grava()" v-else>
            <input type="hidden" id="habilitacao_id_lotes" name="habilitacao_id_lotes" :value="lote_id">
            <input type="hidden" id="habilitacao_id_leiloes" name="habilitacao_id_leiloes" :value="leilao_id">
            <input type="hidden" id="habilitacao_id_users" name="habilitacao_id_users" :value="user_id">
            <transition name="fade">
                <button class="btn" v-show="visivel">HABILITAR-SE PARA O LEILÃO</button>
            </transition>
        </form>
    </div>

</template>

<script>
    export default {
        name: "LeilaoHabilitacao",
         data() {
            return {
                visivel: true,
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
               },
               habilitado: {
                   required: false,
                   default: true,
                   type: Boolean
               }
        },
        methods: {
            grava() {
                alert('Habilitar-se para o Leilão.');

                window.axios.post('/habilitar', {
                    id_lote: document.getElementById('habilitacao_id_lotes').value,
                    id_leilao: document.getElementById('habilitacao_id_leiloes').value,
                    id_user: document.getElementById('habilitacao_id_users').value
                }).then(response => {

                        this.visivel = false;

                }).catch(error => {

                       this.visivel = true;
                });
            }
        }
    }
</script>

<style scoped>
    form, div {
        display: inline-block;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity 1s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
