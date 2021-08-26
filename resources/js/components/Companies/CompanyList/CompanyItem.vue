<template>
    <a :href="'company-profile-' + this.company.id">
        <div class="blog-card">
            <img v-lazy="'assets/sample/'+company.image" alt="image"
                 class="img w-100 fill fixed-height-images-companies">
            <div class="company-text">
                <h3 class="company-title">{{ company.title }}</h3>
            </div>
            <div class="fixed-button-company">
                <a @click="getMap" type="button" class="item btn btn-icon btn-primary">
                    <ion-icon name="map-outline"></ion-icon>
                </a>
                <a v-if="user!==null" @click="addCompany" type="button"
                   class="item btn btn-icon btn-success">
                    <ion-icon name="add-outline"></ion-icon>
                </a>
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
        },
        user: {
            default: null
        }
    },
    methods:
        {
            getMap() {
                axios.get('region-map/' + this.company.id)
                    .then(() => {
                        window.location.href = 'region-map/' + this.company.id;
                    })
            },
            addCompany() {
                axios.get('company/add-' + this.company.id)
                    .then(() => {
                        window.location.href = 'user-profile';
                    })
            },
            showCompany() {
                axios.get('company-profile-' + this.company.id)
                    .then(() => {
                        window.location.href = 'company-profile-' + this.company.id;
                    })
            }
        }
}
</script>
<style>

/*
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
*/
.fixed-height-images-companies {
    padding: 10px 10px 0 10px;
    object-fit: contain;
    height: auto;
}
.fixed-button-company {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: center;
    align-content: center;
    height: 40px;
    padding-bottom: 5%;
}
.blog-card .company-title {
    display: flex;
    text-align: center;
    justify-content: center;
    margin: 0;
    font-weight: 500;
    line-height: 1.4em;
    overflow: hidden;
}

@media (max-width: 320px) {
    .blog-card .company-text {
        padding: 3% 5%;
    }

    .blog-card .company-title {
        height: 50px;
        font-size: 90%;
        font-weight: 700;
    }
}

@media (min-width: 320px) and (max-width: 375px) {
    .blog-card .company-text {
        padding: 3% 5%;
    }

    .blog-card .company-title {
        height: 50px;
        font-size: 90%;
        font-weight: 700;
    }
}

@media (min-width: 375px) and (max-width: 425px) {
    .blog-card .company-text {
        padding: 3% 3%;
    }

    .blog-card .company-title {
        height: 65px;
        font-size: 100%;
    }
}

@media (min-width: 425px) and (max-width: 600px) {
    .blog-card .company-text {
        padding: 7%;
    }

    .blog-card .company-title {
        height: 60px;
        font-size: 15px;
    }
}

@media (min-width: 600px) and (max-width: 768px) {
    .blog-card .company-text {
        padding: 5%;
    }

    .blog-card .company-title {
        height: 65px;
        font-size: 16px;
    }
}

@media (min-width: 768px) and (max-width: 992px) {
    .blog-card .company-text {
        padding: 8%;
    }

    .blog-card .company-title {
        height: 60px;
        font-size: 16px;
    }
}

@media (min-width: 992px) and (max-width: 1024px) {
    .blog-card .company-text {
        padding: 8%;
    }

    .blog-card .company-title {
        height: 50px;
        font-size: 19px;
    }
}

@media (min-width: 1024px) and (max-width: 1200px) {
    .blog-card .company-text {
        padding: 8%;
    }

    .blog-card .company-title {
        height: 65px;
        font-size: 17px;
    }
}

@media (min-width: 1200px) and (max-width: 1400px) {
    .blog-card .company-text {
        padding: 2%;
    }

    .blog-card .company-title {
        height: 65px;
        font-size: 20px;
    }
}

@media (min-width: 1400px) {
    .blog-card .company-text {
        padding: 5%;
    }

    .blog-card .company-title {
        height: 65px;
        font-size: 22px;
    }
}
</style>
