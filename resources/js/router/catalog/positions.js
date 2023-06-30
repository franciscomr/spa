const DataTable = () => import('../../templates/DataTable.vue')
const DataForm = () => import('../../templates/DataForm.vue')

const TABLE_ATTRIBUTES = [
  { label: 'ID', id: 'id' },
  { label: 'Puesto', id: 'name' },
  { label: 'Creado Por', id: 'createdBy', hidden: true },
  { label: 'Creado a las', id: 'createdAt', filter: 'date' },
  { label: 'Actualizado Por', id: 'updatedBy', hidden: true },
  { label: 'Actualizado a las', id: 'updatedAt', filter: 'date' },
];

const TABLE_RELATIONSHIPS = [
  { label: 'Departmento', id: 'department_id', resource: 'departments' },
]

const FORM_ATTRIBUTES = [
  {
    label: 'Nombre del Puesto', id: 'name', type: 'input',
    propieties: { type: 'text', required: true }
  },
]

const FORM_RELATIONSHIPS = [
  {
    label: 'Nombre del Departamento', id: 'department_id', type: 'select', resource: 'departments',
    propieties: { required: true, }
  }
]

export default [
  {
    path: "positions",
    name: "positions",
    component: DataTable,
    props: {
      title: 'Puestos',
      resource: 'positions',
      attributes: TABLE_ATTRIBUTES,
      relationships: TABLE_RELATIONSHIPS,
      actions: [
        { name: 'edit', icon: 'pencil_outline', route: 'positions.edit', title: 'Editar Registro' },
      ]
    }
  },
  {
    path: "/positions/create",
    name: "positions.create",
    component: DataForm,
    props: {
      title: 'Puestos',
      resource: 'positions',
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  },
  {
    path: "/positions/edit/:id",
    name: "positions.edit",
    component: DataForm,
    props: {
      title: 'Puestos',
      resource: 'positions',
      is_new_record: false,
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  }
]
