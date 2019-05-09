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
                                <h4>{{ repo.full_name }}</h4>
                                <p v-line-clamp:20="2">{{ repo.description }}</p>
                            </div>
                            <div class="col-md-5 additional-details">
                                <a :href="repo.html_url" target="_blank">{{ repo.html_url }}</a>
                                <p>Last updated: {{repo.pushed_at | moment("from") }}</p>
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
                repos: {},
                loading: true,
                errored: false
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
                url: 'https://api.github.com/user/repos?sort=pushed&direction=asc&per_page=100',
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
                    console.log(error)
                    self.errored = true
                })
                .finally(function () {
                    // always executed
                    //turn off loader here and display error or repos.
                    self.loading = false
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
