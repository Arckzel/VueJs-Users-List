import axios from 'axios'

const api = axios.create({
    baseURL: '/api'
})

export default {
    all(){
        return api.get('/users')
    },
    show($id){
        return api.get('users/'+$id)
    },
    update($request, $id){
        return api.put('users/'+$id,$request)
    },
    store($request){
        return api.post('/users',$request)
    },
    destroy($id){
        return api.delete('/users/'+$id)
    }

}
