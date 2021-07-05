<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Achievements
            </template>
        </Header>
        <div id="appCapsule">
            <AchievementList :show-detail="true"></AchievementList>
        </div>
        <BottomMenu></BottomMenu>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import AchievementList from "../Achievements/AchievementList";
import BottomMenu from "../LayoutComponents/BottomMenu";
import Footer from "../LayoutComponents/Footer";

export default {
    name: "AchievementPage",
    components: {Footer, BottomMenu, AchievementList, Header}
}
</script>
