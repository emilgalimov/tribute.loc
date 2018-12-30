import Vue from 'vue';
import Axios from "axios";

export default {
    namespaced: true,
    state:{
        'user':null,
        'teacher':null,
        'group':null,
        'messages':[],
        'chatId':null,

    },
    getters:{
        user(state){
            return state.user
        },
        chatId(state){
            return state.chatId
        },
        teacher(state){
            return state.teacher
        },
        group(state){
            return state.group
        },
        messages(state){
            return state.messages
        }
    },
    mutations:{
        chatPut(state,data){
            state.user=data.user;
            state.teacher=data.teacher;
            state.group=data.group;
            state.messages=data.messages;
        },
        chatIdPut(state,id){
            state.chatId=id;
        },
        pushMessage(state,message){
            state.messages.push(message);
        }
    },
    actions:{
        getChat(chat, payload) {
            Axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            return new Promise((resolve, reject) => {
                Axios.get('/api/chat/'+payload.id).then(response => {
                    chat.commit('chatPut', response.data.data);
                    chat.commit('chatIdPut',response.data.links.chat_id);
                    resolve(response);
                }).catch(error => {
                    reject(error);
                })
            })
        },
        sendMessage(chat, payload){
            Axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            return new Promise((resolve,reject)=>{
                Axios.patch('/api/chat/'+payload.id,{
                    text:payload.text
                }).then(response=>{
                    resolve(response);
                })
                
                .catch(error => {
                    reject(error);
                });


            })
        },
        pushMessage(chat,payload){
            chat.commit('pushMessage',payload.message);
        }
    }

}