<template>
    <div class="row justify-content-center">
        <div class="card col-md-11 justify-content-center">
            <h1>Tabela de usuários</h1>

                <div class="card-header">
                    <h3>Adicionar usuários</h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent="addDado(src.dado)">
                        <div class="input-group justify-content-center">
                            <input class="form-input" v-model="src.dado.nome" type="text" placeholder="Digite o nome">
                            <input class="form-input" v-model="src.dado.profissao" type="text" placeholder="Digite a profissão">
                            <input class="form-input" v-model="src.dado.idade" type="text" placeholder="Digite a idade">
                            <input class="form-input" v-model="src.dado.ano" type="text" placeholder="Digite o inicio">
                            <input class="form-input" v-model="src.dado.salario" type="text" placeholder="Digite o salário">
                            <br>
                        </div>
                        <div class="justify-content-center text-center">
                            <button class="btn btn-primary input-group-btn">Adicionar</button>
                        </div>
                    </form>
                </div>

            <div class="card-header">
                <h3>Lista de usuários</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>Nome</th>
                        <th>Posição</th>
                        <th>Idade</th>
                        <th>Inicio</th>
                        <th>Salário</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody class="justify-content-center text-center">
                    <ObjectData v-for="d in src.users" :key="d.id" :dado="d" @toggle="toggleDado" @remover="removerDado"></ObjectData>
                </tbody>
            </table>
        </div>
        <p v-for="u in src.users" v-bind:key="u.id">{{u}}</p>
    </div>
</template>

<script>
import ObjectData from './ObjectData.vue'
import api from '../../services/api'

// import Vue from 'vue'
// const vue = new Vue();
// console.log(Vue.onMouted())
export default {
    components: { ObjectData },
    data(){
        const src = {
            dado: {estado: false},
            users: {}
        }

        // Vue.onMounted(async () => {
        //     const response = await api.all()
        //     src.users = response.data
        // })

        api.all().then(response =>{
            src.users = response.data
        })

        return {src}
    },

    // data(){
    //     return {  dados: [], dado: {checked: false}  };
    // },
    methods: {
        addDado(dado){
            this.src.users.push(dado);
            this.src.dado = {estado: false};
            api.store(dado) // Requisição de API
        },

        toggleDado(dado){
            const index = this.src.users.findIndex(item => item.id === dado.id);
            if(index > -1){
                const user = this.src.users[index]
                user.estado =  !user.estado ? 1 : 0
                api.update(user,user.id) // Requisição de API
            }
        },
        removerDado(rdado){
            var index = this.src.users.findIndex(item => item.id === rdado.id);
            if(index > -1){
                this.src.users.splice(index,1);
                api.destroy(rdado.id) // Requisição de API
            }
        }
    }
}
</script>

<style scoped>

    input{
        margin: 2.5px 2.5px 2.5px 2.5px;
    }

    .card{
        margin:  20px 20px 20px 20px;
        padding: 20px 20px 20px 20px;
    }

    button{
        margin: 10px 10px 10px 10px;
    }

    thead th{
        border-width: 1px;
        border-color: gray;
        border-style: solid;
        min-width: 100px;
        text-align: center;

    }
</style>
