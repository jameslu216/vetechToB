import Vue from 'vue';
import Vuex from 'vuex';

/**
 * Imports all of the modules used in the application to build the data store.
 */
import { login } from './Login';

/**
 * Initializes Vuex on Vue.
 */
Vue.use(Vuex);

const store = new Vuex.Store({
  modules: {
    login,
  },
  state: {},
  getters: {},
  mutations: {
    SET_TEST(state, value) {
      state.test = value;
    },
  },
});

export default store;
