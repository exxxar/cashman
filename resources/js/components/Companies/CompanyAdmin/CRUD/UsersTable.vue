<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Ваши клиенты
            </template>
        </Header>
        <br/>
        <br/>
        <div class="section mt-2 mb-2">
            <div class="section-title">
                Клиенты вашей компании
            </div>

            <div class="card text-center" >
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Код</th>
                            <th>Имя</th>
                            <th>Аватар</th>
                            <th>Мобильный телефон</th>
                            <th>Страна</th>
                            <th>Регион</th>
                            <th>Адрес</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="user in users" :key="user.id">
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td><img :src="user.avatar" alt="image"
                                     class="imaged w100 rounded"></td>
                            <td>{{ user.phone }}</td>
                            <td>{{ user.country }}</td>
                            <td>{{ user.region}}</td>
                            <td>{{ user.address}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </fragment>
</template>

<script>
import Header from "../../../LayoutComponents/Header";


export default {
    name: "UsersTable",
    components: { Header},
    props: {
        users: {
            type: Object,
            required: true
        }
    },
}
</script>

<style scoped>

</style>
