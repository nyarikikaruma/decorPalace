<template >
    <div>
        <NavBar></NavBar>
        <router-view></router-view>
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

    }
}
</script>
<style >
    
</style>