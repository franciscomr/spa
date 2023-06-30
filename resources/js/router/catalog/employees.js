const DataTable = () => import('../../templates/DataTable.vue')
const DataForm = () => import('../../templates/DataForm.vue')

const TABLE_ATTRIBUTES = [
  { label: 'ID', id: 'id' },
  { label: 'Nombre', id: 'name' },
  { label: 'Apellido P', id: 'firstSurname', },
  { label: 'Apellido M', id: 'secondSurname' },
  { label: 'Activo', id: 'isActive' },
  { label: 'Creado Por', id: 'createdBy', hidden: true },
  { label: 'Creado a las', id: 'createdAt', filter: 'date' },
  { label: 'Actualizado Por', id: 'updatedBy', hidden: true },
  { label: 'Actualizado a las', id: 'updatedAt', filter: 'date' },
];

const TABLE_RELATIONSHIPS = [
  { label: 'Sucursal', id: 'branch_id', resource: 'branches' },
  { label: 'Puesto', id: 'position_id', resource: 'positions' },
]

const FORM_ATTRIBUTES = [
  {
    label: 'Nombre', id: 'name', type: 'input',
    propieties: { type: 'text', required: true }
  },
  {
    label: 'Apellido Paterno', id: 'firstSurname', type: 'input',
    propieties: { type: 'text', required: true }
  },
  {
    label: 'Apellido Materno', id: 'secondSurname', type: 'input',
    propieties: { type: 'text', required: true }
  },
]

const FORM_RELATIONSHIPS = [
  {
    label: 'Nombre de la Sucursal', id: 'branch_id', type: 'select', resource: 'branches',
    propieties: { required: true, }
  },
  {
    label: 'Puesto', id: 'position_id', type: 'select', resource: 'positions',
    propieties: { required: true, }
  }
]

export default [
  {
    path: "employees",
    name: "employees",
    component: DataTable,
    props: {
      title: 'Personal',
      resource: 'employees',
      attributes: TABLE_ATTRIBUTES,
      relationships: TABLE_RELATIONSHIPS,
      actions: [
        { name: 'edit', icon: 'pencil_outline', route: 'employees.edit', title: 'Editar Registro' },
      ]
    }
  },
  {
    path: "/employees/create",
    name: "employees.create",
    component: DataForm,
    props: {
      title: 'Personal',
      resource: 'employees',
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  },
  {
    path: "/employees/edit/:id",
    name: "employees.edit",
    component: DataForm,
    props: {
      title: 'Personal',
      resource: 'employees',
      is_new_record: false,
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  }
]
