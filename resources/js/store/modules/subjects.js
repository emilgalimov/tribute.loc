import Axios from "axios";

export default{
    namespaced: true,

    state:{
        subjects:null
    },
    getters:{
        subjects(state){
            return state.subjects;
        }
    },
    mutations:{
        subjectsPut(state,subjects){
            state.subjects=subjects;
        }
    },
    actions:{
        getSubjects(subjects, token) {
            Axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            return new Promise((resolve, reject) => {
                Axios.get('/api/subject').then(response => {
                    subjects.commit('subjectsPut', response.data.data.subject);
                }).catch(error => {
                    subjects.commit('subjectsPut', null);
                    reject(error);
                })
            })
        }
    }





}