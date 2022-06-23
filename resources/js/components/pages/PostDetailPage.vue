<template>
    <div>
        <h1>Pagina singola del post: {{ post.title }}</h1>
        <!-- Alert -->
        <!-- <Alert
        v-if="isError"
        message="il post non esiste"
        type="danger"
        > -->

        <Alert
        v-if="isError"
        type="danger"
        >
            Si è verificato un errore
        </Alert>


        <p>{{ post.content }}</p>
        <!-- Ulteriori info del post -->


        <Alert v-if="isError" message="nuovo messaggio" type="info"/>
    </div>
</template>

<script>
import axios from 'axios';
import Alert from '../Alert.vue';

    export default {
        name: 'PostDetailPage',
        data() {
            return {
                post: [],
                isError: false,
            }
        },
        components: {
            Alert
        },
        methods: {
            getPost() {
                axios.get(`http://127.0.0.1:8000/api/posts/${ this.$route.params.slug }`)
                    .then((res) => {
                        console.log(res.data);
                        // console.log(data);
                        this.post = res.data;
                    }).catch((err) => {
                        console.log(err);
                        this.isError = true;
                    });
            }
        },
        mounted() {
            this.getPost();
            console.log('ciao');
            console.log( this.$route );
            console.log( this.$route.params );
            console.log( this.$route.params.id  );
        }
    }

</script>
