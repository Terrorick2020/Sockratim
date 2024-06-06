import axios from 'axios';

export default {
    actions: {
        async axiosUserInfo(ctx, user_login) {

            const info = await axios.post( 'http://localhost:8888/public/?url=permition/info', {
                        'username': user_login
            }, {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            });

            let data;
            if (typeof info.data === 'object') {
                data = info.data;
                data['user_name'] = user_login;
            } else if (info.data!== 'None') {

                data = { 'user_name': user_login };
            } else {

                data = { 'user_name': user_login };
            }

            ctx.commit('updateUserInfo', data);
        }
    },
    mutations: {
        updateUserInfo(state, info) {
            state.user_info = info;
        }
    },
    state: {
       user_info: {}
    },
    getters: {
        userInfo(state) {
            return state.user_info;
        }
    }
}