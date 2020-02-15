<template>

</template>

<script>
    import Vue from 'Vue';
    import Toast from "vue-toastification";
    import "vue-toastification/dist/index.css";



    export default {
        name: "Alert",
        props: [
            'message',
            'type',
            'time',
            'position'
        ],
        mounted() {
            Vue.use(Toast, {
                timeout: 4000,
            });
            Vue.$toast(this.message, {
                type: this.type,
                timeout: this.time,
                position: this.position
            });
        }
    }
</script>

<style scoped>

</style>
