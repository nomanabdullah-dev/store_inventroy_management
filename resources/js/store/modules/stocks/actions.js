import * as actions from '../../action-types'
import * as mutations from '../../mutation-types'
import axios from 'axios'

export default {
    [actions.SUBMIT_STOCK]({commit}, payload){
        axios.post('/stocks', payload)
            .then(res=>{
                if(res.data.success == true){
                    window.location.href= '/stock'
                }
            })
            .catch(err=>{
                //console.log(err.response.data.errors)
                commit(mutations.SET_ERRORS, err.response.data.errors)
            })
    }
}
