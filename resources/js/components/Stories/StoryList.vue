<template>
    <div class="section full mt-3">
        <div class="section-heading padding">
            <h2 class="title">Истории</h2>
        </div>
        <div class="p-0 pt-2 pb-2">

            <!-- story-block -->
            <div class="story-block splide">
                <div class="splide__track">
                    <ul class="splide__list" >
                        <li class="splide__slide" v-for="story in stories">
                                 <StoryItem :story=story></StoryItem>
                         </li>
                    </ul>
                </div>
            </div>
            <!-- * story-block -->

        </div>
        <StoryModal :story="currentStory"/>
    </div>
</template>

<script>
import StoryItem from "./StoryItem";
import {eventBus} from '../../app'
import StoryModal from "../Modals/StoryModal";
export default {
name: "StoryList",
    components: {StoryModal, StoryItem},
    data: function(){
    return{
        stories: [
            {avatar: "assets/sample/avatar/avatar1.jpg", image: "assets/sample/photo/1.jpg",
            name: "Ashley Graham", created_at: "24.06.2021", title: "Another Title Here",
                description: "This is simple text for the story"},
            {avatar: "assets/sample/avatar/avatar2.jpg", image: "assets/sample/photo/2.jpg",
                name: "Ashley Graham", created_at: "24.06.2021", title: "Another Title Here",
                description: "This is simple text for the story"},
            {avatar: "assets/sample/avatar/avatar3.jpg", image: "assets/sample/photo/vector3.png",
                name: "Ashley Graham", created_at: "24.06.2021", title: "Another Title Here",
                description: "This is simple text for the story"},
            {avatar: "assets/sample/avatar/avatar4.jpg", image: "assets/sample/photo/vector1.png",
                name: "Ashley Graham", created_at: "24.06.2021", title: "Another Title Here",
                description: "This is simple text for the story"},
            {avatar: "assets/sample/avatar/avatar4.jpg", image: "assets/sample/photo/vector1.png",
                name: "Ashley Graham", created_at: "24.06.2021", title: "Another Title Here",
                description: "This is simple text for the story"},
            {avatar: "assets/sample/avatar/avatar4.jpg", image: "assets/sample/photo/vector1.png",
                name: "Ashley Graham", created_at: "24.06.2021", title: "Another Title Here",
                description: "This is simple text for the story"},
            {avatar: "assets/sample/avatar/avatar4.jpg", image: "assets/sample/photo/vector1.png",
                name: "Ashley Graham", created_at: "24.06.2021", title: "Another Title Here",
                description: "This is simple text for the story"},
        ],
        currentStory: []

    }
    },
    mounted () {
        eventBus.$on('showStory', this.getCurrentStory)
    },
    methods:{
    getCurrentStory(story){
            this.currentStory = story
        }
    }


}
</script>

<style scoped>

</style>
