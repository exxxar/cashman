<template>
    <div class="modal fade action-sheet" id="withdrawActionSheet" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <slot name="header">
                       <h5 class="modal-title">BuySubscription</h5>
                   </slot>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content">
                        <form @submit.prevent="buySubscription"
                              @keydown="form.onKeydown($event)">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <slot name="first">
                                        <label class="label" for="account2d">From</label>
                                        <input v-model="form.from" type="email" class="form-control" id="account2d" placeholder="Enter IBAN">
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </slot>
                                    <HasError :form="form" field="from"/>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <slot name="second">
                                        <label class="label" for="text11d">To</label>
                                        <input v-model="form.to" type="email" class="form-control" id="text11d" placeholder="Enter IBAN">
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </slot>
                                    <HasError :form="form" field="to"/>
                                </div>
                            </div>

                            <div class="form-group basic">
                               <slot name="third">
                                   <label class="label">Enter Amount</label>
                                   <div class="input-group mb-2">
                                       <span class="input-group-text" id="basic-addonb1">$</span>
                                       <input v-model="form.amount" type="text" class="form-control" placeholder="Enter an amount"
                                              value="100">
                                   </div>
                               </slot>
                                <HasError :form="form" field="amount"/>
                            </div>

                            <div class="form-group basic">
                               <slot name="button">
                                   <button type="button" class="btn btn-primary btn-block btn-lg"
                                           data-bs-dismiss="modal">Buy
                                   </button>
                               </slot>
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
import {AlertErrors,  HasError} from "vform/src/components/bootstrap5"
export default {
    name: "ModalItem",
    components: { HasError, AlertErrors},
    data: function () {
        return {
            form: new Form({
                from: '',
                to: '',
                amount: ''
            })
        }
    },
    methods: {
        async buySubscription() {
            await this.form.post('api/buy/subscription')
        },
    }
}
</script>

<style scoped>

</style>
