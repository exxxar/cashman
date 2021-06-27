<template>
    <div class="modal fade dialogbox" id="DialogIconedButtonInline" data-bs-backdrop="static" tabindex="-1"
         role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{action}}</h5>
                </div>
                <div class="modal-body">
                    Вы уверены? Отменить действие будет невозможно
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn btn-text-danger" data-bs-dismiss="modal">
                            <ion-icon name="close-outline"></ion-icon>
                            ОТМЕНА
                        </a>
                        <a href="#" class="btn btn-text-primary" data-bs-dismiss="modal">
                            <ion-icon name="checkmark-outline"></ion-icon>
                            ДА
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ConfirmActionModal",
    props:{
        action:{
            required: true,
            type: String
        }
    }
}
</script>

<style scoped>

</style>
