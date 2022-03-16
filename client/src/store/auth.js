import axios from 'axios'

export default{
    namespaced: true, 
    state: {
        token: null,
        user: null,
        //test
        //userWork: null,
    },

    getters: {
        authenticated(state){
            return state.token && state.user
        },
        user(state){
            return state.user
        },
    },

    mutations: {
        SET_TOKEN(state, token){
            state.token = token
        },
        SET_USER(state, data){
            state.user = data
        },
        // SET_USER_WORK(state, data){
        //     state.userWork = data
        // },
    },

    actions: {
        async signIn({dispatch}, credentials ){
            let response = await axios.post('auth/signin', credentials);
            return dispatch('attempt', response.data.token)
        },

        async attempt( { commit , state }, token){
            if(token){
                commit('SET_TOKEN', token)
            }

            if(!state.token){
                return
            }

            try{
                let response = await axios.get('auth/me')
                commit('SET_USER', response.data)
                //commit('SET_USER_WORK', response.data.user_work)
            }catch(e){
                commit('SET_TOKEN', null)
                commit('SET_USER', null)
                //commit('SET_USER_WORK', null)
            }

        },

        signOut({ commit }){
            return axios.post('auth/signout').then(() => {
                commit('SET_TOKEN', null)
                commit('SET_USER', null)
                //commit('SET_USER_WORK', null)
            })
        },

        //NOWOŚĆ
        async getUser({commit}){
            let response = await axios.get('auth/me')
            commit('SET_USER', response.data)
        }

    }
}
