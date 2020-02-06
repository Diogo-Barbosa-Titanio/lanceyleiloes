<template>

    <div class="lance_atual">
        <div class="titulo">
            LANCE ATUAL:
        </div>
        <div class="valor">
            R$ {{ lance }}
        </div>
        <div class="data">
            Data: {{ data_lance}}
        </div>
        <div class="usuario">
            Usuário: {{ usuario }}
        </div>

    </div>

</template>

<script>
    export default {
        name: "LeilaoMaiorLance",
        data() {
            return {
                lance: ' 12323',
                data_lance: '20-03-1986',
                usuario: 'Diogo'
            }
        },
        methods: {
            observa() {
                window.axios.get('/maior_lance', {
                    params: {
                        id_lote: 6
                    }
                }).then(response => {

                    this.lance = response.data[0].lances;
                    this.data_lance = response.data[0].data_lance;
                    this.usuario = response.data[0].nome;
                    console.log(response);


                }).catch(error => {

                    console.log(error);

                });
            }
        },
        mounted() {
            this.observa();
        }
    }
</script>

<style scoped>

</style>
