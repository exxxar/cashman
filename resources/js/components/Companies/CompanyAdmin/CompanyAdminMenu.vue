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
    <div class="section inset mt-2 mb-2">
        <div class="accordion" id="accordionExample2">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordion001">
                        <ion-icon name="grid-outline"></ion-icon>
                        Товары
                    </button>
                </h2>
                <div id="accordion001" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                    <div class="accordion-body">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">User ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Title</th>
                                            <th scope="col" class="text-end">Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">15323</th>
                                            <td>John</td>
                                            <td>Manager</td>
                                            <td class="text-end">$ 509.40</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">55212</th>
                                            <td>Mark</td>
                                            <td>User</td>
                                            <td class="text-end">$ 230.95</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">44623</th>
                                            <td>Jane</td>
                                            <td>User</td>
                                            <td class="text-end">$ 3,420.50</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordion002">
                        <ion-icon name="cellular-outline"></ion-icon>
                        Реклама
                    </button>
                </h2>
                <div id="accordion002" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                    <div class="accordion-body">
                            <div class="card">

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">User ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Title</th>
                                            <th scope="col" class="text-end">Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">15323</th>
                                            <td>John</td>
                                            <td>Manager</td>
                                            <td class="text-end">$ 509.40</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">55212</th>
                                            <td>Mark</td>
                                            <td>User</td>
                                            <td class="text-end">$ 230.95</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">44623</th>
                                            <td>Jane</td>
                                            <td>User</td>
                                            <td class="text-end">$ 3,420.50</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordion003">
                        <ion-icon name="people-outline"></ion-icon>
                        Пользователи
                    </button>
                </h2>
                <div id="accordion003" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                    <div class="accordion-body">
                            <div class="card">

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">User ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Title</th>
                                            <th scope="col" class="text-end">Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">15323</th>
                                            <td>John</td>
                                            <td>Manager</td>
                                            <td class="text-end">$ 509.40</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">55212</th>
                                            <td>Mark</td>
                                            <td>User</td>
                                            <td class="text-end">$ 230.95</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">44623</th>
                                            <td>Jane</td>
                                            <td>User</td>
                                            <td class="text-end">$ 3,420.50</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../../LayoutComponents/Header";
import BottomMenu from "../../LayoutComponents/BottomMenu";

export default {
    name: "CompanyAdminMenu",
    components:{BottomMenu, Header},
}
</script>

<style scoped>

</style>
