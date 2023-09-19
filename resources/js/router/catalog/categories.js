const DataTable = () => import('../../templates/DataTable.vue')
const DataForm = () => import('../../templates/DataForm.vue')

const TABLE_ATTRIBUTES = [
  { label: 'ID', id: 'id' },
  { label: 'Categoria', id: 'name' },
  { label: 'Creado Por', id: 'createdBy', hidden: true },
  { label: 'Creado a las', id: 'createdAt', filter: 'date' },
  { label: 'Actualizado Por', id: 'updatedBy', hidden: true },
  { label: 'Actualizado a las', id: 'updatedAt', filter: 'date' },
];


const FORM_ATTRIBUTES = [
  {
    label: 'Nombre de la Categoria', id: 'name', type: 'input',
    propieties: { type: 'text', required: true }
  },
]

export default [
  {
    path: "categories",
    name: "categories",
    component: DataTable,
    props: {
      title: 'Categorias',
      resource: 'categories',
      attributes: TABLE_ATTRIBUTES,
      actions: [
        { name: 'edit', icon: 'pencil_outline', route: 'categories.edit', title: 'Editar Registro' },
      ]
    }
  },
  {
    path: "/categories/create",
    name: "categories.create",
    component: DataForm,
    props: {
      title: 'Categorias',
      resource: 'categories',
      attributes: FORM_ATTRIBUTES,
    }
  },
  {
    path: "/categories/edit/:id",
    name: "categories.edit",
    component: DataForm,
    props: {
      title: 'Categorias',
      resource: 'categories',
      is_new_record: false,
      attributes: FORM_ATTRIBUTES,
    }
  }
]
