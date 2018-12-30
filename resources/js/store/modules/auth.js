import Axios from "axios";
import Vue from 'vue';

export default {
    namespaced: true,
    state: {

        token: localStorage.getItem('access_token') || null

    },
    getters: {
        loggedIn(state) {
            return state.token !== null;
        },
        token(state) {
            return state.token;
        }
    },

    mutations: {
        retreiveToken(state, token) {
            state.token = token;

        },
        destroyToken(state) {
            state.token = null;
        }

    },
    actions: {
        register(auth, creditnails) {
            return new Promise((resolve, reject) => {
                Axios.post('/api/user/register', {
                    name: creditnails.name,
                    password: creditnails.password,
                    email: creditnails.email
                }).then(response => {
                     resolve(response);
                }).catch(error => {
                    reject(error);
                })
            })
        },
        retreiveToken(auth, creditnails) {
            return new Promise((resolve, reject) => {
                Axios.post('/api/user/login', {
                    username: creditnails.username,
                    password: creditnails.password
                }).then(response => {
                    let token = response.data.access_token;
                    auth.commit('retreiveToken', token);
                    localStorage.setItem('access_token', token);

                    resolve(response);

                }).catch(error => {
                    reject(error);
                })
            })

        },

        destroyToken(auth) {

            Axios.defaults.headers.common['Authorization'] = 'Bearer ' + auth.getters.token;
            if (auth.getters.loggedIn) {
                return new Promise((resolve, reject) => {
                    Axios.post('/api/user/logout').then(response => {
                        localStorage.removeItem('access_token');
                        auth.commit('destroyToken');
                        resolve(response);

                    }).catch(error => {
                        localStorage.removeItem('access_token');
                        auth.commit('destroyToken');
                        reject(error);
                    })
                })
            }
        }
    }





}
