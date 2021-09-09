import * as actions from '../../action-types'
import * as mutations from '../../mutation-types'
import axios from 'axios'

export default {
    [actions.ADD_PRODUCT]({commit}, payload){
        axios.post('/product', payload)
            .then(res=>{
                if(res.data.success == true){
                    window.location.href= '/product'
                }
            })
            .catch(err=>{
                //console.log(err.response.data.errors)
                commit(mutations.SET_ERRORS, err.response.data.errors)
            })
    }
}
