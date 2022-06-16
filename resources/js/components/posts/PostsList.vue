<template>
    <div>
        <!-- loader -->
        <Loader v-if="isLoading" />

        <div v-if="posts.length">

            <!--
                <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
            -->

            <!-- Inseriamo il componente della pagination -->
            <Pagination :pagination="pagination"/>

            <div class="card text-center" v-for="post in posts" :key="post.id">
                <div class="card-header">
                    {{ post.title }} - Category: {{ post.category.label }}

                </div>
                <div class="card-body">
                    <p class="card-title">
                        <span v-for=" tag in post.tags " :key="tag.id" class="badge"
                            :style="`background-color: ${tag.color}`">{{ tag.label }}</span>
                    </p>
                    <p class="card-text">{{ post.content }}</p>
                    <router-link :to="{ name: 'post-detail', params: { id: post.id } }" class="btn btn-primary">View</router-link>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
        <p v-else>Non ci sono post</p>
    </div>
</template>

<script>
    import axios from 'axios';
    import Loader from '../Loader.vue';
    import Pagination from '../Pagination.vue';
    export default {
        name: "PostsList",
        components: {
            Loader,
            Pagination
        },
        data() {
            return {
                posts: [],
                pagination: {},
                isLoading: true
            }
        },
        methods: {
            getPosts() {
                axios.get("http://127.0.0.1:8000/api/posts")
                    .then((res) => {
                        console.log(res.data.posts.data);

                        const {
                            data,
                            current_page,
                            last_page
                        } = res.data.posts;

                        console.log(data);
                        console.log(current_page);
                        console.log(last_page);


                        this.posts = data;

                        this.pagination = {
                            lastPage: last_page,
                            currentPage: current_page
                        }

                    }).then(() => {
                        console.log('terminato il caricamento dei posts')
                        this.isLoading = false;
                    })
            }
        },
        mounted() {
            this.getPosts();
        }
    }

</script>

<style scoped>

</style>
