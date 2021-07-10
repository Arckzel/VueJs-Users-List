<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <Datatable/>
            </div>
        </div>
    </div>
</template>

<script>
import Datatable from './Datatable'
    export default {
        components: {
            Datatable
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
