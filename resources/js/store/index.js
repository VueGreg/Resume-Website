import { createStore } from "vuex";

const store = createStore({
    state: {
        profilData: null
    },
    getters: {
        getProfilData(state){
            return state.profilData
        }
    },
    mutations: {
        defineProfilDataToNull(state){
            state.profilData = null
        }
    },
    actions: {
        defineProfilDataToNull(context){
            context.commit('defineProfilDataToNull');
        }
    }
})

export default store;