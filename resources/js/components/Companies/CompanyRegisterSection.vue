<template>
    <div id="appCapsule">
        <Header>
            <template v-slot:left>
                <a href='/' class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:right>
                <a href='' class="headerButton">
                    Login
                </a>
            </template>
        </Header>
        <div class="section mt-2 text-center">
            <h1>Register Your company now</h1>
            <h4>Create an company account</h4>
        </div>
        <div class="section mb-5 p-2">
            <form  @submit.prevent=sendData()>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="title">Title</label>
                                <input v-model="form.title" type="text" class="form-control" id="title" placeholder="Your company title"
                                       :class="{ 'is-invalid': form.errors.has('title') }">
                                <has-error :form="form" field="title"></has-error>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="domain">Domain</label>
                                <input v-model="form.domain" type="text" class="form-control" id="domain" placeholder="Your company domain"
                                       :class="{ 'is-invalid': form.errors.has('domain') }">
                                <has-error :form="form" field="domain"></has-error>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="custom-file-upload" id="fileUpload1">
                            <input type="file" id="fileuploadInput" accept=".png, .jpg, .jpeg">
                            <label for="fileuploadInput">
                                <span>
                                    <strong>
                                        <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                        <i>Upload a Logo</i>
                                    </strong>
                                </span>
                            </label>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="textarea4">Description</label>
                                <textarea id="textarea4" rows="2" class="form-control"
                                          placeholder="Description"></textarea>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <label class="form-check-label" for="customCheckb1">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#withdrawActionSheet">Buy
                                    subscription now</a>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox mt-2 mb-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheckb1">
                                <label class="form-check-label" for="customCheckb1">
                                    I agree <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and
                                    conditions</a>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-button transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg" >Register</button>
                </div>

            </form>
        </div>
        <ModalItem>
            <template v-slot:button>
                <button type="button" class="btn btn-primary btn-block btn-lg"
                        data-bs-dismiss="modal">Buy
                </button>
            </template>
        </ModalItem>
        <InformModal></InformModal>
    </div>
</template>

<script>
import ModalItem from "../Modals/ModalItem";
import InformModal from "../Modals/InformModal";
import Header from "../LayoutComponents/Header";

export default {
    name: "CompanyRegisterSection",
    components: {InformModal, ModalItem, Header},
    data: function(){
        return{
            form:new Form({
                title: '',
                domain: '',
                description: '',
                logo: ''
            })
        }
    },
    methods:{
        sendData(){
            this.form.post('api/company/register')
        }
    }
}
</script>

<style scoped>

</style>
