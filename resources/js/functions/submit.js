import router from '../router';
import sendNotification from './sendNotification';
export default async function submitForm(isNewRecord, resource, data) {
  let response = {}
  let url = route('login')
  let redirectTo = 'home'
  if (isNewRecord) {
    if (resource !== 'login') {
      url = route(resource + '.store');
      redirectTo = resource
    }
    await axios.get('/sanctum/csrf-cookie')
    await axios.post(url, data)
      .then(res => {
        response = res.data[0]
        sendNotification(isNewRecord, res.data[0]['attributes']);
        router.push({ name: redirectTo })
      })

  } else {
    url = route(props.resource + '.update', vueRouter.currentRoute.value.params.id);
    redirectTo = resource
    await axios.get('/sanctum/csrf-cookie')
    axios.patch(url, data)
      .then(res => {
        response = res.data[0]
        router.push({ name: redirectTo })
      })
  }

  return response
}