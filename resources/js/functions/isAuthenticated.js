import router from '../router'
import store from '../store';
const isAuthenticated = async () => {
  await axios.get(route('get.user'))
    .then(res => {
      //console.log(res.data)
      console.log('authencicate')
      store.dispatch('storeUser', res.data)
    })
    .catch(err => {
      console.log(err.response.data)
      if (err.response.status === 401) {
        router.push({ name: 'login' })
      }
    })
}
export default isAuthenticated