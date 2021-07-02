<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
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
                <a href="/company-admin-products" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="wallet-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Товары</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="/company-admin-advertisement" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="card-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Реклама</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="/company-admin-users" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Пользователи</div>
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
    components: {BottomMenu, Header},

}
</script>

<style scoped>

</style>
