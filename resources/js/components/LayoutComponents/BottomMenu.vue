<template>
    <div class="appBottomMenu">
        <a href="/" class="item">
            <div class="col">
                <ion-icon name="pie-chart-outline"></ion-icon>
                <strong>Главная</strong>
            </div>
        </a>
        <a href="products" class="item">
            <div class="col">
                <ion-icon name="document-text-outline"></ion-icon>
                <strong>Акции</strong>
            </div>
        </a>
        <a href="news" class="item active">
            <div class="col">
                <ion-icon name="apps-outline"></ion-icon>
                <strong>Новости</strong>
            </div>
        </a>
        <a href="search-company" class="item">
            <div class="col">
                <ion-icon name="card-outline"></ion-icon>
                <strong>Компании</strong>
            </div>
        </a>
        <a href="user-settings" class="item">
            <div class="col">
                <ion-icon name="settings-outline"></ion-icon>
                <strong>Настройки профиля</strong>
            </div>
        </a>
    </div>
</template>

<script>
export default {
    name: "BottomMenu"
}
</script>
