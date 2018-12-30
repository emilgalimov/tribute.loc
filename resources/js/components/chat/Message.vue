<template>
   

    <div class="col-11" v-bind:class="{ 'offset-1': message.user_id==user }">
               <h5 v-if="message.user_id!=user">{{message.user}}</h5>
                <div  class=" alert alert-secondary p-2">
                 <p class="mb-0" v-bind:class="{ 'text-right': message.user_id==user }">{{message.text}}

                 </p>
                  </div>
              </div>

</template>

<script>
export default {
  props: ['message','user'],
  name: "message",
  data() {
    return {};
  },
  computed:{

  }
};
</script>

<style>
</style>
