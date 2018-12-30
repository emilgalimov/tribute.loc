<template>
    <div>
            <h3 class="card-title">{{lesson.lesson}}</h3>
            <p v-if="lesson.teacher_name!=null" class="card-text">Урок с: {{lesson.teacher_name}}</p>
            <p class="card-text">Время: {{lesson.time}}  <strong> {{lesson.days}} </strong></p>
            <p v-if="lesson.building!=null" class="card-text">Кабинет: <strong>{{lesson.room}}</strong> в <strong>{{lesson.building}}</strong> здании</p>

    </div>
</template>
<script>


export default {
       props:['lesson'],
    data(){
        return{
        
        }
    },
}
</script>

