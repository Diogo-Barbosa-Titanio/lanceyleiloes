<template>
    <div class="container">

        <div class="row">
            <div class="col-md-12 mt-2 mb-2">

                <div class="card">
                    <div class="card-header">Criando Exibindo dados</div>

                    <div class="card-body">

                        <div>
                            <h1 v-text="titulo"></h1>
                            <h2>{{ subtitulo }}</h2>
                        </div>

                        <div v-if="tarefas.length <= 0">
                            Não há tarefas
                        </div>

                        <div v-if="tarefas.length > 0">
                            Existem {{tarefas.length}} tarefas
                            <ul>
                                <li v-for="tarefa in tarefas"> {{ tarefa }}</li>
                            </ul>
                        </div>

                        <div>
                            <input v-bind:disabled="tarefas.length == 0" v-model="subtitulo" type="text"
                                   placeholder="Descricao">
                        </div>

                        <div class="mt-2 mb-2">
                            <button v-on:click="tarefas = []">Limpar</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    export default {
        name: 'CriandoExibindoDados',
        data() {
            return {
                titulo: 'Listagem de tarefas',
                subtitulo: 'Defina uma descrição',
                tarefas: []
            }
        },
        mounted() {
            setTimeout(() => {
                    this.titulo = "Novo título"
                    this.tarefas = ['tarefas 1', 'tarefa 2', 'tarefa 3', 'tarefa 4']
                }
                , 3000)
        }
    }
</script>
