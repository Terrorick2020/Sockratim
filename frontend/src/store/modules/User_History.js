import axios from 'axios';

export default {
    actions: {
        async axiosUserHistory(ctx, user_login) {

            const history = await axios.post( 'http://localhost:8888/public/?url=permition/history', {
                        'username': user_login
            }, {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            });


            console.log( history.result )

            // if (info.data !== 'None') {
            //     ctx.commit('updapdateUserHistoryateUserInfo', history.data);
            // }
        }
    },
    mutations: {
        apdateUserHistory(state, history) {
            state.user_history = history;
        }
    },
    state: {
        user_history: [
            {
                'id': 1,
                'long_link': 'sd sdvsdvsdv',
                'shorted_link': 'fdfbdfb' 
            }
        ]
    },
    getters: {
        userHistory(state) {
            return state.user_history;
        },
        historySize(state) {
            return state.user_history.length;
        }
    }
}