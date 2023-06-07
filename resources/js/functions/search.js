
export default async function search(routeName, sortBy, filterBy, perPage) {
  let response = {}
  await axios.get(routeName,
    {
      params:
      {
        'sort': sortBy,
        'filter': filterBy,
        'perPage': perPage
      }
    })
    .then(res => {
      response.data = res.data.data
      response.pagination = res.data.meta
    }).catch(err => {
      response = err
    })
  return response
}
