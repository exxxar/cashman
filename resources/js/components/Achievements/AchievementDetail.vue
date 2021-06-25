<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href='#' class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Детали Достижения
            </template>
        </Header>
    <div id="appCapsule" class="full-height">

        <div class="section mt-2 mb-2">


            <div class="listed-detail mt-3">
                <div class="icon-wrapper">
                    <div class="iconbox">
                        <img :src="achievement.achievement_image_url" alt="img" class="image-block imaged w48">
                    </div>
                </div>
                <h3 class="text-center mt-2">{{achievement.title}}</h3>
            </div>

            <ul class="listview flush transparent simple-listview no-space mt-3">
                <li>
                    <strong>Position</strong>
                    <span class="text-success">{{achievement.position}}</span>
                </li>
                <li>
                    <strong>Description</strong>
                    <span>{{achievement.description}}</span>
                </li>
                <li>
                    <strong>Prize image</strong>
                    <span>{{achievement.prize_image_url}}</span>
                </li>
                <li>
                    <strong>Prize Description</strong>
                    <span>{{achievement.prize_description}}</span>
                </li>
                <li>
                    <strong>Active</strong>
                    <span>Yes</span>
                </li>
                <li>
                    <strong>Date</strong>
                    <span>Sep 25, 2020 10:45 AM</span>
                </li>
                <li>
                    <strong>Amount</strong>
                    <h3 class="m-0">$ {{achievement.value}}</h3>
                </li>
            </ul>


        </div>

    </div>
    </fragment>
</template>

<script>
export default {
    name: "AchievementDetail",
    props:{
        achievement:{
            required: true,
            type: Object
        },
    },
}
</script>

<style scoped>

</style>
