<template>
<div>
    <div v-if="errors !==null" class="alert alert-danger" role="alert">
      <div v-for="(error, key) in errors" :key="key"> 
        <strong>{{key}} : {{error[0]}}</strong>
      </div>
    </div>
</div>
</template>

<script>
export default {
    props:['errors'],
 data() {
    return {

    };
  },
}
</script>

<style>

</style>
