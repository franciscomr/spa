const DataTable = () => import('../../templates/DataTable.vue')
const DataForm = () => import('../../templates/DataForm.vue')

const TABLE_ATTRIBUTES = [
  { label: 'ID', id: 'id' },
  { label: 'Organización', id: 'name' },
  { label: 'Razón Social', id: 'businessName' },
  { label: 'Direccion', id: 'address', },
  { label: 'Poblacion', id: 'city' },
  { label: 'Estado', id: 'state' },
  { label: 'C P', id: 'postalCode' },
  { label: 'Creado Por', id: 'createdBy', hidden: true },
  { label: 'Creado a las', id: 'createdAt', filter: 'date' },
  { label: 'Actualizado Por', id: 'updatedBy', hidden: true },
  { label: 'Actualizado a las', id: 'updatedAt', filter: 'date' },
];

const FORM_ATTRIBUTES = [
  {
    label: 'Nombre de la Organización', id: 'name', type: 'input',
    propieties: { type: 'text', required: true }
  },
  {
    label: 'Razón Social', id: 'businessName', type: 'input',
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

export default [
  {
    path: "organizations",
    name: "organizations",
    component: DataTable,
    props: {
      title: 'Organizaciones',
      resource: 'organizations',
      attributes: TABLE_ATTRIBUTES,
      actions: [
        { name: 'edit', icon: 'pencil_outline', route: 'organizations.edit', title: 'Editar Registro' },
      ]
    }
  },
  {
    path: "/organizations/create",
    name: "organizations.create",
    component: DataForm,
    props: {
      title: 'Organizaciones',
      resource: 'organizations',
      attributes: FORM_ATTRIBUTES
    }
  },
  {
    path: "/organizations/edit/:id",
    name: "organizations.edit",
    component: DataForm,
    props: {
      title: 'Organizaciones',
      resource: 'organizations',
      is_new_record: false,
      attributes: FORM_ATTRIBUTES
    }
  }
]
