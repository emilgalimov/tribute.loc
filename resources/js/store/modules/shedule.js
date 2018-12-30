import Vue from 'vue';
import Axios from "axios";
export default {
    namespaced: true,
    state: {
        "shedule": null
    },

    getters: {
        shedule(state) {
            return state.shedule;
        },
    },
    mutations: {
        shedulePut(state, shedule) {
            state.shedule = shedule;
        }
    },
    actions: {
        getShedule(shedule, token) {
            Axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            return new Promise((resolve, reject) => {
                Axios.get('/api/shedule').then(response => {
                    shedule.commit('shedulePut', response.data.data.shedule);
                }).catch(error => {
                    shedule.commit('shedulePut', null);
                    reject(error);
                })
            })
        }


    }

}
