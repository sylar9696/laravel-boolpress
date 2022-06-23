<template>
    <div :class="`alert alert-${type}`" role="alert">
        <!-- {{ message }} -->
        <slot>

        </slot>
    </div>
</template>

<script>
export default {
    name: 'Alert',
    // props: [ 'message', 'type']
    props: [ 'type' ]
}
</script>
