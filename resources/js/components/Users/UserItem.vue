<template>
    <a href="#" >
        <div  class="user-card">
            <img :src="user.avatar" alt="img" class="imaged w-100">
            <strong>{{ user.name }}</strong>
        </div>
    </a>
</template>

<script>
export default {
    name: "UserItem",
    props: {
        user:
            {
                required: true,
                type: Object
            },

    }
}
</script>

<style scoped>

</style>
