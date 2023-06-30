
export default async function getSingleRecord(routeName) {
  let response = {}
  await axios.get('/sanctum/csrf-cookie')
  await axios.get(routeName)
    .then(res => {
      response.data = res.data.data
    }).catch(err => {
      response = err
    })
  return response
}
