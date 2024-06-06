import { createStore } from 'vuex';
import User_Info from './modules/User_Info.js';
import User_History from './modules/User_History.js';

const store = createStore({
    modules: { User_Info, User_History }
});

export default store;