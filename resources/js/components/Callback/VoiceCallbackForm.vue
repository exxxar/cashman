<template>
    <div class="section mt-3 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="p-1">
                    <div class="row">
                        <div class="text-center">
                            <h2 class="text-primary">Отправьте нам голосовое сообщение</h2>
                            <p>Нажмите на кнопку "Микрофон" для начала общения</p>
                        </div>
                        <form @submit.prevent="sendMessage"
                              @keydown="form.onKeydown($event)">
                            <div class="d-flex justify-content-center">
                                <audio-recorder v-if="showRecorder"
                                                upload-url="some url"
                                                filename="ninja"
                                                format="wav"
                                                :attempts="3"
                                                :time="2"
                                                :headers="headers"
                                                :before-recording="callback"
                                                :pause-recording="callback"
                                                :after-recording="callback"
                                                :select-record="callback"
                                                :before-upload="callback"
                                                :successful-upload="callback"
                                                :failed-upload="callback"
                                                :bit-rate="192"/>
                            </div>
                            <div class="form-group basic animated">
                                <div class="input-wrapper">
                                    <label class="label" for="name2">Ваше имя</label>
                                    <input v-model="form.name" type="text" class="form-control" id="name2"
                                           placeholder="Ваше имя">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                                <HasError :form="form" field="name"/>
                            </div>
                            <div class="form-group basic animated">
                                <div class="input-wrapper">
                                    <label class="label" for="email2">Номер телефона</label>
                                    <input v-model="form.phone" type="text" class="form-control" id="email2"
                                           placeholder="Номер телефона">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                                <HasError :form="form" field="phone"/>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Form from "vform"
import {HasError} from "vform/src/components/bootstrap5"
export default {
    name: "VoiceCallbackForm",
    components: { HasError},
    data() {
        return {
            showRecorder: true,
            headers: {
                'X-Custom-Header': 'some data'
            },
            form: new Form({
                name: '',
                phone:'',
            })
        }
    },
    methods: {
        callback(msg) {
            console.debug('Event: ', msg)
        },
        async sendMessage() {
            await this.form.post('api/send/voice-message')
        },
    }

}
</script>

<style>
.ar-icon svg {
    vertical-align: top !important;
}

.ar-recorder__duration {
    margin-top: 40px !important;
}
</style>
