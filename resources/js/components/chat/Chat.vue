<template>
    <div class="container">
        <div v-if="errors===null" class="d-flex justify-content-center"><h1>{{teacher}} с группой {{group}}</h1></div>
        
        <div v-if="errors!==null">
              <alert :errors="errors"> </alert>
        </div>
        <div class="row mb-5">
            <div class="col-lg-10 offset-lg-1 pl-0 pr-0 row"> 
          
                <message v-for="(message,key) in messages" 
                      :key="key" 
                      :message="message" 
                      :user="user"></message>
                      
            </div>
        </div>
            <div class="input-group mb-5 fixed-bottom mx-auto " style="max-width:800px">
                  <input v-model="messageInput" type="text" class="form-control" placeholder="Input Message" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button @click="send" class="btn btn-outline-secondary" type="button" id="button-addon2">Отправить</button>
                  </div>
            </div>
        
       
    </div>
</template>

<script>
import EchoLibrary from "laravel-echo";
import Axios from "axios";
window.io = require("socket.io-client");

import Alert from "../Alert";
import Message from "./Message";
import { mapActions } from "vuex";
import { mapGetters } from "vuex";

export default {
  name: "chat",
  data() {
    return {
      errors: null,
      messageInput: null
    };
  },
  computed: {
    ...mapGetters("chat", {
      messages: "messages",
      group: "group",
      user: "user",
      teacher: "teacher",
      chatId: "chatId"
    })
  },
  components: {
    Alert,
    Message
  },
  created() {
    window.Echo = new EchoLibrary({
      broadcaster: "socket.io",
      host: "localhost:6001",
      auth: {
        headers: {
          Authorization: "Bearer " + this.$store.getters["auth/token"]
        }
      }
    });

    this.getChat({
      token: this.$store.getters["auth/token"],
      id: this.$route.params.id
    })
      .then(response => {
        window.Echo.private("chat-room." + this.chatId).listen(".new", e => {
          this.pushMessage({ message: e.message });
        });
      })
      .catch(error => {
        this.errors = error.response.data;
      });

    //socket
  },

  //socket

  destroyed() {
    window.Echo.leave("chat-room." + this.chatId);
  },
  //socket
  methods: {
    ...mapActions("chat", {
      getChat: "getChat",
      sendMessage: "sendMessage",
      pushMessage: "pushMessage"
    }),

    send() {
      if(this.messageInput!=null)
      {
      this.sendMessage({
        token: this.$store.getters["auth/token"],
        id: this.$route.params.id,
        text: this.messageInput
      })
        .then(response => {
          this.messageInput = null;
        })

        .catch(error => {
          this.errors = error.response.data;
        });
    }
    }
  }
};
</script>

<style>
</style>
