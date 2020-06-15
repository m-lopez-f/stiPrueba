<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                Clientes
                            </div>
                            <div class="col">
                                <button class="btn btn-primary" v-on:click="imports()">Import clients</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-responsive">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Saldo</th>
                            </tr>
                        </thead>
                            <tbody>
                                <tr v-for="client in clients" :key="client.id">
                                    <th scope="row">{{ client.id }}</th>
                                    <td>{{ client.nombres }}</td>
                                    <td>{{ client.apellidos }}</td>
                                    <td>{{ client.telefono }}</td>
                                    <td>{{ client.saldo }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        mounted() {
            axios.get('/clients')
            .then(response => {
                this.clients = [...response.data]
            })
        },
        data() {
            return {
                clients: [],
                imports: () => {
                    axios.post('/imports')
                    .then(response => {
                        this.clients = [...response.data]
                    })
                }
            }
        },
    }
</script>
