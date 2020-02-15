<template>
    <button class="py-2 px-4 bg-primary-500 text-white rounded hover:bg-primary-600 focus:outline-none shadow-lg transition-bg">
        {{ value }}
    </button>
</template>

<script>
    export default {
        name: "MyButton",
        props: [
            'value'
        ]
    }
</script>

<style scoped>

</style>
