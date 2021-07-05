<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Settings
            </template>
            <template v-slot:right>
                <a href="#" class="headerButton">
                    <ion-icon class="icon" name="notifications-outline"></ion-icon>
                    <span class="badge badge-danger">1</span>
                </a>
            </template>
        </Header>
        <div id="appCapsule">
            <div class="section mt-3 text-center">
                <div class="avatar-section">
                    <a href="#">
                        <img src="assets/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w100 rounded">
                        <span class="button">
                        <ion-icon name="camera-outline"></ion-icon>
                    </span>
                    </a>
                </div>
            </div>
            <div class="listview-title mt-1">Theme</div>
            <ul class="listview image-listview text inset">
                <li>
                    <div class="item">
                        <div class="in">
                            <div>Dark Mode</div>
                            <div class="form-check form-switch  ms-2">
                                <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodeSwitch">
                                <label class="form-check-label" for="darkmodeSwitch"></label>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="listview-title mt-1">Компании</div>
            <ul class="listview image-listview text inset">
                <li>
                    <a href="register-company" class="item">
                        <div class="in">
                            <div>
                                Регистрация компании
                                <div class="text-muted">
                                    Здесь вы можете добавить свою новую компанию
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="login-company" class="item">
                        <div class="in">
                            <div>
                                Авторизация компании
                                <div class="text-muted">
                                    Здесь вы можете войти в свою новую компанию
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="listview-title mt-1">Настройки профиля</div>
            <ul class="listview image-listview text inset">
                <li>
                    <a href="/user-edit" class="item">
                        <div class="in">
                            <div>Изменить настройки профиля</div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="item">
                        <div class="in">
                            <div>Update E-mail</div>
                        </div>
                    </a>
                </li>

            </ul>
            <div class="listview-title mt-1">Security</div>
            <ul class="listview image-listview text mb-2 inset">
                <li>
                    <a href="password/reset" class="item">
                        <div class="in">
                            <div>Update Password</div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="item">
                        <div class="in">
                            <div>
                                2 Step Verification
                            </div>
                            <div class="form-check form-switch ms-2">
                                <input class="form-check-input" type="checkbox" id="SwitchCheckDefault3" checked/>
                                <label class="form-check-label" for="SwitchCheckDefault3"></label>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" @click.prevent="logout" class="item">
                        <div class="in">
                            <div>Выйти со всех устройств</div>
                        </div>
                    </a>
                </li>
            </ul>
            <Footer></Footer>
        </div>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import Footer from "../LayoutComponents/Footer";
import BottomMenu from "../LayoutComponents/BottomMenu";

export default {
    name: "UserSettingsPage",
    components: {Header, Footer, BottomMenu},
    data: () => ({
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }),
    methods: {
        logout: function () {
            axios.post('logout').then(response => {
                if (response.status === 302 || 401) {
                    window.location.href = '/';
                } else {
                    // throw error and go to catch block
                }
            }).catch(error => {

            });
        },
    },
}
</script>
