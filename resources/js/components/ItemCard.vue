<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg">

        <img class="w-full h-48" :src="image" alt="Product Image" />

        <div class="px-6 py-4">

            <div class="font-bold text-xl mb-2 overflow-hidden truncate ">{{ name }}</div>

            <p class="text-gray-700 text-base mb-2">Kshs {{ price }}</p>

            <button @click="addToCart(name, price)"
                class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-1 px-2 rounded">

                Add to Cart

            </button>
            <button @click="$emit('deleteItem', id)"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mt-2">

                Delete

            </button>

        </div>

    </div>
</template>
<script>
export default {
    props: {

        name: String,
        price: Number,
        image: String,
        id: Number
    },
    data() {
        return {}
    },
    methods: {
        addToCart(name, price) {
            axios.post('http://127.0.0.1:8000/api/cart/create', { name, price })
                .then(response => {
                    console.log(response)
                })
                .catch(error => {
                    console.log(error)
                })
            this.$emit('itemsLength');
        },

    }
};
</script>
<style lang="">

</style>
