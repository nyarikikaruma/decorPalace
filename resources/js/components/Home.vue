<template>
  <div class="flex flex-col h-screen justify-between">
    <main class="container mx-auto px-4 py-8">
      <div class="flex flex-col md:flex-row items-center justify-center">
        <div class="w-full md:w-1/2">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Welcome to our decoration shop!</h2>
          <p class="text-gray-700 leading-relaxed mb-8">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis gravida dui eu nisl ullamcorper, non vestibulum
            est bibendum. Donec hendrerit blandit mollis. Sed id imperdiet lorem. Aenean malesuada diam ac arcu bibendum,
            vel blandit nibh lobortis. Nulla facilisi. Nullam lobortis, mauris a semper consequat, neque massa venenatis
            felis, non tristique lacus sapien in mauris. Mauris eu feugiat justo.
          </p>
          <router-link class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded" to="/shop">Shop now</router-link>
        </div>
        <div class="w-full md:w-1/2">
          <img src="/img/decor1.jpg" alt="Decorating items" class="w-full h-auto">
        </div>
      </div>
    </main>
    <div class="h-72 container mx-auto px-4 py-8 ">
      <p class="text-gray-700 leading-relaxed mb-8">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis gravida dui eu nisl ullamcorper, non vestibulum est
        bibendum. Donec hendrerit blandit mollis. Sed id imperdiet lorem. Aenean malesuada diam ac arcu bibendum, vel
        blandit nibh lobortis. Nulla facilisi. Nullam lobortis, mauris a semper consequat, neque massa venenatis felis,
        non tristique lacus sapien in mauris. Mauris eu feugiat justo.
      </p>
    </div>
    <footer class=" bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4">
          <p class="text-center">
            &copy; 2023 Decoration Shop. All rights reserved.
          </p>
        </div>
      </footer>
  </div>
</template>

<script>
export default {
  name: 'Home'

}
</script>
