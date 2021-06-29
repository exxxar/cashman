<template>
    <fragment>
        <div class="item">
            <img :src="user.avatar" alt="image" class="imaged w86 rounded">
            <div class="in">
                <div>
                    <header>User</header>
                    <header>{{ user.name }}</header>
                    <footer>{{ user.region }}</footer>
                </div>
                <a :href="'javascript:;'" class="headerButton" data-bs-toggle="modal"
                   data-bs-target="#DialogIconedButtonInline">
                    <ion-icon name="trash-outline"></ion-icon>
                </a>
            </div>
        </div>
        <ConfirmActionModal :action="'Удалить ' + user.name + ' из друзей?' "></ConfirmActionModal>
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
    }
}
</script>

<style scoped>
.listview > li header, li footer {
    font-size: 16px !important;
    margin: 10% !important;
}
</style>
