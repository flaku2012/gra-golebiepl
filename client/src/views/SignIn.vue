<template>

<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <div class="card">
            <form @submit.prevent="submit">
            <div class="card-header">Logowanie</div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="i_email">Adres e-mail:</span>
                        <input type="text" class="form-control" v-model="form.email" aria-label="Sizing example input" aria-describedby="i_email">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="i_password">Hasło:</span>
                        <input type="password" class="form-control" v-model="form.password" aria-label="Sizing example input" aria-describedby="i_password">
                    </div>
                </div>

                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Zaloguj się
                    </button>
                    <router-link to="resetpassword" class="btn btn-link">Przypomnij hasło</router-link>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="col-3"></div>
</div>

</template>

<script>
import { mapActions } from 'vuex'

export default {
  name: 'signin',
  components: {
    //
  },

  data(){
      return {
          form:{
              email: '',
              password: '',
          }
      }
  },

  methods:{
      ...mapActions({
          signIn: 'auth/signIn'
      }),
      submit(){
          this.signIn(this.form).then(() => {
              this.$router.replace('dashboard')
          })
      }
  }

}
</script>
