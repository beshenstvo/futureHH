<template>
    <div>
        <h1 class="m-4">Все записи из записной книжки</h1>
        <hr/>
            <div class='container d-flex flex-wrap justify-content-between'>
                <div class="card text-center m-4" v-for="note in notes" :key="note.id">
                    <div class="card-header">
                        Запись: {{ note.id }}
                    </div>
                    <div class="card-body ">
                        <h5 class="card-title" style="text-align: left !important;"><b>ФИО: </b>{{ note.fullname }}</h5>
                        <a href="#" class="btn btn-outline-primary m-1">Просмотр данных</a>
                        <a href="#" class="btn btn-warning m-1">Изменить</a>
                        <a href="#" class="btn btn-danger m-1">Удалить</a>
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
    name: 'App',
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
            setTimeout(() => {
                this.loading = false;
            }, 500)
        });
    }
}
</script>

<style>

</style>