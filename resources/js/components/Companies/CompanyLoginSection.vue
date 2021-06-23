<template>
    <div id="appCapsule">
        <Header>
            <template v-slot:left>
                <a href='/' class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </template>
        </Header>
        <div class="section mt-2 text-center">
            <h1>Log in your company account</h1>
            <h4>Fill the form to log in</h4>
        </div>
        <div class="section mb-5 p-2">

            <form action="index.html">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">Domain</label>
                                <input type="email" class="form-control" id="email1" placeholder="Your domain">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-links mt-2">
                    <div>
                        <a href="app-register.html">Register Your Company Now</a>
                    </div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                </div>

            </form>
        </div>
    </div>

</template>

<script>
import Header from "../LayoutComponents/Header";

export default {
    name: "CompanyLoginSection",
    components: {Header}
}
</script>

<style scoped>

</style>
