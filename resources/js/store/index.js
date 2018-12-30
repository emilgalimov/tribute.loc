import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import shedule from './modules/shedule';
import nav from './modules/nav';
import auth from './modules/auth';
import subjects from './modules/subjects';
import chat from './modules/chat'
export const store = new Vuex.Store({
	modules:{
		shedule,
		nav,
		auth,
		subjects,
		chat
	},
    


});
