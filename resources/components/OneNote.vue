<template>
    <div class="m-4">
        <h1>Информация о записи по id: {{ this.$route.params.id }}</h1>
        <hr/>
        <router-link class="btn btn-outline-primary" to='/'>Назад</router-link>
        <router-link class="btn btn-warning m-1" :to="{ path: '/edit/'+ this.$route.params.id}">Изменить</router-link>
        <div class="alert alert-danger" role="alert" v-if="errored">
            Ошибка загрузки данных!
        </div>
        <div class='container d-flex flex-wrap justify-content-center'>
            <div class="text-center m-4">
                <div>
                    <p class="card-text" style="text-align: left !important; font-size: 2em"><b>ФИО: </b>{{ note.fullname }}</p>
                    <p class="card-text" style="text-align: left !important; font-size: 2em"><strong>Компания: </strong>{{ note.company }}</p>
                    <p class="card-text" style="text-align: left !important; font-size: 2em"><strong>Телефон: </strong>{{ note.phone_number }}</p>
                    <p class="card-text" style="text-align: left !important; font-size: 2em"><strong>Email: </strong>{{ note.email }}</p>
                    <p class="card-text" style="text-align: left !important; font-size: 2em"><strong>День рождения: </strong>{{ note.bth }}</p>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    data(){
        return {
            note: '',
            errored: false
        }
    },
    mounted() {
        console.log(this.$route.params.id)
        axios.get('/api/v1/notebook/'+this.$route.params.id)
        .then( response => {
            console.log(response.data.data.id);
            this.note = response.data.data;
        })
        .catch( error => {
            console.log(error);
            this.errored = true;
        });
    }
}
</script>

<style>

</style>