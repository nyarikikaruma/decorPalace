<template>
    <div class="flex justify-center">
        <div class="flex flex-col md:flex-row">
            <form @submit="formSubmit" enctype="multipart/form-data">
                <div class="mb-6">
                    <label
                        for="name"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Item name</label
                    >

                    <input
                        v-model="itemName"
                        type="text"
                        id="name"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Item name"
                        required
                    />
                </div>

                <div class="mb-6">
                    <label
                        for="price"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Item price</label
                    >

                    <input
                        v-model="itemPrice"
                        type="number"
                        id="price"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required
                        placeholder="Kshs 1000"
                    />
                </div>

                <div class="mb-6">
                    <label
                        for="image"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Item image</label
                    >

                    <input
                        v-on:change="onImageChange"
                        type="file"
                        id="image"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required
                    />
                </div>

                <button
                    type="submit"
                    class="text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                >
                    Add new item
                </button>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            itemName: "",
            itemPrice: "",
            image: "",
        };
    },
    methods: {
        onImageChange(e) {
            this.image = e.target.files[0];
        },
        formSubmit(e) {
            e.preventDefault();
            let currentObj = this;

            const config = {
                headers: {
                    "content-type": "multipart/form-data",
                    Accept: "application/json",
                },
            };

            let formData = new FormData();
            formData.append("image", this.image);
            formData.append("name", this.itemName);
            formData.append("price", this.itemPrice);
            axios
                .post("http://127.0.0.1:8000/api/item/create", formData, config)
                .then(
                    (response) => {
                        console.log(response);
                    },

                    (this.itemName = ""),
                    (this.itemPrice = ""),
                    (this.image = "")
                )
                .catch(function (error) {
                    currentObj.output = error;
                });
        },
    },
};
</script>
<style></style>
