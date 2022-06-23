<template>
    <div>
        <h2>COntact page</h2>

        <Alert
            type="success"
        >
            {{ alertMessage }}
        </Alert>

        <div class="form-group">
            <label for="email">Email address</label>

            <input
                type="email"
                class="form-control"
                id="email"
                placeholder="Enter email"
                v-model="form.email"
            >

            <div class="form-group">
                <label for="message">Example textarea</label>
                <textarea
                    class="form-control"
                    id="message"
                    rows="3"
                    v-model="form.message"
                ></textarea>
            </div>

            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <button class="btn btn-primary" @click="sendForm" >Invia</button>

    </div>
</template>

<script>
import axios from 'axios';
import Alert from '../Alert.vue';

    export default {
        name: 'ContactPage',
        components: {
            Alert
        },
        data(){
            return{
                form: {
                    email: '',
                    message: ''
                },
                alertMessage: '',

            }
        },
        methods: {
            sendForm(){
                axios.post('http://127.0.0.1:8000/api/messages', this.form)
                    .then( (res) => {
                        this.form.email = '',
                        this.form.message = '',
                        this.alertMessage = 'Il messaggio è stato inviato'
                    })
            }
        },
        mounted() {
            console.log(this.$route);
        }
    }

</script>
