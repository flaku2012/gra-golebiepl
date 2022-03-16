import { createStore } from 'vuex'
import auth from './auth'

export default createStore({
  state: {  
    // zmienna globalna ze ścieżką dostępu do images
    // dokonać zmiany przy przesłaniu na serwer produkcyjny
    // wg. az.pl - http://www.gra-golebie.pl/api/public/storage/images/
    //main_img_url: 'http://127.0.0.1:8000/api/../storage/images/',
    main_img_url: 'http://127.0.0.1:8000/api/../storage/images/',
  },
  mutations: {
    //
  },
  actions: {
    //
  },
  modules: {
    auth
  }
})
