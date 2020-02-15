require('./bootstrap');
window.Vue = require('vue');

// Imported
import FontAwesome from 'vue-awesome';
import UserMenu from './components/UserMenu.vue';
import DatePicker from 'vue2-datepicker';
import Currency from "./components/Currency";
import NumberInput from 'vue-phone-number-input';
import Alert from './components/Alert.vue';
import MyButton from './components/MyButton.vue';
import MyInput from './components/MyInput.vue';
import Avatar from './components/Avatar';

import Message from './components/Message.vue';

// Styles
import 'vue-phone-number-input/dist/vue-phone-number-input.css';

const app = new Vue({
    el: '#app',
    data: {
        time1: null,
        birthday: null,
        phone: null,
    },
    components:{
        FontAwesome,
        UserMenu,
        DatePicker,
        Currency,
        NumberInput,
        Alert,
        MyButton,
        MyInput,
        Message,
        Avatar
    },
    methods: {

    }
});
