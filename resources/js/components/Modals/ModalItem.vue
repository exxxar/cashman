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
                        <form>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <slot name="first">
                                        <label class="label" for="account2d">From</label>
                                        <select class="form-control custom-select" id="account2d">
                                            <option value="0">Savings (*** 5019)</option>
                                            <option value="1">Investment (*** 6212)</option>
                                            <option value="2">Mortgage (*** 5021)</option>
                                        </select>
                                    </slot>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <slot name="second">
                                        <label class="label" for="text11d">To</label>
                                        <input type="email" class="form-control" id="text11d" placeholder="Enter IBAN">
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </slot>
                                </div>
                            </div>

                            <div class="form-group basic">
                               <slot name="third">
                                   <label class="label">Enter Amount</label>
                                   <div class="input-group mb-2">
                                       <span class="input-group-text" id="basic-addonb1">$</span>
                                       <input type="text" class="form-control" placeholder="Enter an amount"
                                              value="100">
                                   </div>
                               </slot>
                            </div>

                            <div class="form-group basic">
                               <slot name="button"></slot>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ModalItem"
}
</script>

<style scoped>

</style>
