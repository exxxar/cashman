<template>
<fragment>
    <Stepper></Stepper>
    <div class="listview-title mt-2">Ваши истории</div>
    <ul class="listview image-listview inset">
        <li v-for="story in stories">
            <a href="#" class="item"  v-on:click="showStory(story)" data-bs-toggle="modal" data-component="stories"
               data-bs-target="#StoryDefault">
                <img :src="story.image" alt="image" class="image">
                <div class="in">
                    <div>{{story.title}}</div>
                </div>
            </a>
        </li>
    </ul>
    <div class="listview-title mt-2">Ваши новости</div>
    <ul class="listview image-listview inset">
        <li v-for="item in news" >
            <a :href="'news/' + item.id" class="item">
                <img :src="item.image" alt="image" class="image">
                <div class="in">
                    <div>{{ item.title }}</div>
                </div>
            </a>
        </li>
    </ul>
    <StoryModal :story="currentStory"/>
</fragment>
</template>

<script>
import {eventBus} from "../../../app";
import StoryModal from "../../Modals/StoryModal";
import Stepper from "../ADComponents/Stepper";

export default {
    name: "StoryAdminMenu",
    components:{ StoryModal, Stepper},
    data: function () {
        return {
            currentStory: []
        }
    },
    mounted() {
        eventBus.$on('showStory', this.getCurrentStory)
    },
    methods: {
        getCurrentStory(story) {
            this.currentStory = story
        },
        showStory(story) {
            eventBus.$emit('showStory', story)
        }
    },
    props:{
        stories:{
            type: Object,
            required: true
        },
        news:{
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
