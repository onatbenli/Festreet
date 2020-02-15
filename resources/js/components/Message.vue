<template>
    <div v-bind:class="'p-3 bg-'+color+'-300 w-full rounded shadow-lg'">
        <p v-bind:class="'font-bold border-b border-'+color+'-400 pb-2'">{{ title }}</p>
        <p class="text-sm mt-2">
            {{ message }}
        </p>
    </div>
</template>

<script>
    export default {
        name: "Message",
        props: [
            'title',
            'message',
            'color',
        ],
        methods:{
        }
    }
</script>

<style scoped>

</style>
