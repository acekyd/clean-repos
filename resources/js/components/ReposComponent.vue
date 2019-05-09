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
                        <label v-for="repo in repos" :key="repo.id" class="repo-item row">
                            <div class="col-md-1">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-md-6">
                                <h4>Vuegram</h4>
                                <span>An instagram clone with VueJs</span>
                            </div>
                            <div class="col-md-5 additional-details">
                                <a href="https://github.com/acekyd/737" class="">https://github.com/acekyd/737</a>
                                <span>Last updated: 3 years ago</span>
                            </div>
                        </label>
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
                },
                repos: {}
            }
        },
        methods: {
        },
        mounted() {
            console.log('Component mounted.')
            console.log(this.user);
            var self = this;
            axios({
                method: 'get',
                url: 'https://api.github.com/user/repos?sort=pushed&direction=asc',
                data: {},
                headers: {
                    Authorization: 'token ' + this.user.token
                }
            }).then(function (response) {
                    // handle success
                    console.log(response.data);
                    self.repos = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                    //turn off loader here and display error or repos.
                });
        }
    }
</script>
<style >
.scroll-area {
  position: relative;
  margin: auto;
  height: 600px;
  border-radius: 9px;
  border: solid 1px #ffffff;
}
.ps__thumb-y, .ps__rail-y:hover>.ps__thumb-y {
    background-color: #09be67;
}
.ps__rail-y, .ps__rail-y:hover, .ps__rail-y.ps--clicking .ps__thumb-y, .ps .ps__rail-y:hover {
    background-color: rgba(255, 255, 255, 0.11);
}
.ps__rail-y {
    margin: 10px 0;
}
</style>
