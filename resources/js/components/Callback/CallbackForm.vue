<template>
    <div class="section mt-4">
        <div class="card">
            <div class="card-body">
                <div class="p-1">
                    <div class="text-center">
                        <h2 class="text-primary">Напишите нам</h2>
                        <p>Заполните данную форму для начала общения</p>
                    </div>
                    <AlertErrors :form="form"></AlertErrors>
                    <form @submit.prevent="sendMessage"
                          @keydown="form.onKeydown($event)">
                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label" for="name2">Ваше имя</label>
                                <input v-model="form.name" type="text" class="form-control" id="name2"
                                       placeholder="Ваше имя">
                                <i class="clear-input">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </i>
                            </div>
                            <HasError :form="form" field="name"/>
                        </div>
                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label" for="email2">Почта</label>
                                <input v-model="form.email" type="text" class="form-control" id="email2"
                                       placeholder="Почта">
                                <i class="clear-input">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </i>
                            </div>
                            <HasError :form="form" field="email"/>
                        </div>
                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label" for="textarea2">Сообщение</label>
                                <textarea v-model="form.message" id="textarea2" rows="4" class="form-control"
                                          placeholder="Сообщение"></textarea>
                                <i class="clear-input">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </i>
                            </div>
                            <HasError :form="form" field="message"/>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Form from "vform"
import {AlertErrors, HasError} from "vform/src/components/bootstrap5"

export default {
    name: "CallbackForm",
    components: {AlertErrors, HasError},
    data: function () {
        return {
            form: new Form({
                name: '',
                email: '',
                message: ''
            })
        }
    },
    methods: {
        async sendMessage() {
            await this.form.post('api/send/message')
        },
    }
}
</script>
