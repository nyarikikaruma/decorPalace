<template >
    <div>
        <NavBar :items="length"></NavBar>
        <router-view @itemsLength="itemsLength"></router-view>
    </div>
</template>
<script>
import NavBar from './NavBar.vue';
import Body from './Body.vue';

export default {
    name: 'App',
    components: {
        NavBar,
        Body,

    },
    data() {
        return {
            cartItems: [],
            length: 0

        }
    },
    mounted() {
            axios.get('http://127.0.0.1:8000/api/cart')
                .then(response => {
                    this.cartItems = response.data;
                     return this.length = this.cartItems.length
                    })
                    .catch(error => {
                        console.log(error);
                    });

    },
    methods: {
        itemsLength(){
            axios.get('http://127.0.0.1:8000/api/cart')
                .then(response => {
                    this.cartItems = response.data;
                     return this.length = this.cartItems.length
                    })
                    .catch(error => {
                        console.log(error);
                    });

        }
    },
}
</script>
<style >
    
</style>