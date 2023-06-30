const DataTable = () => import('../../templates/DataTable.vue')
const DataForm = () => import('../../templates/DataForm.vue')

const TABLE_ATTRIBUTES = [
  { label: 'ID', id: 'id' },
  { label: 'Departamento', id: 'name' },
  { label: 'Creado Por', id: 'createdBy', hidden: true },
  { label: 'Creado a las', id: 'createdAt', filter: 'date' },
  { label: 'Actualizado Por', id: 'updatedBy', hidden: true },
  { label: 'Actualizado a las', id: 'updatedAt', filter: 'date' },
];


const FORM_ATTRIBUTES = [
  {
    label: 'Nombre del Departamento', id: 'name', type: 'input',
    propieties: { type: 'text', required: true }
  },
]

export default [
  {
    path: "departments",
    name: "departments",
    component: DataTable,
    props: {
      title: 'Departamentos',
      resource: 'departments',
      attributes: TABLE_ATTRIBUTES,
      actions: [
        { name: 'edit', icon: 'pencil_outline', route: 'departments.edit', title: 'Editar Registro' },
      ]
    }
  },
  {
    path: "/departments/create",
    name: "departments.create",
    component: DataForm,
    props: {
      title: 'Departamentos',
      resource: 'departments',
      attributes: FORM_ATTRIBUTES,
    }
  },
  {
    path: "/departments/edit/:id",
    name: "departments.edit",
    component: DataForm,
    props: {
      title: 'Departamentos',
      resource: 'departments',
      is_new_record: false,
      attributes: FORM_ATTRIBUTES,
    }
  }
]
