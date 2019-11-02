<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 mb-2">
                <div class="card">
                    <div class="card-header">Manipulando Dados</div>

                    <div class="card-body">

                        <div class="mt-2 mb-2">

                            <p> {{ total }} </p>

                            <button v-on:click="calcula('-')"> -</button>
                            <button v-on:click="calcula('+')"> +</button>

                        </div>

                        <div class="mt-2 mb-2">

                            <p>Nome Iniciado: {{ nome }}</p>
                            <p>Nome Filtrado: {{ nome | formataNome }}</p>

                        </div>

                        <div class="mt-2 mb-2">

                            <p>Nome Computado: {{ nomeFormatado }}</p>
                            <label>Input a computar</label>
                            <input v-model="nome" type="text">

                        </div>

                        <div class="mt-2 mb-2">

                            <label>Input a observar</label>
                            <input v-model="busca" type="text">
                            <p v-text="resultado"></p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ManipulandoDados",
        data() {
            return {
                total: 10,
                nome: 'jose antonio',
                resultado: '',
                busca: ''
            }
        },
        watch: {
            busca: function(novoValor, valorAntigo) {
                this.resultado = 'Aguardando o término da digitação...'
                this.recolheReposta()
            }
        },
        methods: {
            calcula(sinal) {
                this.total = (sinal == '-') ? this.total - 1 : this.total + 1
            },
            recolheReposta() {
                let valor = this.busca
                setTimeout( () => {
                    if(valor == this.busca)
                        this.resultado = 'Terminou de digitar...'
                }, 500)
            }
        },
        filters: {
            formataNome(valor) {
                console.log('executando filter')
                valor = valor.toLowerCase()
                let corta = valor.split(' ')
                let resultado = ''
                for(let nome of corta) {
                    resultado += nome.charAt(0).toUpperCase() + nome.slice(1) + ' '
                }
                return resultado
            }
        },
        computed: {
            nomeFormatado() {
                console.log('executando computed')
                return this.nome.toUpperCase()
            }
        }
    }
</script>

<style scoped>

</style>
