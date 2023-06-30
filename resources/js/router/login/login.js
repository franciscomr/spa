//import DataForm from '../../templates/DataForm.vue'
const DataForm = () => import('../../templates/DataForm.vue')
export default [
  {
    path: '/login',
    name: 'login',
    component: DataForm,
    props: {
      title: 'Login',
      attributes: [
        {
          id: 'username',
          label: 'Usuario',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        },
        {
          id: 'password',
          label: 'Password',
          type: 'input',
          propieties: {
            type: 'password',
            required: true
          }
        },
      ]
    }
  }
]