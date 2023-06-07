
export default async function search(routeName) {
  let response = {}
  await axios.get(routeName)
    .then(res => {
      response.data = res.data.data
    }).catch(err => {
      response = err
    })
  return response
}
