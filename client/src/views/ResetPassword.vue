<template>

<div class="row">
    <div class="col-3"></div>
    <div class="col-6">

        <div class="alert alert-primary">
            <form v-on:submit.prevent="sendToken">
                <div class="form-group">
                    <div class="mb-3">
                    <label class="form-label">Adres e-mail</label>
                    <input type="text" class="form-control" v-model="email" :class="{ 'is-invalid' : errorEmail, 'is-valid' : infoEmail }" placeholder="Email">
                    <div class="invalid-feedback"> {{errorEmail}} </div>
                    <div class="valid-feedback"> {{infoEmail}} </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"> Wyślij kod autoryzacji na e-mail. </button>
            </form>
        </div>

        <div class="alert alert-secondary">
            <form v-on:submit.prevent="validateToken">
                <div class="form-group">
                    <div class="mb-3">
                    <label class="form-label">Kod autoryzacyjny</label>
                    <input type="text" class="form-control" v-model="token" :class="{ 'is-invalid' : errorToken, 'is-valid' : infoToken }" placeholder="Kod autoryzacyjny...">
                    <div class="invalid-feedback"> {{errorToken}} </div>
                    <div class="valid-feedback"> {{infoToken}} </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Zweryfikuj kod autoryzacji</button>
            </form>
        </div>

        <div class="alert alert-success" v-if="tokenValid">
            <form v-on:submit.prevent="changePassword">
                <div class="form-group">
                    <div class="mb-3">
                    <label class="form-label">Nowe hasło</label>
                    <input type="password" class="form-control" v-model="newPassword" :class="{'is-invalid' : errorNewPassword}" placeholder="Nowe hasło...">
                    <div class="invalid-feedback"> {{errorNewPassword}} </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3">
                    <label class="form-label">Powtórz nowe hasło</label>
                    <input type="password" class="form-control" v-model="passwordAgain" :class="{'is-invalid' : errorPasswordAgain}" placeholder="Powtórz nowe hasło...">
                    <div class="invalid-feedback"> {{errorPasswordAgain}} </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Zmień hasło</button>
            </form>
        </div>

    </div>
    <div class="col-3"></div>
</div>

</template>

<script>
//import { mapActions } from 'vuex'
//import store from '@/store'
import axios from 'axios'

export default {
  name: 'resetpassword',
  components: {
    //
  },

  data(){
      return {
          email: '',
          errorEmail: null,
          infoEmail: null,
          token: '',
          errorToken: '',
          infoToken: '',
          newPassword: '',
          errorNewPassword: '',
          passwordAgain: '',
          errorPasswordAgain: '',
          tokenValid: '',
          user: null
      }
  },

  methods:{
      sendToken(){
          this.errorEmail = null;

          if(!this.email)
          {
              this.errorEmail = "Email jest wyamgany !";
          }

          if(!this.errorEmail)
          {
              const data = {
                  email: this.email
              }
              axios.post('send_token_email' , data).then( () => {
                  this.infoEmail = 'Email sent';
              }).catch( (error) => {
                  this.errorEmail = error.response.data.error
              })

          }

      },
      validateToken(){
          this.errorToken = null

          if(!this.token)
          {
              this.errorToken = 'Token is required';
          }

          if(!this.errorToken)
          {
              const data = {
                  token : this.token
              }
              axios.post('validate_token' , data).then( response => {
                  if(response.data.id)
                  {
                      this.tokenValid = true;
                      this.infoToken = 'Token is valid';
                      this.user = response.data;
                  }
              }).catch( (error) => {
                  this.errorToken = error.response.data.error
              })
          }

      },
      changePassword(){
          this.errorNewPassword = null;
          this.errorPasswordAgain = null;

          if(!this.newPassword)
          {
              this.errorNewPassword = 'Pole nowe hasło jest wymagane !';
          }

          if(!this.passwordAgain)
          {
              this.errorPasswordAgain = 'Pole powtórz nowe hasło jest wymagane !'
          }

          if(this.newPassword !== this.passwordAgain)
          {
              this.errorPasswordAgain = 'Hasła nie pasują do siebie !';
          }

          if(!this.errorNewPassword && !this.errorPasswordAgain)
          {
              const data = {
                  password: this.newPassword,
                  user_id: this.user.id
              }
              axios.post('reset_password' , data).then( () => {
                  this.$router.push('/signin')
              })
          }

      }
  }

}
</script>
