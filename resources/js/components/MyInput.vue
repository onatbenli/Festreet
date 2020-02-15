<template>
    <input v-bind:type="type" v-bind:value="value" v-bind:id="name" v-bind:name="name" class="p-2 text-sm transition-border border border-gray-200 focus:border-gray-400 placeholder-gray-400 rounded block w-full focus:outline-none" v-bind:placeholder="placeholder" />
</template>

<script>
    export default {
        name: "MyInput",
        props: [
            'type',
            'name',
            'placeholder',
            'value'
        ]
    }
</script>

<style scoped>

</style>
