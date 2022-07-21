<template>
    <div class="m-4">
        <h1>Все записи из записной книжки</h1>
        <hr/>
            <div class='container d-flex flex-wrap'>
                <div class="card m-4" v-for="note in notes" :key="note.id">
                    <div class="card-header">
                        Запись: {{ note.id }}
                    </div>
                    <div class="card-body ">
                        <h5 class="card-title" style="text-align: left !important;"><b>ФИО: </b>{{ note.fullname }}</h5>
                        <router-link class="btn btn-outline-primary m-1" :to="{ path: '/oneNote/'+ note.id}">Просмотр данных</router-link>
                        <a href="#" class="btn btn-outline-danger m-1" v-on:click="rm(note.id)">Удалить</a>
                    </div>
                    <div class="card-footer text-muted">
                    Создано: {{ note.created_at }}
                    </div>
                </div>
            </div>
            <div class="alert alert-danger" role="alert" v-if="errored">
                Ошибка загрузки данных!
            </div>

            <div class="d-flex align-items-center" v-if="loading">
                <strong>Loading...</strong>
                <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
            </div>
    </div>
</template>

<script>
export default {
    name: 'Show',
    data() {
        return {
            notes: [],
            errored: false,
            loading: true,
            check: 'LALALA'
        }
    },
    mounted() {
        axios.get('/api/v1/notebook')
        .then( response => {
            console.log(response.data.data);
            this.notes = response.data.data;
        })
        .catch( error => {
            console.log(error);
            this.errored = true;
        })
        .finally( () => {
            this.loading = false; 
        });
    },
    methods: {
        rm(id) {
            axios.post('/api/v1/notebook/'+id, {
                _method: 'DELETE'
            })
            .catch( error => {
                console.log(error);
                this.errored = true;
            })
            document.location.reload();
        }
    }
}
</script>

<style>

</style>