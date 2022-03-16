<template>
<div class="container">
    <div class="row">
        <div class="col-3">
            <h4 class="text-center">Praca</h4>
            <div class="list-group text-center">
                <li class="list-group-item list-group-item-info text-center">
                    <i class="bi bi-arrow-90deg-down"></i>Akcje do wyboru
                </li>
                <router-link to="/miasto" class="list-group-item list-group-item-secondary list-group-item-action text-center" active-class="active" >
                    Miasto
                </router-link>
            </div>
        </div>

        <!-- ŚRODEK -->
        <div class="col-9">
            <h3 class="text-center">Praca</h3>
            <hr>

                <!-- <form class="text-center" @submit.prevent="submit_form">   
                    <div class="form-group">
                            <label for="czas_pracy">Wybierz ile chcesz pracować:</label>
                            <select class="form-select" id="czas_pracy" v-model="form.czas_pracy" :disabled="status_pracy.in_work == 1">
                                <option disabled value="">Czas pracy</option>
                                <option value="1" :selected="true">1h - 20 zł</option>
                                <option value="8">8h - 160 zł</option>
                                <option value="12">12 h - 240 zł</option>
                            </select>
                            <small id="emailHelp" class="form-text text-muted">Za zakończoną pracę otrzymasz wynagrodzenie.</small>
                    </div>
                    <p><button type="submit" class="btn btn-primary" :disabled="status_pracy.in_work == 1 || form.czas_pracy==''">Pracuj</button><br></p>
                </form> -->
                
                <div class="alert alert-success" role="alert" v-if="workStatus.in_work == 1">
                    Jesteś w pracy.
                </div>

                <form class="text-center"  @submit.prevent="submitForm" v-if="workStatus.in_work == null">   
                    <div class="form-group">
                            <label for="czas_pracy">Wybierz ile chcesz pracować:</label>
                            <select class="form-select" id="czas_pracy" v-model="formValue.work_time" :disabled="workStatus.in_work == 1">
                                <option disabled value="">Czas pracy</option>
                                <option value="1" :selected="true">1h - 20 zł</option>
                                <option value="8">8h - 160 zł</option>
                                <option value="12">12 h - 240 zł</option>
                            </select>
                            <small id="emailHelp" class="form-text text-muted">Za zakończoną pracę otrzymasz wynagrodzenie.</small>
                    </div>
                    <p><button type="submit" class="btn btn-primary">Pracuj</button><br></p>
                </form>
                

                <div class="text-center">
                    <p><button type="submit" class="btn btn-danger" @click="manualEndWork" v-if="workStatus.in_work == 1">Zakończ pracę bez wynagrodzenia</button></p>
                </div>

            <p>LICZNIK</p>
            <Countdown v-if="endTimeFromDatabase !=0" :timestamp="parseInt(endTimeFromDatabase)" @endTimeWork="endTimeWorkFun"> </Countdown>
            ==================================================== <br>
            Mouse position is at: {{ x }}, {{ y }} <br>
            COUNT: <br>
            -----<br>
            a: {{date}}
            ------<br>
            

            <!-- Z YOUTUBE -->
            <button @click="testFun">TeST</button>

            <div @customEvent="onSubmit">
                TEST
            </div>
            <!-- Z YOUTUBE -->

            <button @click="toLocalStorage">Dodaj do local-storage</button>

        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios'
import Countdown from "@/components/Countdown"
import { useStore } from 'vuex'
import { onMounted, reactive, ref } from 'vue'
import { useMouse } from '@/composables/mouse'
import { useCountdown } from '@/composables/countdown'
export default {
    name: 'praca',
    components: {
        Countdown,
    },
    props: {
    title: String
    },


    setup(props, {emit}){
        const store = useStore()
        //console.log(props)


        // function toLocalStorage()
        // {
        //     console.log(localStorage.setItem('user_end_time_of_work', 12123123123))
        // }


        //test composable
        const { x, y } = useMouse()
        const { date } = useCountdown(1645282320)

        // this.emitter.on('customEvent', (evt) => {
        //     this.cosik = evt.eventContent;
        // })

        
        // zweryfikować poprawność
        //const isAuthenticated = computed( () => store.getters.auth.authenticated )

        const workStatus = ref({})
        const endTimeFromDatabase = ref(0)
        const formValue = reactive({
            work_time: 0,
        })

        // pobranie danych użytkownika
        function updateDataUser()
        {
            store.dispatch('auth/getUser');
        }

        // formularz
        async function submitForm(){
            await axios.post('work/start' , {
                work_time: formValue.work_time,
            });
            statusOfWork();
        }

        // funkcja sprawdzania statusu pracy (czy w pracy czy nie)
        function statusOfWork(){
            axios.get('work/status')
                .then( (response) => {
                    workStatus.value = response.data
                    endTimeFromDatabase.value = workStatus.value.end_time_of_work
                    // czas pracy - przypisz czas do końca
                    //localStorage.setItem('user_end_time_of_work', workStatus.value.end_time_of_work)
                })
        }

        // funkcja zakończenia pracy bez wynagrodznia - manulana
        function manualEndWork(){
            axios.post('work/manual_end');
            // czas do końca = 0
            //localStorage.setItem('user_end_time_of_work', null)
            statusOfWork()
        }

        // funkcja wykonująca czynności po zakończeniu odliczania czasu
        function endTimeWorkFun(){
            axios.post('work/end_time_work');
            statusOfWork()
            updateDataUser()
        }

        // z YOUTUBE (tylko nazwa funkcji inna) !!!!!!!
        const testFun = () => 
        {
            emit('customEvent', 'Hello World')
            //console.log('emit', context.emit )
        }

        // z YOUTUBE !!!!!!!
        function onSubmit(event){
            console.log('sss', event)
        }

        onMounted( ()=> {
            statusOfWork()
            //emit.$on('customEvent', endTimeWorkFun())
            //emit('customEvent')
            //console.log('emit', emit('my-event', {'eventContent': 'String changed'}))

            //context.emit('customEvent', 'Hello World')
            //console.log( emitter )
            
        });


        return{
            x,
            y,
            date,
            workStatus, 
            endTimeFromDatabase, 
            formValue, 
            submitForm, 
            statusOfWork, 
            manualEndWork, 
            endTimeWorkFun,
            updateDataUser,
            testFun,
            onSubmit,
            //toLocalStorage
        }

    },
    //emits: ['customEvent']

    // mounted() {
    //     console.log('emmiter', this.$emitter)
    // }

}
</script>

<style>

</style>