const DataTable = () => import('../../templates/DataTable.vue')
const DataForm = () => import('../../templates/DataForm.vue')

const TABLE_ATTRIBUTES = [
  { label: 'ID', id: 'id' },
  { label: 'Nombre del Contrato', id: 'name' },
  { label: 'Numero de Factura', id: 'billNumber' },
  { label: 'Numero de Addendum', id: 'addendumNumber' },
  { label: 'Proveedor', id: 'vendor' },
  { label: 'Fecha de Factura', id: 'billDate' },
  { label: 'Inicio del contrato', id: 'startDate' },
  { label: 'Vencimiento del contrato', id: 'expirationDate' },
  { label: 'Creado Por', id: 'createdBy', hidden: true },
  { label: 'Creado a las', id: 'createdAt', filter: 'date' },
  { label: 'Actualizado Por', id: 'updatedBy', hidden: true },
  { label: 'Actualizado a las', id: 'updatedAt', filter: 'date' },
];

const TABLE_RELATIONSHIPS = [
  { label: 'Tipo de Contrato', id: 'contract_type_id', resource: 'contract_types' },
]

const FORM_ATTRIBUTES = [
  { label: 'Nombre del Contrato', id: 'name', type: 'input', propieties: { type: 'text', required: true } },
  { label: 'Numero de Factura', id: 'billNumber', type: 'input', propieties: { type: 'text', required: true } },
  { label: 'Numero de Addendum', id: 'addendumNumber', type: 'input', propieties: { type: 'text', required: true } },
  { label: 'Proveedor', id: 'vendor', type: 'input', propieties: { type: 'text', required: true } },
  { label: 'Fecha de Factura', id: 'billDate', type: 'input', propieties: { type: 'date', required: true } },
  { label: 'Inicio del contrato', id: 'startDate', type: 'input', propieties: { type: 'date', required: true } },
  { label: 'Vencimiento del contrato', id: 'expirationDate', type: 'input', propieties: { type: 'date', required: true } },
]

const FORM_RELATIONSHIPS = [
  {
    label: 'Tipo de Contrato', id: 'contract_type_id', type: 'select', resource: 'contract_types',
    propieties: { required: true, }
  }
]

export default [
  {
    path: "contracts",
    name: "contracts",
    component: DataTable,
    props: {
      title: 'Contratos',
      resource: 'contracts',
      attributes: TABLE_ATTRIBUTES,
      relationships: TABLE_RELATIONSHIPS,
      actions: [
        { name: 'edit', icon: 'pencil_outline', route: 'contracts.edit', title: 'Editar Registro' },
      ]
    }
  },
  {
    path: "/contracts/create",
    name: "contracts.create",
    component: DataForm,
    props: {
      title: 'Contratos',
      resource: 'contracts',
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  },
  {
    path: "/contracts/edit/:id",
    name: "contracts.edit",
    component: DataForm,
    props: {
      title: 'Planes',
      resource: 'contracts',
      is_new_record: false,
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  }
]
