<template>
    <div>
        <div v-if="!items.length==0">

            <div class="flex flex-col md:flex-row">

                <div class="w-full md:w-1/4 bg-gray-100 py-8 px-4"></div>

                <div class="lg:grid grid-cols-4 gap-4 h-full overflow-auto w-full md:w-1/2 bg-white py-8 px-4">
                    <div v-for="(item, index) in items" :key="index">
                        <ItemCard @itemsLength="itemsLength" @deleteItem="deleteItems" :id="item.id" :name="item.name" :price="item.price"
                            :image="`/img/${item.image}`"></ItemCard>
                    </div>

                </div>

                <div class="w-full md:w-1/4 bg-gray-200 py-8 px-4"></div>

            </div>
        </div>

        <div class="grid h-screen place-items-center" v-else>
            <h2 class="text-xl">No Items found, check later</h2>
        </div>
    </div>
</template>
<script>
import ItemCard from "./ItemCard.vue";
export default {
    components: {
        ItemCard,
    },
    data() {
        return {
            items: []
        }
    },
    mounted() {
        axios.get('http://127.0.0.1:8000/api/item')
            .then(response => {
                this.items = response.data;
            })
            .catch(error => {
                console.log(error);
            });
    },
    methods: {
        itemsLength() {
            this.$emit('itemsLength')
        },
        deleteItems(id) {
            axios.delete('http://127.0.0.1:8000/api/item/delete/' + id)
                .then(response => {
                    console.log(response)
                    axios.get('http://127.0.0.1:8000/api/item')
                        .then(response => {
                            this.items = response.data;
                        })

                })
                .catch(error => {
                    console.log(error)
                });

        }

    }
};
</script>
<style></style>
