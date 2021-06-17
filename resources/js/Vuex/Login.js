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
        userInfo: {}
    },
    actions: {},
    mutations: {
        SET_HAS_LOGIN(state, value) {
            state.hasLogin = value;
        },
        SET_USER_INFO(state, value) {
            state.userInfo = value;
        }
    },
    getters: {}
};
