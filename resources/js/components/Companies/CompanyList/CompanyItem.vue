<template>
    <a href="#">
        <div class="blog-card">
            <img :src="company.image" alt="image" class="imaged w-100">
            <div class="text text-center">
                <h3>{{ company.title }}
                    <button @click="getMap" type="button" class="btn btn-icon btn-primary me-1">
                    <ion-icon name="map-outline"></ion-icon>
                </button>
                </h3>

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
    },
    methods:
        {
        getMap()
        {
            axios.get('region-map/' + this.company.id);
            window.location.href = 'region-map/' + this.company.id;
        }
    }
}
</script>
