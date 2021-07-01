<template>
    <a href="#">
        <div class="blog-card">
            <img :src="company.image" alt="image" class="imaged w-100">
            <div class="text text-center">
                <h3>{{ company.title }}</h3>
            </div>
        </div>
    </a>
</template>

<script>
export default {
    name: "CompanyItem",
    props: {
        company: {
            type: Object,
            required: true
        }
    }
}
</script>
