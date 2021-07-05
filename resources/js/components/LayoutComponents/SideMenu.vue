<template>
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- logo -->
                    <div v-if="auth_user===null" class="profileBox pt-2 pb-2 bg-primary">
                        <div class="image-wrapper">
                            <img src="assets/logo.png" alt="image" class="w-100">
                        </div>
                    </div>
                    <!-- profile box -->
                    <div v-if="auth_user!==null" class="profileBox pt-2 pb-2">
                        <div class="image-wrapper">
                            <img :src="auth_user.avatar" alt="image" class="imaged  w36">
                        </div>
                        <div class="in">
                            <strong>{{auth_user.name}}</strong>
                            <div class="text-muted">{{auth_user.id}}</div>
                        </div>
                        <a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                            <ion-icon name="close-outline"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->
                    <!-- balance -->
                    <div v-if="auth_user!==null" class="sidebar-balance">
                        <div class="listview-title">Balance</div>
                        <div class="in">
                            <h1 class="amount">$ {{auth_user.cashback}}</h1>
                        </div>
                    </div>
                    <!-- * balance -->

                    <!-- action group -->
                    <div v-if="auth_user!==null" class="action-group">
                        <a href="index.html" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="add-outline"></ion-icon>
                                </div>
                                Deposit
                            </div>
                        </a>
                        <a href="index.html" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="arrow-down-outline"></ion-icon>
                                </div>
                                Withdraw
                            </div>
                        </a>
                        <a href="index.html" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="arrow-forward-outline"></ion-icon>
                                </div>
                                Send
                            </div>
                        </a>
                        <a href="app-cards.html" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="card-outline"></ion-icon>
                                </div>
                                My Cards
                            </div>
                        </a>
                    </div>
                    <!-- * action group -->
                    <!-- menu -->
                    <div class="listview-title mt-1">Меню</div>
                    <ul class="listview flush transparent no-line image-listview">
                        <li v-if="auth_user!==null">
                            <a href="user-profile" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Профиль пользователя
                                </div>
                            </a>
                        </li>
                        <li v-if="auth_user!==null">
                            <a href="user-settings" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Настройки профиля
                                </div>
                            </a>
                        </li>
                        <li v-if="auth_user!==null">
                            <a href="history" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    История действий
                                </div>
                            </a>
                        </li>
                        <li v-if="auth_user!==null">
                            <a href="achievements" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Достижения
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="products" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Акции
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="search-company" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Компании
                                </div>
                            </a>
                        </li>
                        <li v-if="auth_user!==null">
                            <a href="friends" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Друзья
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="news" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Новости
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- * menu -->

                    <!-- others -->
                    <div class="listview-title mt-1">Разное</div>
                    <ul class="listview flush transparent no-line image-listview">
                        <li v-if="auth_user!==null">
                            <a href="user-settings" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="settings-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Настройки профиля
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="about-project" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    О нас
                                </div>
                            </a>
                        </li>
                        <li v-if="auth_user!==null">
                            <a href="#" @click.prevent="logout" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Выйти
                                </div>
                            </a>
                        </li>
                        <li v-if="auth_user===null">
                            <a href="/login" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="log-in-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Войти в аккаунт
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- * others -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SideMenu",
    props:{
        auth_user:{
            default: null
        }
    },
    data: () => ({
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }),
    methods: {
        logout: function () {
            axios.post('logout').then(response => {
                if (response.status === 302 || 401) {
                    window.location.href = '/';
                    console.log('logout')
                } else {
                    // throw error and go to catch block
                }
            }).catch(error => {

            });
        },
    },
}
</script>
