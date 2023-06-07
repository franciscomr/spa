import store from '../store';
export default function sendNotification(isNewRecord, resource) {
  let message = 'Se ha creado el recurso: ';
  if (!isNewRecord) {
    message = 'Se ha Actualizado el recurso: '
  }
  let notification = {
    type: 'success',
    id: resource.id,
    name: resource.name,
    message: message
  }
  store.dispatch('showNotification', notification)
}