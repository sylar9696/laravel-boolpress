<template>
<div>
    <Header/>
    <main>
        <div class="container">
            <PostsList/>
        </div>
        <!-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <Header/>

                    <div class="card-body">
                        Sito in costruzione
                    </div>
                </div>
            </div>
        </div> -->
    </main>
</div>

</template>

<script>
import Header from './Header.vue';
import PostsList from './posts/PostsList.vue';

export default{
    name: "App",
    components: {
        Header,
        PostsList
    }
}

</script>
