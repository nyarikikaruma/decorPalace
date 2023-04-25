<template>
    <div class="container mx-auto px-4 py-8 max-w-lg">
        <div class="rounded-lg shadow-lg p-8">
            <h1 class="text-2xl font-bold mb-8 text-center">Your Cart</h1>
            <div class="grid grid-cols-1 gap-8">
                <div v-for="(item, index) in cartItems" :key="index" class="rounded-lg shadow-lg p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-lg font-bold">{{item.name}}</h2>
                        <span class="text-lg">{{item.price}}</span>
                        <svg @click="deleteItem(item.id)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 hover:text-red-500  hover:cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </div>
                </div>
                <div class="rounded-lg shadow-lg p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-lg font-bold">Total amount</h2>
                        <span class="text-lg">{{total}}</span>                        
                    </div>
                </div>
                <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">
                    Checkout
                </button>
            </div>
        </div>
    </div>
</template>
  
<script>
export default {
    data() {
        return {
            cartItems: [],
            totalCost: 0
        };
    },
    computed: {
        total() {
            for (let i = 0; i < this.cartItems.length; i++){
                this.totalCost += this.cartItems[i].price
            }
            return this.totalCost
        },
    },
    methods: {
        deleteItem(id) {
            axios.delete('http://127.0.0.1:8000/api/cart/delete/' + id)
            this.cartItems = []
            this.totalCost =0
            axios.get('http://127.0.0.1:8000/api/cart')
            .then(response => {
                this.cartItems = response.data;
            })
        },
    },
    mounted() {
        axios.get('http://127.0.0.1:8000/api/cart')
                .then(response => {
                    this.cartItems = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
    },
};
</script>
  
<style>
/* You can add custom styles here */
</style>
  