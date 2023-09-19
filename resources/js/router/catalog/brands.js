const DataTable = () => import('../../templates/DataTable.vue')
const DataForm = () => import('../../templates/DataForm.vue')

const TABLE_ATTRIBUTES = [
  { label: 'ID', id: 'id' },
  { label: 'Marca', id: 'name' },
  { label: 'Creado Por', id: 'createdBy', hidden: true },
  { label: 'Creado a las', id: 'createdAt', filter: 'date' },
  { label: 'Actualizado Por', id: 'updatedBy', hidden: true },
  { label: 'Actualizado a las', id: 'updatedAt', filter: 'date' },
];


const FORM_ATTRIBUTES = [
  {
    label: 'Nombre de la Marca', id: 'name', type: 'input',
    propieties: { type: 'text', required: true }
  },
]

export default [
  {
    path: "brands",
    name: "brands",
    component: DataTable,
    props: {
      title: 'Marcas',
      resource: 'brands',
      attributes: TABLE_ATTRIBUTES,
      actions: [
        { name: 'edit', icon: 'pencil_outline', route: 'brands.edit', title: 'Editar Registro' },
      ]
    }
  },
  {
    path: "/brands/create",
    name: "brands.create",
    component: DataForm,
    props: {
      title: 'Marcas',
      resource: 'brands',
      attributes: FORM_ATTRIBUTES,
    }
  },
  {
    path: "/brands/edit/:id",
    name: "brands.edit",
    component: DataForm,
    props: {
      title: 'Marcas',
      resource: 'brands',
      is_new_record: false,
      attributes: FORM_ATTRIBUTES,
    }
  }
]
