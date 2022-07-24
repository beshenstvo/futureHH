<template>
    <div class="m-4">
        <h1>Добавление новой записи</h1>
        <hr/>
        <router-link class="btn btn-secondary" to='/'>Назад</router-link>
        <div class="alert alert-danger" role="alert" v-if="errored">
            Ошибка добавления данных!
        </div>
        <form action="" enctype="multipart/form-data">
        <div class="p-3 m-3" style="width: 50%">
            <label for="fullname" class="form-label mt-3">ФИО:</label>
            <div class="input-group mb-3">
                <input id="fullname" v-model="fullname" type="text" class="form-control" aria-describedby="basic-addon1" placeholder="Иванов Иван Иванович">
            </div>
            <label for="company" class="form-label">Компания:</label>
            <div class="input-group mb-3">
                <input type="text" id="company" v-model="company" class="form-control" placeholder="Future"/>
            </div>
            <label for="phone" class="form-label">Телефон:</label>
            <div class="input-group mb-3">
                <input id="phone" v-model="phone_number" type="text" class="form-control" aria-describedby="basic-addon1" placeholder="+7(999)99-99-999">
            </div>
            <label for="email" class="form-label">Email:</label>
            <div class="input-group mb-3">
                <input id="email" v-model="email" type="email" class="form-control" aria-describedby="basic-addon1" placeholder="example@gmail.com">
            </div>
            <label for="bth" class="form-label">День рождения:</label>
            <div class="input-group mb-3">
                <input id="bth" v-model="bth" type="date" class="form-control" aria-describedby="basic-addon1">
            </div>
            <label for="file" class="form-label">Выберите изображение:</label>
            <div class="input-group mb-3">
                <input id="file" type="file" class="form-control" name="photo" aria-describedby="basic-addon1" @change="uploadImg($event)">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" v-on:click="saveNewNote()">Сохранить</button>
            </div>
        </div>
      </form>
        


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
            photo: '',
            errored: ''
        }
    },
    methods: {
        saveNewNote() { //исправить
            // var formData = new FormData();
            // formData.append("photo", this.photo);
            console.log(this.photo[0]);
            axios.post('/api/v1/notebook',{
                fullname: this.fullname,
                company: this.company,
                phone_number: this.phone_number,
                email: this.email,
                bth: this.bth,
                photo: this.photo,
                headers: {
                'Content-Type': 'multipart/form-data'
                }
            })
            .catch( error => {
                console.log(error);
                this.errored = true;
            })
            .finally(() => {
                if(!this.errored){
                    alert('Данные добавлены!');
                    this.$router.push({ path: '/'});
                }
            })
        },
        uploadImg(e) {
            console.log(e.target.files[0]);
            this.photo = e.target.files
        }
    }

}
</script>

<style>

</style>