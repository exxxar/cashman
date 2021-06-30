<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                История
            </template>
            <template v-slot:right>
                <a href="javascript:;" class="headerButton" onclick="toastbox('toast-example-1', 3000)">
                    <ion-icon name="notifications-off-outline"></ion-icon>
                </a>
            </template>
        </Header>
        <div id="appCapsule">
            <HistoryActionList :show-detail="true"></HistoryActionList>
        </div>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import HistoryActionList from "../HistoryAction/HistoryActionList";
import BottomMenu from "../LayoutComponents/BottomMenu";

export default {
    name: "HistoryActionPage",
    components: {BottomMenu, HistoryActionList, Header}
}
</script>
