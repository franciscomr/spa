const DataTable = () => import('../../templates/DataTable.vue')
const DataForm = () => import('../../templates/DataForm.vue')

const TABLE_ATTRIBUTES = [
  { label: 'ID', id: 'id' },
  { label: 'Sucursal', id: 'name' },
  { label: 'Direccion', id: 'address', },
  { label: 'Poblacion', id: 'city' },
  { label: 'Estado', id: 'state' },
  { label: 'C P', id: 'postalCode' },
  { label: 'Creado Por', id: 'createdBy', hidden: true },
  { label: 'Creado a las', id: 'createdAt', filter: 'date' },
  { label: 'Actualizado Por', id: 'updatedBy', hidden: true },
  { label: 'Actualizado a las', id: 'updatedAt', filter: 'date' },
];

const TABLE_RELATIONSHIPS = [
  { label: 'Organizacion', id: 'organization_id', resource: 'organizations' },
]

const FORM_ATTRIBUTES = [
  {
    label: 'Nombre de la sucursal', id: 'name', type: 'input',
    propieties: { type: 'text', required: true }
  },
  {
    label: 'Dirección', id: 'address', type: 'input',
    propieties: { type: 'text', required: true }
  },
  {
    label: 'Ciudad / Población', id: 'city', type: 'input',
    propieties: { type: 'text', required: true }
  },
  {
    label: 'Estado', id: 'state', type: 'input', propieties: { type: 'text', required: true }
  },
  {
    label: 'Codigo Postal', id: 'postalCode', type: 'input',
    propieties: { type: 'text', required: true }
  }
]

const FORM_RELATIONSHIPS = [
  {
    label: 'Nombre de la Organización', id: 'organization_id', type: 'select', resource: 'organizations',
    propieties: { required: true, }
  }
]

export default [
  {
    path: "branches",
    name: "branches",
    component: DataTable,
    props: {
      title: 'Sucursales',
      resource: 'branches',
      attributes: TABLE_ATTRIBUTES,
      relationships: TABLE_RELATIONSHIPS,
      actions: [
        { name: 'edit', icon: 'pencil_outline', route: 'branches.edit', title: 'Editar Registro' },
      ]
    }
  },
  {
    path: "/branches/create",
    name: "branches.create",
    component: DataForm,
    props: {
      title: 'Sucursales',
      resource: 'branches',
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  },
  {
    path: "/branches/edit/:id",
    name: "branches.edit",
    component: DataForm,
    props: {
      title: 'Sucursales',
      resource: 'branches',
      is_new_record: false,
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  }
]
