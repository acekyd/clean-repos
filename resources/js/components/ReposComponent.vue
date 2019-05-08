<template>
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md text-center">
                    <h2>You have {{ user.user.public_repos }} public repositories.</h2>
                    <p>Repos have been sorted for those likely to want to be deleted.</p>
                </div>

                <div class="repos">
                    <vue-custom-scrollbar class="scroll-area" :settings="settings">
                        <img src="http://utatti.github.io/perfect-scrollbar/azusa.jpg" height="720" width="1280" alt="">
                    </vue-custom-scrollbar>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import installed component for scrollbar
    import vueCustomScrollbar from 'vue-custom-scrollbar'

    export default {
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        components: {
            vueCustomScrollbar
        },
        data() {
            return {
                settings: {
                    maxScrollbarLength: 60,
                    suppressScrollX: true
                }
            }
        },
        methods: {
        },
        mounted() {
            console.log('Component mounted.')
            console.log(this.user);
        }
    }
</script>
<style >
.scroll-area {
  position: relative;
  margin: auto;
  height: 500px;
}
.ps__thumb-y, .ps__rail-y:hover>.ps__thumb-y {
    background-color: #09be67;
}
.ps__rail-y, .ps__rail-y:hover, .ps__rail-y.ps--clicking .ps__thumb-y, .ps .ps__rail-y:hover {
    background-color: rgba(255, 255, 255, 0.11);
}
</style>
