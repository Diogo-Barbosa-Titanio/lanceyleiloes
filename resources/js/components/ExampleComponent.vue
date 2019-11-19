<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body" v-for="comitente in cadastros">
                        {{comitente.nome}}
                       <img :src="'storage'+comitente.foto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cadastros:[]
            }
        },
        created() {

            let promise = axios.get('http://lanceyleiloes.com/api/comitentes');
            //let promise = this.$http.get('http://lanceyleiloes.com/api/comitentes');
            promise
                .then(res => this.cadastros = res.data);

        }
    }
</script>
