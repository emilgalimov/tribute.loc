<template>
<div>
    <h5 class="card-header">{{day.day}}</h5>
    <div class="card-body"  v-for="(lesson, index) in day.day_shedule" :key="index">
        <shedule-item :lesson="lesson"></shedule-item>
    </div>
</div>
</template>'

<script>
import SheduleItem from './SheduleItem'
export default {
    
    props:['day'],
    data(){
        return{
          
        }
    },


    components:{
        SheduleItem
    }
}
</script>
