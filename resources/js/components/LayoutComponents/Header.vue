<template>
    <div class="appHeader">
        <div class="left">
            <slot name="left"></slot>
        </div>
        <div class="pageTitle">
            <slot name="title"></slot>
        </div>
        <div class="right">
            <slot name="right"></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "Header",
    methods:{
        getNot(){
            messaging.onMessage(function(payload) {
                const noteTitle = payload.data.title;
                const noteOptions = {
                    body: payload.data.body,
                    icon: payload.data.image,
                };
                new Notification(noteTitle, noteOptions);
            });

        }
    },
    mounted() {
        this.getNot()
    }
}
</script>
