export default async function submitForm(isNewRecord, url, data, id) {
  let response = {}
  if (isNewRecord) {
    await axios.get('/sanctum/csrf-cookie')
      .then(
        await axios.post(url, data)
          .then(res => {
            response.resource = res.data[0]
          })
      )
      .catch(err => {
        console.log('from submit.js')
      })
  } else {
    response.resource = {}
    console.log('recurso actualizado')
  }

  return response
}