
import router from '../router';
import sendNotification from './sendNotification';

export default async function sendSubmit(isNewRecord, resource, data) {
  let errors = {};
  let url = route('login')
  let redirectTo = 'home'
  if (isNewRecord || resource === 'login') {
    if (resource !== 'login') {
      url = route(resource + '.store');
      redirectTo = resource
    }
    await axios.get('/sanctum/csrf-cookie')
    await axios.post(url, data)
      .then(res => {
        if (resource !== 'login') {
          sendNotification(isNewRecord, res.data[0]['attributes']);
        }
        router.push({ name: redirectTo })
      })
      .catch(err => {
        if (err.response) {
          errors = err.response.data.errors
        }
        else if (err.request) {
          console.log(err.request)
        }
      })
    return errors
  } else {
    url = route(resource + '.update', { id: router.currentRoute.value.params.id });
    redirectTo = resource
    await axios.get('/sanctum/csrf-cookie')
    await axios.patch(url, data)
      .then(res => {
        sendNotification(isNewRecord, res.data[0]['attributes']);
        router.push({ name: redirectTo })
      })
      .catch(err => {
        if (err.response) {
          errors = err.response.data.errors
        }
        else if (err.request) {
          console.log('response')
          console.log(err.request.data.errors)
          errors = err.request.data.errors
        }

      })
    return errors
  }
}
