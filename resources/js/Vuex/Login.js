/*
|-------------------------------------------------------------------------------
| VUEX modules/filter.js
|-------------------------------------------------------------------------------
| The Vuex data store for the filter state
*/

export const login = {
    /*
      Defines the state used by the module
    */
    state: {
        hasLogin: false,
    },
    actions: {

    },
    mutations: {
        SET_HAS_LOGIN(state, value) {
            state.hasLogin = value;
        },
    },
    getters: {
    }
};