<template>
  <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Twój profil
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="user_name" class="col-sm-4 col-form-label">Nazwa użytkownika</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="user_name" placeholder="flaku2012" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="user_email" class="col-sm-4 col-form-label">Adres e-mail</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="user_email" placeholder="admin@admin.pl" disabled>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-warning btn-sm" @click="widok_formularza()">Zmień hasło</button>

                    <!-- WIDOK FORMULARZA ZMIANY HASŁA -->
                    <div v-if="stan_widoku_formularza">
                        <form @submit.prevent="submit">
                        <hr>
                        <h4 class="text-center">Zmiana hasła</h4>
                        <div class="mb-3 row">
                            <label for="user_stare_haslo" class="col-sm-4 col-form-label">Stare hasło</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control"  id="user_stare_haslo" v-model="form.stare_haslo">
                                <div class="form-text text-danger" v-if="errors.stare_haslo">{{errors.stare_haslo[0]}}</div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="user_nowe_haslo" class="col-sm-4 col-form-label">Nowe hasło</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="user_nowe_haslo" v-model="form.nowe_haslo">
                                <div class="form-text text-danger" v-if="errors.nowe_haslo">{{errors.nowe_haslo[0]}}</div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="user_powtorz_nowe_haslo" class="col-sm-4 col-form-label">Powórz nowe hasło</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="user_powtorz_nowe_haslo" v-model="form.powtorz_nowe_haslo">
                                <div class="form-text text-danger" v-if="errors.powtorz_nowe_haslo">{{errors.powtorz_nowe_haslo[0]}}</div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success">Zapisz zmiany</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</template>

<script>
import axios from 'axios'
import { mapGetters } from 'vuex'
export default {
    name: 'profile',

    computed:{
        ...mapGetters({
            user: 'auth/user',
        }),
    },

    data(){
        return{
            stan_widoku_formularza: false,
            errors: [],
            errorStareHaslo: true,
            form: {
                stare_haslo: '',
                nowe_haslo: '',
                powtorz_nowe_haslo: ''
            }
        }
    },

    methods: {
        widok_formularza()
        {
            if(this.stan_widoku_formularza == false)
            {
                this.stan_widoku_formularza = true
            }else{
                this.stan_widoku_formularza = false
            }
        },

        async submit()
        {
            await axios.post('change_password', {
                user_id: this.user.id,
                stare_haslo: this.form.stare_haslo,
                nowe_haslo: this.form.nowe_haslo,
                powtorz_nowe_haslo: this.form.powtorz_nowe_haslo,
            })
            .then( () => {
                this.form.stare_haslo = ''
                this.form.nowe_haslo = ''
                this.form.powtorz_nowe_haslo = ''
                this.errors = []
                this.stan_widoku_formularza = false
                this.$notify({ text: "Hasło zmienione.", position: "top right", type: "success" })
            })
            .catch( (error) => {
                // handle error
                this.errors = error.response.data.errors
            })
            
        }
        
    }

}
</script>

<style>

</style>