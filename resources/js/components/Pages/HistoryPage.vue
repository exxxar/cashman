<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                History
            </template>
        </Header>
        <div id="appCapsule" class="full-height">
            <HistoryActionList v-if="actions.length>0" :show-detail="true" :actions="actions"></HistoryActionList>
            <h4 class="text-center" v-if="!actions.length>0">У вас пока нет уведомлений! Совершайте покупки, приглашайте друзей и получайте уведомления о каждом действии!</h4>
        </div>
        <Footer class="padding-bottom-70"></Footer>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import HistoryActionList from "../HistoryAction/HistoryActionList";
import BottomMenu from "../LayoutComponents/BottomMenu";
import Footer from "../LayoutComponents/Footer";

export default {
    name: "HistoryActionPage",
    components: {Footer, BottomMenu, HistoryActionList, Header},
    props:{
        id:{
            required: true,
            type: Number
        }
    },

    data(){
        return{
           actions: []
        }
    },
    mounted() {
        axios.get('api/actions/'+this.id).then((response)=>{
            this.actions = response.data.actions
        })
    }

}
</script>
