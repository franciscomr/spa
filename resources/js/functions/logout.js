import router from '../router/index'
const logout = async () => {
  await axios.post(route('logout'))
    .then((res) => {
      router.push('/login')
    }).catch((err) => {
      console.log(err)
    })
}
export default logout