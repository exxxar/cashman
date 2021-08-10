<template>
    <div class="bill-box">
        <img v-lazy="'assets/sample/'+company.image" alt="image" class="image-block imaged w-75">
        <br>
        <br>
        <div class="text text-center right-button">
            <h3 class="title">{{ company.title }}</h3>
            <a @click="getMap" type="button" class="item btn btn-icon btn-primary pos-ab-right-5">
                <ion-icon name="map-outline"></ion-icon>
            </a>
            <a v-if="user!==null && allowAdd" @click="addCompany" type="button" class="item btn btn-icon btn-success pos-ab-left-5">
                <ion-icon name="add-outline"></ion-icon>
            </a>
            <a v-if="user!==null && !allowAdd" @click="showCompany" type="button" class="item btn btn-icon btn-info pos-ab-left-5">
                <ion-icon name="open-outline"></ion-icon>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: "CompanyItem",
    props: {
        company: {
            type: Object,
            required: true
        },
        user:{
            default: null
        },
        allowAdd:{
            type: Boolean,
            default: false
        }
    },
    methods:
        {
            getMap() {
                axios.get('region-map/' + this.company.id)
                .then(()=>{
                    window.location.href = 'region-map/' + this.company.id;
                })
            },
            addCompany()
            {
                axios.get('company/add-' + this.company.id)
                .then(()=>{
                    window.location.href = 'user-profile';
                })
            },
            showCompany()
            {
                axios.get('company-profile-' + this.company.id)
                    .then(()=>{
                        window.location.href = 'company-profile-' + this.company.id;
                    })
            }
        }
}
</script>
<style>
.right-button {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.pos-ab-right-5 {
    position: absolute;
    right: 5%;
}
.pos-ab-left-5 {
    position: absolute;
    left: 5%;
}

@media screen and (max-width: 576px) {
    .right-button {
        display: block;
    }

    .pos-ab-right-5 {
        position: relative;
        right: 0;
    }
    .pos-ab-left-5 {
        position: relative;
        left: 0;
    }
}
</style>
