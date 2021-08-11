<template>
    <div class="section mt-4">
        <div class="section-heading padding">
            <h2 class="title">Истории</h2>
        </div>
        <!-- story-block -->
        <div class="mb-0 story-block splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li v-if="addNew" class="splide__slide">
                        <a href="/add-advertising">
                            <img src="assets/icon/plus.png" alt="alt"
                                 class="imaged w-100 rounded shadow-none">
                        </a>
                    </li>
                    <li class="splide__slide" v-for="story in stories">
                        <StoryItem :story='story'></StoryItem>
                    </li>
                </ul>
            </div>
        </div>
        <!-- * story-block -->
        <StoryModal :story="currentStory" />
    </div>
</template>

<script>
import StoryItem from "./StoryItem";
import {eventBus} from '../../app'
import StoryModal from "../Modals/StoryModal";

export default {
    name: "StoryList",
    components: {StoryModal, StoryItem},
    props: {
        addNew: {
            default: false,
            type: Boolean
        },
        stories:{
            required:true,

        }
    },
    data: function () {
        return {
            currentStory: [],
        }
    },
    mounted() {
        eventBus.$on('showStory', this.getCurrentStory)
    },
    methods: {
        getCurrentStory(story) {
            this.currentStory = story
        }
    }
}
</script>
