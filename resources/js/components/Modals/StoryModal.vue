<template>
    <div class="modal fade stories" id="StoryDefault" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="story-image">
                    <img :src="story.image" alt="image">
                </div>
                <div class="modal-header">
                    <a :href="'#'" class="profile-detail">
                        <img :src="story.avatar" alt="avatar"
                             class="imaged w36 rounded me-1">
                        <div>
                            <h4>{{ story.name }}</h4>
                            <span class="text-muted">{{ story.created_at }}</span>
                        </div>
                    </a>
                    <a :href="'#'" data-bs-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <h1>{{ story.title }}</h1>
                    <p>{{ story.description }}</p>
                    <a :href="'#'" class="fixed-btn btn btn-primary">Fixed Button</a>
                </div>
            </div>
        </div>
    </div>
    <!-- * Story with Fixed Button  -->
</template>

<script>
export default {
    name: "StoryModal",
    props: {
        story: {
            required: true
        }
    }

}
</script>
