<template>
    <tr>
        <td><i class="bi" :class="dado.checked ? 'bi-check text-success' : 'bi-clock text-danger'"></i></td>
        <td>{{dado.nome}}</td>
        <td>{{dado.profissao}}</td>
        <td>{{dado.idade}}</td>
        <td>{{dado.entrou}}</td>
        <td>{{dado.salario}}</td>
        <td>
            <button @click="$emit('toggle',dado)" class="btn btn-link" style="font-size-1.5rem">
                <span v-if="dado.checked === true">Desmarcar</span>
                <span v-else>Marcar</span>
            </button>
            <button @click="$emit('remover',dado)" class="btn btn-link"><span class="text-error">Remover</span></button>
        </td>
    </tr>
</template>

<script>
export default {
    props: {
        dado: {type: Object, required: true}
    }
}
</script>
<style scoped>
td{
    border-style: solid;
    border-color: lightgray;
    border-width: 1px;
}
button{
    min-width: 92px;
}
</style>
