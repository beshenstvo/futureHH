<template>
    <div class="m-4">
        <h1>Изменение данных {{ this.$route.params.id }}</h1>
        <hr/>
        <router-link class="btn btn-outline-primary" to='/'>Назад</router-link>
        <div class="alert alert-danger" role="alert" v-if="errored">
            Ошибка загрузки данных!
        </div>
        <div class="p-3 m-3" style="width: 50%">
            <label for="fullname" class="form-label mt-3">ФИО:</label>
            <div class="input-group mb-3">
                <input id="fullname" v-model="fullname" type="text" class="form-control" aria-describedby="basic-addon1">
            </div>
            <label for="company" class="form-label">Компания:</label>
            <div class="input-group mb-3">
                <input type="text" id="company" v-model="company" class="form-control" />
            </div>
            <label for="phone" class="form-label">Телефон:</label>
            <div class="input-group mb-3">
                <input id="phone" v-model="phone_number" type="text" class="form-control" aria-describedby="basic-addon1" >
            </div>
            <label for="email" class="form-label">Email:</label>
            <div class="input-group mb-3">
                <input id="email" v-model="email" type="email" class="form-control" aria-describedby="basic-addon1" >
            </div>
            <label for="bth" class="form-label">День рождения:</label>
            <div class="input-group mb-3">
                <input id="bth" v-model="bth" type="date" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" v-on:click="saveChanges()">Сохранить</button>
            </div>
        </div>


    </div>
</template>

<script>
export default {
    data() {
        return {
            fullname: '',
            company: '',
            phone_number: '',
            email: '',
            bth: '', 
            errored: '',
            note: '', 
            errored: false
        }
    },
    mounted() {
        axios.get('/api/v1/notebook/'+this.$route.params.id)
        .then( response => {
            console.log(response.data.data);
            this.fullname = response.data.data.fullname;
            this.company = response.data.data.company;
            this.phone_number = response.data.data.phone_number;
            this.email = response.data.data.email;
            this.bth = response.data.data.bth;
        })
        .catch( error => {
            console.log(error);
            this.errored = true;
        })
    },
    methods: {
        saveChanges() {
             axios.post('/api/v1/notebook/'+this.$route.params.id, {
                _method: 'PUT',
                fullname: this.fullname,
                company: this.company,
                phone_number: this.phone_number,
                email: this.email,
                bth: this.bth
            })
            .catch( error => {
                console.log(error);
                this.errored = true;
            })
            .finally(() => {
                if(!this.errored){
                    alert('Данные изменены успешно!');
                    this.$router.push({ path: '/'});
                }
            })
        }
    }
}
</script>

<style>

</style>