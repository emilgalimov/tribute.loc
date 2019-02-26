<template>
    <div class="card ">
  <div class="card-body">
    <h5 class="card-title">{{subject.lesson}}</h5>
    <p class="card-text">{{subject.pass_type}}</p>
    <div>
    <button @click="$router.push({name:'chat',params:{id:teacher.id}})" v-for="(teacher, sub) in subject.teachers" :key="sub" type="button" class="btn btn-primary mr-2 mt-1" v-if="teacher!=null">
     
      <span v-if="sub=='lecturer'">лекции</span>
      <span v-if="sub=='practicer'">практика</span>
      <span v-if="sub=='lab'">лабораторные</span> <span class="badge badge-light">{{teacher.firstname}} {{teacher.lastname}}</span>
    </button>
    </div>
  </div>
</div>
</template>
</<script>
export default {
    props:['subject'],
}
</script>

