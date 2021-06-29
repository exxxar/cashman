<template>
    <div class="item">
        <span class="time">{{ friend.created_at }}</span>
        <div class="dot bg-danger"></div>
        <div class="content">
            <h4 class="title">Your referrals</h4>
            <div class="text">
                <img :src="friend.avatar" alt="avatar" class="imaged w48 rounded">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UserFriendsAddHistoryItem",
    props: {
        friend: {
            required: true,
            type: Object
        }
    }
}
</script>
