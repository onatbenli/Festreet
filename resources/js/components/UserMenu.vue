<template>
    <li @mouseover="menuOpen = true" @mouseleave="menuOpen = false" class="relative p-2 mr-1 hover:visible inline-flex text-white font-light text-sm ">
        Merhaba &nbsp <b> {{ user }}</b>
        <font-awesome v-bind:name="icon" class="ml-2"></font-awesome>
        <div v-if="menuOpen" class="absolute right-0 mt-6 bg-white pt-3 text-black text-left font-normal rounded shadow-lg cursor-pointer w-full">
            <p class="text-center">
                <span class="rounded-full m-auto w-12 shadow-lg uppercase text-3xl bg-primary-500 px-4 py-1 text-white">{{ first_letter }}</span>
            </p>
            <div class="mt-2 text-center">
                <p class="font-bold text-primary-500 ">{{ name }} {{ surname }}</p>
                <p class="text-xs">{{ type }}</p>
            </div>
            <ul class="border-t border-gray-200 mt-2">
                <li class="py-2 border-gray-200 pl-3 hover:bg-gray-100"><a v-bind:href="route+'/my/account'"><font-awesome name="user" class="mr-2"></font-awesome> Hesabım</a></li>
                <li class="py-2 border-gray-200 pl-3 hover:bg-gray-100"><a v-bind:href="route+'/my/event'"><font-awesome name="list" class="mr-2"></font-awesome> Etkinliklerim</a></li>
                <li class="py-2 border-gray-200 pl-3 hover:bg-gray-100"><a v-bind:href="route+'/my/favorite'"><font-awesome name="star" class="mr-2"></font-awesome> Favorilerim</a></li>
                <li class="py-2 border-gray-200 pl-3 hover:bg-gray-100"><a v-bind:href="route+'/my/ticket'"><font-awesome name="ticket-alt" class="mr-2"></font-awesome> Biletlerim</a></li>
                <li class="py-2 pl-3 hover:bg-red-100">
                    <form v-bind:action="route+'/logout'"  method="post">
                        <input type="hidden" v-bind:value="csrf" name="_token" />
                        <button class="text-red-600 focus:outline-none"><font-awesome name="running" class="mr-2"></font-awesome>  Çıkış Yap</button>
                    </form>
                </li>
            </ul>
        </div>
    </li>
</template>

<script>
    import FontAwesome from 'vue-awesome';

    export default {
        name: "UserMenu",
        props: [
            'isMenu',
            'user',
            'route',
            'csrf',
            'name',
            'surname',
            'type',
            'first_letter'
        ],
        data() {
            return{
                menuOpen: false,
                icon: 'sort-down',
            }
        },
        components: {
            FontAwesome
        },
        methods: {
            iconChange:() => {
                if(this.menuOpen == true){
                    this.icon = 'sort-up';
                }else{
                    this.icon = 'sort-down';
                }
            }
        }
    }
</script>

<style scoped>

</style>
