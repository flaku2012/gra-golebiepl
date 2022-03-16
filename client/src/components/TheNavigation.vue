<template>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <router-link to='/dashboard' class="navbar-brand">Hodowla</router-link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <router-link to='/miasto' class="nav-link">Miasto</router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">XXXX</a>
          </li>
        </ul>

        <div class="btn-group" v-if="authenticated">
          <a class="nav-link disabled">TEST: </a>
          <!-- <a class="nav-link disabled">Praca: {{workStatus.in_work == 1 ? 'Jesteś w pracy' : ''}}</a> -->
          <a class="nav-link disabled">Praca: -doIt-</a>
          <a class="nav-link disabled">Saldo: {{user.money}} zł</a>
        </div>

        <div class="btn-group">
          <div v-if="authenticated">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle position-relative" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Profil
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  3
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <router-link class="dropdown-item" to="/profile/profil">{{user.name}}</router-link>
                <router-link class="dropdown-item" to="/profile/przyjaciele">Przyjaciele</router-link>
                <router-link class="dropdown-item position-relative" to="/profile/wiadomosci">
                  Wiadomości
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    1
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </router-link>
                <router-link class="dropdown-item" to="/profile/premium">Premium</router-link>
                <router-link class="dropdown-item" to="/profile/odznaczenia">Odznaczenia</router-link>
                <router-link class="dropdown-item position-relative" to="/profile/inwentarz">
                  Inwentarz
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    1
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </router-link>
                <router-link class="dropdown-item position-relative" to="/profile/zadania">
                  Zadania
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    1
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </router-link>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#" @click="signOut">Wyloguj się</a></li>
              </ul>
            </div>
          </div>
          <div v-else>
          <router-link to='signin' class="btn btn-success">Logowanie</router-link>
          <router-link to='register' class="btn btn-success">Rejestracja</router-link>
          </div>
        </div>
      </div>
    </div>
  </nav>
    
</template>

<script>
import { computed } from 'vue'
import {  mapActions, useStore } from 'vuex'
//import axios from 'axios'
export default {
    name: "theNavigation",
    setup(){

      const store = useStore()
      const user = computed(() => store.getters['auth/user']);
      const authenticated = computed( () => store.getters['auth/authenticated'])
      //const workStatus = ref({})

      // funkcja sprawdzania statusu pracy (czy w pracy czy nie)
      // function statusOfWork(){
      //     axios.get('work/status')
      //         .then( (response) => {
      //             workStatus.value = response.data
      //     })
      // }


      //statusOfWork()


      return{
        store, 
        user, 
        authenticated,
        //workStatus,
        //statusOfWork
      }

    },

    methods: {
        ...mapActions({
            signOutAction: 'auth/signOut',
        }),
        signOut(){
            this.signOutAction().then(() => {
                this.$router.replace({
                    name: 'Home'
                })
            })
        },

    }

}
</script>

<style>
.navbar {
    box-shadow: 0 .5rem 1rem rgba(0, 0, 0, 0.200)!important;
    margin-top:0px !important;
    width:100% !important;
}
</style>

