<template>
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8" v-if="!completed">
                <div class="col-md text-center">
                    <h2>You have {{ user.user.public_repos }} public repositories.</h2>
                    <p>Repos have been sorted for those likely to want to be deleted.</p>
                </div>

                <div class="repos">
                    <vue-custom-scrollbar class="scroll-area" :settings="settings">
                        <beat-loader :loading="loading" :color="color" :size="size" class="text-center"></beat-loader>
                        <p class="text-center" v-show="loadError">An error occurred. Repositories not loaded!</p>
                        <label v-for="repo in repos" :key="repo.full_name" class="repo-item row">
                            <div class="col-md-1">
                                <input type="checkbox" v-model="selectedRepos" :id="repo.id" :value="repo.full_name">
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
                    <div class="col-md text-center">
                        <p>
                            <span class="selectedLabel">{{ selectedRepos.length }}</span> repo(s) selected for cleaning.
                        </p>
                        <p>
                            <span class="selectedRepos" v-for="selected in selectedRepos" :key="selected.id">{{ selected }}</span>
                        </p>
                    </div>
                </div>
                <div class="text-center">
                    <button class="deleteRepos"
                            v-confirm="{loader: true,
                                        ok: okCallback,
                                        cancel: cancelCallback,
                                        message: message}"
                            :disabled="!selectedRepos.length">
                            Delete Repos
                    </button> <br />
                    <label for="starCleanRepo">
                        <input type="checkbox" v-model="starCleanRepo" />
                        <small>Star the CleanRepo repository on GitHub</small>
                    </label>
                </div>
            </div>
            <div class="col-md-8" v-else>
                <div class="col-md text-center margined">
                    <h2>Cleaning complete!</h2>
                    <p v-if="deleteError"><small> An error may have occurred while deleting one or more repos.</small></p>
                    <div class="col-md text-center">
                        <p>You can go back to delete more repositories or share on social media :) </p>
                        <vue-goodshare-facebook
                            page_url="https://clean-repos.herokuapp.com"
                            title_social="Facebook"
                            has_counter
                            has_icon
                        ></vue-goodshare-facebook>
                        <vue-goodshare-twitter
                            page_url="https://clean-repos.herokuapp.com"
                            page_title="Check out CleanRepos - a simple tool to help clear out multiple old, broken, uncompleted or abandoned repositories from your GitHub account."
                            title_social="Send a tweet"
                            has_icon
                        ></vue-goodshare-twitter>
                        <vue-goodshare-email
                            page_url="https://clean-repos.herokuapp.com"
                            title_social="Share via e-mail"
                            has_icon
                        ></vue-goodshare-email>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    // import installed component for scrollbar
    import vueCustomScrollbar from 'vue-custom-scrollbar'
    import BeatLoader from 'vue-spinner/src/BeatLoader.vue'
    import VueGoodshareFacebook from "vue-goodshare/src/providers/Facebook.vue";
    import VueGoodshareTwitter from "vue-goodshare/src/providers/Twitter.vue";
    import VueGoodshareEmail from "vue-goodshare/src/providers/Email.vue";



    export default {
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        components: {
            vueCustomScrollbar,
            BeatLoader,
            VueGoodshareFacebook,
            VueGoodshareTwitter,
            VueGoodshareEmail
        },
        data() {
            return {
                settings: {
                    maxScrollbarLength: 60,
                    suppressScrollX: true
                },
                repos: {},
                loading: true,
                color: "#3AB982",
                size: "1em",
                loadError: false,
                starCleanRepo: true,
                selectedRepos: [],
                message: {
                    title: 'Delete repositories?',
                    body: "Deleting a repository will permanently remove it from your profile. Click delete 3 times to confirm."
                },
                completed: false,
                deleteError: false

            }
        },
        methods: {
            fetchRepos() {
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
                        self.repos = response.data;
                    })
                    .catch(function (error) {
                        // handle error
                        self.loadError = true
                    })
                    .finally(function () {
                        // always executed
                        self.loading = false
                    });
            },
            starRepo() {
                if(this.starCleanRepo) {
                    axios({
                        method: 'put',
                        url: 'https://api.github.com/user/starred/acekyd/clean-repos',
                        data: {},
                        headers: {
                            Authorization: 'token ' + this.user.token
                        }
                    })
                }
            },
            deleteRepos(){
                var promises = [];
                var self = this;
                const axiosInstance = axios.create({
                    baseURL: 'https://api.github.com/',
                    headers: { 'Authorization': 'token ' + this.user.token}
                });
                for(let i=0; i < this.selectedRepos.length; i++)
                {
                    promises.push(axiosInstance.delete('/repos/'+ this.selectedRepos[i]));
                }
                Promise.all(promises).then(function(results) {
                    return results;
                })
                .catch(function (error){
                    self.deleteError = true;
                })
                .finally(function () {
                     self.starRepo();
                    //enable flag to show success page
                    self.completed = true;
                })


            },
            async okCallback(dialog) {
                await this.deleteRepos();
                dialog.close();
            },
            cancelCallback() {
                console.log("cancel clicked");
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.fetchRepos();
        }
    }
</script>
<style >
.scroll-area {
  position: relative;
  margin: 1em auto;
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
