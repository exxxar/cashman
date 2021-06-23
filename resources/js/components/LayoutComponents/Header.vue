<template>
    <div class="appHeader no-border transparent position-absolute">
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
name: "Header"
}
</script>

<style scoped>

</style>
