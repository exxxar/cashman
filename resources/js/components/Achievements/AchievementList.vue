<template>
    <div class="section mt-4">
        <div v-if="!showDetail" class="section-heading">
            <h2 class="title">Достижения</h2>
            <a :href="'/achievements'" class="link">View All</a>
        </div>
        <div class="goals" >
            <div class="item" v-for="achievement in achievements">
           <AchievementItem :achievement=achievement
                            :show-detail=showDetail></AchievementItem>
            </div>
        </div>
    </div>
</template>

<script>
import AchievementItem from "./AchievementItem";
export default {
name: "AchievementList",
    components: {AchievementItem},
    data: function () {
        return {
            achievements: [
                {id:1, title: "Gaming Console", achievement_description: "Gaming", achievement_image_url: "assets/sample/photo/wide1.jpg",
                value: 499, prize_description: "Gaming Console", prize_image_url: "assets/sample/photo/wide2.jpg", position: 85},
                {id:2,title: "Gaming Console", achievement_description: "Gaming", achievement_image_url: "assets/sample/photo/wide1.jpg",
                    value: 499, prize_description: "Gaming Console", prize_image_url: "assets/sample/photo/wide2.jpg", position: 85},
                {id:3,title: "Gaming Console", achievement_description: "Gaming", achievement_image_url: "assets/sample/photo/wide1.jpg",
                    value: 499, prize_description: "Gaming Console", prize_image_url: "assets/sample/photo/wide2.jpg", position: 85},

            ]
        }
    },
    props:{
    showDetail:{
        required: true,
        type: Boolean
    }
    }
}
</script>

<style scoped>

</style>
