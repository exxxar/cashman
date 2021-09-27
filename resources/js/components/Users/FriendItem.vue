<template>
    <fragment>
        <div class="item">
            <img :src="user.avatar" alt="image" class="imaged w86 rounded">
            <div class="in">
                <div>
                    <header v-if="type==='friend'">User</header>
                    <header v-if="type==='admin'">Admin</header>
                    <header>{{ user.name }}</header>
                    <footer>{{ user.region }}</footer>
                </div>
                <a v-if="type==='friend'" href="javascript:;" class="headerButton" data-bs-toggle="modal"
                   data-bs-target="#DialogIconedButtonInline">
                    <ion-icon name="trash-outline"></ion-icon>
                </a>
            </div>
        </div>
        <ConfirmActionModal v-if="type==='friend'" :action="'Удалить ' + user.name + ' из друзей?' "></ConfirmActionModal>
    </fragment>
</template>

<script>
import ConfirmActionModal from "../Modals/ConfirmActionModal";

export default {
    name: "FriendItem",
    components: {ConfirmActionModal},
    props: {
        user:
            {
                required: true,
                type: Object
            },
        type:{
            default: 'friend'
        }
    }
}
</script>

<style scoped>
.listview > li header, li footer {
    font-size: 16px !important;
    margin: 10% !important;
}
</style>
