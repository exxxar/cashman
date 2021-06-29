<template>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img :src="company.image" alt="avatar">
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title">{{company.title}}</h5>
                    <p class="card-text">{{company.description}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CompanyItem",
    props:{
        company:{
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
