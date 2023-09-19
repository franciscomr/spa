const DataTable = () => import('../../templates/DataTable.vue')
const DataForm = () => import('../../templates/DataForm.vue')

const TABLE_ATTRIBUTES = [
  { label: 'ID', id: 'id' },
  { label: 'Plan', id: 'name' },
  { label: 'Datos (Gb)', id: 'data' },
  { label: 'Inicio de Plan', id: 'startDate' },
  { label: 'Vencimiento de Plan', id: 'expirationDate' },
  { label: 'Creado Por', id: 'createdBy', hidden: true },
  { label: 'Creado a las', id: 'createdAt', filter: 'date' },
  { label: 'Actualizado Por', id: 'updatedBy', hidden: true },
  { label: 'Actualizado a las', id: 'updatedAt', filter: 'date' },
];

const TABLE_RELATIONSHIPS = [
  { label: 'Compañia', id: 'phone_company_id', resource: 'phone_companies' },
]

const FORM_ATTRIBUTES = [
  {
    label: 'Nombre del Plan', id: 'name', type: 'input', propieties: { type: 'text', required: true }
  },
  {
    label: 'Datos (GB)', id: 'data', type: 'input', propieties: { type: 'text', required: true }
  },
  {
    label: 'Fecha de Inicio del Plan', id: 'startDate', type: 'input', propieties: { type: 'date', required: true }
  },
  {
    label: 'Fecha de Vencimiento del Plan', id: 'expirationDate', type: 'input', propieties: { type: 'date', required: true }

  },
]

const FORM_RELATIONSHIPS = [
  {
    label: 'Compañia', id: 'phone_company_id', type: 'select', resource: 'phone_companies',
    propieties: { required: true, }
  }
]

export default [
  {
    path: "phonePlans",
    name: "phonePlans",
    component: DataTable,
    props: {
      title: 'Planes',
      resource: 'phonePlans',
      attributes: TABLE_ATTRIBUTES,
      relationships: TABLE_RELATIONSHIPS,
      actions: [
        { name: 'edit', icon: 'pencil_outline', route: 'phonePlans.edit', title: 'Editar Registro' },
      ]
    }
  },
  {
    path: "/phonePlans/create",
    name: "phonePlans.create",
    component: DataForm,
    props: {
      title: 'Planes',
      resource: 'phonePlans',
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  },
  {
    path: "/phonePlans/edit/:id",
    name: "phonePlans.edit",
    component: DataForm,
    props: {
      title: 'Planes',
      resource: 'phonePlans',
      is_new_record: false,
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  }
]
