<template>
    <li
        @mouseover="menuOpen = true"
        @mouseleave="menuOpen = false"
        class="p-2 mr-3 inline-flex text-white font-light text-sm font-bold rounded">
        Para Birimi <span class="font-thin">( {{ selectedCurrency }} ) </span><font-awesome class="ml-1" name="sort-down"></font-awesome>

        <ul v-if="menuOpen" class="absolute mt-6 bg-white py-3 px-4 text-black text-left font-normal rounded shadow-lg cursor-pointer">
            <li><a href="#" @click="selectCurrency('try','₺')">Türk Lirası (₺)</a></li>
            <li><a href="#" @click="selectCurrency('eur','€')">Euro (€)</a></li>
            <li><a href="#" @click="selectCurrency('usd','$')">Dolar ($)</a></li>
            <li><a href="#" @click="selectCurrency('jpy','¥')">Yen (¥)</a></li>
            <li><a href="#" @click="selectCurrency('gbp','£')">Sterlin (£)</a></li>
        </ul>
    </li>

</template>

<script>
    import FontAwesome from 'vue-awesome';
    export default {
        name: "Currency",
        data(){
            return{
                menuOpen: false,
                selectedCurrency: '₺'
            }
        },
        components: {
            FontAwesome
        },
        methods:{
            selectCurrency(iso,icon){
                this.selectedCurrency = icon;
            }
        }
    }
</script>

<style scoped>

</style>
