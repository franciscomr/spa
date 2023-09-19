const DataTable = () => import('../../templates/DataTable.vue')
const DataForm = () => import('../../templates/DataForm.vue')

const TABLE_ATTRIBUTES = [
  { label: 'ID', id: 'id' },
  { label: 'Numero de Serie', id: 'serialNumber' },
  { label: 'Cargador', id: 'charger' },
  { label: 'Creado Por', id: 'createdBy', hidden: true },
  { label: 'Creado a las', id: 'createdAt', filter: 'date' },
  { label: 'Actualizado Por', id: 'updatedBy', hidden: true },
  { label: 'Actualizado a las', id: 'updatedAt', filter: 'date' },
];

const TABLE_RELATIONSHIPS = [
  { label: 'Contrato', id: 'contract_id', resource: 'contracts' },
  { label: 'Sucursal', id: 'branch_id', resource: 'branches' },
  { label: 'Categoria', id: 'category_id', resource: 'categories' },
  { label: 'Modelo', id: 'equipment_model_id', resource: 'equipment_models' },
  { label: 'Condición', id: 'asset_condition_id', resource: 'asset_conditions' },
  { label: 'Status', id: 'asset_disposal_reason_id', resource: 'asset_disposal_reasons' },
]

const FORM_ATTRIBUTES = [
  { label: 'Nombre de Serie', id: 'serialNumber', type: 'input', propieties: { type: 'text', required: true } },
  { label: 'Cargador', id: 'charger', type: 'input', propieties: { type: 'text', required: false } },
]

const FORM_RELATIONSHIPS = [
  { label: 'Contrato', id: 'contract_id', type: 'select', resource: 'contracts', propieties: { required: true, } },
  { label: 'Sucursal', id: 'branch_id', type: 'select', resource: 'branches', propieties: { required: true, } },
  { label: 'Categoria', id: 'category_id', type: 'select', resource: 'categories', propieties: { required: true, } },
  { label: 'Modelo', id: 'equipment_model_id', type: 'select', resource: 'equipment_models', propieties: { required: true, } },
  { label: 'Condición', id: 'asset_condition_id', type: 'select', resource: 'asset_conditions', propieties: { required: true, } },

]

export default [
  {
    path: "assets",
    name: "assets",
    component: DataTable,
    props: {
      title: 'Activos de TI',
      resource: 'assets',
      attributes: TABLE_ATTRIBUTES,
      relationships: TABLE_RELATIONSHIPS,
      actions: [
        { name: 'edit', icon: 'pencil_outline', route: 'assets.edit', title: 'Editar Registro' },
      ]
    }
  },
  {
    path: "/assets/create",
    name: "assets.create",
    component: DataForm,
    props: {
      title: 'Activos de TI',
      resource: 'assets',
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  },
  {
    path: "/assets/edit/:id",
    name: "assets.edit",
    component: DataForm,
    props: {
      title: 'Activos de TI',
      resource: 'assets',
      is_new_record: false,
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  }
]
