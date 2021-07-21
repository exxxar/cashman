<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Friends Tree
            </template>
        </Header>
        <div id="appCapsule" class="full-height">
            <div id="UsersFriendsTree">
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
    data() {
        return {
            treeData: {
                name: 'root',
                image_url: "https://demotivation.ru/wp-content/uploads/2020/10/1493123379_myau-krasivye-foto-malenkih-kotov-10-1024x727.jpg",
                class: ["rootNode"],
                children: [
                    {
                        name: 'children1',
                        image_url: "https://i1.wallbox.ru/wallpapers/main2/201716/kotenok-seryj.jpg"
                    },
                    {
                        name: 'children2',
                        image_url: "https://krot.info/uploads/posts/2019-09/1568857490_smeshnye-kartinki-s-kotami-26.jpg",
                        children: [
                            {
                                name: 'grandchild',
                                image_url: "https://i.pinimg.com/originals/e8/8f/30/e88f3028afe762960b7a2c11837b34d1.jpg"
                            },
                            {
                                name: 'grandchild2',
                                image_url: "https://kot-pes.com/wp-content/uploads/2016/10/image1-21.jpeg",
                                children: [
                                    {
                                        name: 'child grand',
                                        image_url: "https://izobrazhenie.net/photo/0-0/6250_62448743.jpg"
                                    }
                                ]
                            },
                            {
                                name: 'grandchild3',
                                image_url: "https://proprikol.ru/wp-content/uploads/2020/08/krasivye-kartinki-kotov-22.jpg"
                            }
                        ]
                    },
                    {
                        name: 'children3',
                        image_url: "https://masyamba.ru/картинки-котят/35-милый-котенок.jpg"
                    }
                ]
            }
        }
    }
}
</script>
