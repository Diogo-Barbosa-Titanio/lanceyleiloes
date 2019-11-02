<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-2 mb-2">
                <div class="card">
                    <div class="card-header">Componentes Juntos</div>

                    <div class="card-body">

                        <div class="mt-2 mb-2">
                            <h3>Buscando rivais</h3>
                            <label>Time:</label>
                            <input type="text" v-model="busca">
                            <p>Rival: {{ rival(busca) }}</p>
                        </div>

                        <div class="mt-2 mb-2">
                            <h3>Perfil</h3>
                            <p>Time {{ nome }}</p>
                            <p>Estádio: {{ estadio}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ComponentesJuntos",
        data() {
            return {
                nome: 'Cruzeiro',
                estadio: 'Mineirão',
                busca: ''
            }
        },
        methods: {
            rival(time) {
                switch (time.toLocaleLowerCase()) {
                    case 'coritinthians':
                        return 'palmeiras'
                    case 'santos':
                        return 'são paulo'
                    case 'flamengo':
                        return 'vasco'
                    case 'cruzeiro':
                        return 'em minas é marmelada'
                    default:
                        return 'não encontrado'
                }
            }
        }
    }
</script>

<style scoped>

</style>
