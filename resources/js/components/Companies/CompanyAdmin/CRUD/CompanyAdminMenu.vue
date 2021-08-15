<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a :href="'/company-profile-'+ id" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Меню админа компании
            </template>
        </Header>
        <br/>
        <br/>
        <div class="listview-title mt-2">Данные вашей компании</div>
        <ul class="listview image-listview inset">
            <li>
                <a :href="'/company-admin-products-' + id" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="wallet-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Товары</div>
                    </div>
                </a>
            </li>
            <li>
                <a :href="'/company-admin-advertisement-'+id" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="newspaper-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Реклама</div>
                    </div>
                </a>
            </li>
            <li>
                <a :href="'/company-admin-users-'+id" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Пользователи</div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="listview-title mt-2">Данные вашей компании</div>
        <ul class="listview image-listview inset">
            <li>
                <a :href="'/company-action-menu-'+id" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="ellipsis-horizontal-circle-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Меню действий</div>
                    </div>
                </a>
            </li>
            <li>
                <a :href="'/company-group-admin-'+id" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Администраторы компании</div>
                    </div>
                </a>
            </li>
        </ul>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../../../LayoutComponents/Header";
import BottomMenu from "../../../LayoutComponents/BottomMenu";

export default {
    name: "CompanyAdminMenu",
    components: { BottomMenu, Header},
    props:{
        id:{
            type:Number,
            required: true
        }
    }

}
</script>

<style scoped>

</style>
