<template>
    <div id="publicmain">
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Public main mounted.')
        }
    }
</script>
