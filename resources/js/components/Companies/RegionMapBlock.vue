<template>
    <fragment>
        <Header>
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                Адрес компании
            </template>
        </Header>
        <br/>
        <br/>
        <yandex-map
            :coords="coords"
            :zoom="10">
            <ymap-marker
                marker-id="123"
                :coords="coords"
                :icon="markerIcon"
            />
        </yandex-map>

    </fragment>
</template>

<script>
import {yandexMap, ymapMarker} from 'vue-yandex-maps'
import Header from "../LayoutComponents/Header";

export default {
    name: "RegionMapBlock",
    components: {Header, yandexMap, ymapMarker},
    data: function () {
        return {
            markerIcon: {
                layout: 'default#imageWithContent',
                imageHref: 'http://cdn.onlinewebfonts.com/svg/img_296993.png',
                imageSize: [43, 43],
                imageOffset: [0, 0],
                content: '123 v12',
                contentOffset: [0, 15],
                contentLayout: '<div style="background: blue; width: 50px; color: #FFFFFF; font-weight: bold;"></div>'
            }
        }
    },
    props: {
        coords: {
            required: true
        },
        content: {
            default: 'company'
        }
    }
}
</script>

<style lang="scss">

.ymap-container {
    width: 100%;
    height: 600px;
}
</style>
