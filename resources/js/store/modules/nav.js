export default {
	namespaced: true,
	state:{
		items :[
			{
				name:'home',
				text:'Главная'
			},
			{
				name:'shedule',
				text:'Расписание'
			},
			{
				name:'subjects',
				text:'Предметы'
			},
		]
	},
	getters:{
		items(state){
			return state.items;
		}
	},
};