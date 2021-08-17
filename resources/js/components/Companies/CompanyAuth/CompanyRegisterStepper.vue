<template>

</template>

<script>
export default {
    name: "CompanyRegisterStepper",
    props:{
        company:{
            required: true
        }
    },
    methods:{
        updateSettings() {
            axios.post('api/company/settings', this.company).then (function (response) {
                if (response.data.href !== undefined) {
                    location.href = response.data.href
                } else {
                    //location.reload(true);
                }

            })
                .catch(function (error) {
                    console.log(error);});


        },
    }
}
</script>

<style scoped>

</style>
