<template>
    <div class="row justify-content-center">
        <div class="card col-md-11 justify-content-center">
            <h1>Tabela de usuários</h1>

                <div class="card-header">
                    <h3>Adicionar usuários</h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent="addDado(dado)">
                        <div class="input-group justify-content-center">
                            <input class="form-input" v-model="dado.nome" type="text" placeholder="Digite o nome">
                            <input class="form-input" v-model="dado.profissao" type="text" placeholder="Digite a profissão">
                            <input class="form-input" v-model="dado.idade" type="text" placeholder="Digite a idade">
                            <input class="form-input" v-model="dado.entrou" type="text" placeholder="Digite o inicio">
                            <input class="form-input" v-model="dado.salario" type="text" placeholder="Digite o salário">
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
                    <ObjectData v-for="d in dados" :key="d.id" :dado="d" @toggle="toggleDado" @remover="removerDado"></ObjectData>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import ObjectData from './ObjectData.vue'
export default {
    components: { ObjectData },
    data(){
        return {  dados: [], dado: {checked: false}  };
    },
    methods: {
        addDado(dado){
            console.log(this.dado);
            dado.id = Date.now();
            this.dados.push(dado);
            this.dado = {checked: false};
        },

        toggleDado(dado){
            const index = this.dados.findIndex(item => item.id === dado.id);
            if(index > -1){
                const checked = !this.dados[index].checked;
                this.dados[index].checked = checked;
                console.log(this.dados[index]);
            }
        },
        removerDado(rdado){
            var index = this.dados.findIndex(item => item.id === rdado.id);
            console.log(index+" "+this.dados[index].nome)
            if(index > -1){

                this.dados.splice(index,1);
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
