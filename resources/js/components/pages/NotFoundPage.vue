<template>
    <div>
        <h2>Non esiste questa pagina | Error: 404 </h2>
        <button class="btn btn-secondary" @click="$router.back()">Indietro</button>
    </div>
</template>

<script>
export default{
    name: 'NotFoundPage'
}
</script>
