<template>
    <div>
        <h1>Pagina singola del post: {{ post.title }}</h1>
        <!-- Ulteriori info del post -->
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        name: 'PostDetailPage',
        data() {
            return {
                post: [],
            }
        },
        methods: {
            getPost() {
                axios.get(`http://127.0.0.1:8000/api/posts/${ this.$route.params.id }`)
                    .then((res) => {
                        console.log(res.data);
                        // console.log(data);
                        this.post = res.data;
                    })
            }
        },
        mounted() {
            this.getPost();
            console.log( this.$route.params.id );
        }
    }

</script>
