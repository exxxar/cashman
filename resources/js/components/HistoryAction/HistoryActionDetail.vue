<template>
    <fragment>
        <Header class="border-0">
            <template v-slot:left>
                <a href="#" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
            <template v-slot:title>
                {{$trans('strings.History Action')}} — {{ action.type }}
            </template>
            <template v-slot:right>
                <a href="javascript:;" class="headerButton" data-bs-toggle="modal"
                   data-bs-target="#DialogIconedButtonInline">
                    <ion-icon name="trash-outline"></ion-icon>
                </a>
            </template>
        </Header>
        <div id="appCapsule" class="full-height">
            <div class="section mt-2 mb-2">
                <div class="listed-detail mt-3">
                    <div class="icon-wrapper">
                        <div class="iconbox">
                            <img :src="action.logo" alt="image" class="imaged w76 rounded">
                        </div>
                    </div>
                    <h3 class="text-center mt-2">{{ action.value }}</h3>
                </div>
                <ul class="listview simple-listview no-space mt-3">
                    <li>
                        <span>{{$trans('strings.Description')}}</span>
                        <strong>{{ action.description }}</strong>
                    </li>
                    <li>
                        <span>{{$trans('strings.Money in Check')}}</span>
                        <strong>{{ action.money_in_check }}</strong>
                    </li>
                    <li>
                        <span>{{$trans('strings.Date')}}</span>
                        <strong>{{ action.created_at }}</strong>
                    </li>
                    <li>
                        <span>{{$trans('strings.Type')}}</span>
                        <strong>{{ action.type }}</strong>
                    </li>
                </ul>
            </div>
        </div>
        <BottomMenu></BottomMenu>
        <ConfirmActionModal :action="$trans('strings.Remove') + action.value + $trans('strings.from the history of actions?') "></ConfirmActionModal>
    </fragment>
</template>

<script>
import Header from "../LayoutComponents/Header";
import BottomMenu from "../LayoutComponents/BottomMenu";
import ConfirmActionModal from "../Modals/ConfirmActionModal";

export default {
    name: "HistoryActionDetail",
    components: {ConfirmActionModal, BottomMenu, Header},
    props: {
        action: {
            required: true,
            type: Object
        }
    },
    mounted() {
        document.querySelector('body').classList.add('bg-white');
    }
}
</script>
