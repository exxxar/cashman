<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Дерево друзей
            </template>
        </Header>
        <div id="appCapsule" class="full-height">
            </br>
            <h4 class="text-center" v-if="treeData===null">Пригласите друзей в одну из ваших компаний, чтобы построить дерево друзей!</h4>
            <div id="UsersFriendsTree" v-if="treeData!==null">
                <TreeChart :json="treeData"/>
            </div>
        </div>
        <Footer class="padding-bottom-70"></Footer>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import Footer from "../LayoutComponents/Footer";
import BottomMenu from "../LayoutComponents/BottomMenu";
import TreeChart from "vue-tree-chart";

export default {
    name: "UsersFriendsTree",
    components: {BottomMenu, Footer, Header, TreeChart},
    props:{
        treeData:{
           required: true
        }
    }

}
</script>
