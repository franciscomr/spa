const DataTable = () => import('../../templates/DataTable.vue')
const DataForm = () => import('../../templates/DataForm.vue')
const FormForAttach = () => import('../../templates/FormForAttach.vue')

const TABLE_ATTRIBUTES = [
  { label: 'ID', id: 'id' },
  { label: 'Modelo', id: 'name' },
  { label: 'Caracteristicas', id: 'attributes' },
  { label: 'Creado Por', id: 'createdBy', hidden: true },
  { label: 'Creado a las', id: 'createdAt', filter: 'date' },
  { label: 'Actualizado Por', id: 'updatedBy', hidden: true },
  { label: 'Actualizado a las', id: 'updatedAt', filter: 'date' },
];

const TABLE_RELATIONSHIPS = [
  { label: 'Equipo', id: 'equipment_id', resource: 'equipment' },
  { label: 'Marca', id: 'brand_id', resource: 'brands' },
]

const FORM_ATTRIBUTES = [
  {
    label: 'Modelo', id: 'name', type: 'input',
    propieties: { type: 'text', required: true }
  },
  {
    label: 'Caracteristicas', id: 'attributes', type: 'input',
    propieties: { type: 'text', required: true }
  },
]

const FORM_RELATIONSHIPS = [
  {
    label: 'Nombre del Equipo', id: 'equipment_id', type: 'select', resource: 'equipment',
    propieties: { required: true, }
  },
  {
    label: 'Nombre de la Marca', id: 'brand_id', type: 'select', resource: 'brands',
    propieties: { required: true, }
  }
]


const ATTACH = [
  {
    label: 'Agregar archivo', id: 'equipment_id', type: 'file', resource: 'equipment',
    propieties: { required: true, }
  }
]

export default [
  {
    path: "equipmentModels",
    name: "equipmentModels",
    component: DataTable,
    props: {
      title: 'Modelos',
      resource: 'equipmentModels',
      attributes: TABLE_ATTRIBUTES,
      relationships: TABLE_RELATIONSHIPS,
      actions: [
        { name: 'edit', icon: 'pencil_outline', route: 'equipmentModels.edit', title: 'Editar Registro' },
        { name: 'attach', icon: 'paperclip', route: 'equipmentModels.attach', title: 'Adjuntar Imagen' },
      ]
    }
  },
  {
    path: "/equipmentModels/create",
    name: "equipmentModels.create",
    component: DataForm,
    props: {
      title: 'Modelos',
      resource: 'equipmentModels',
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  },
  {
    path: "/equipmentModels/edit/:id",
    name: "equipmentModels.edit",
    component: DataForm,
    props: {
      title: 'Modelos',
      resource: 'equipmentModels',
      is_new_record: false,
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  },
  {
    path: "/equipmentModels/attach/:id",
    name: "equipmentModels.attach",
    component: FormForAttach,
    props: {
      title: 'Modelos',
      resource: 'equipmentModels',
      format: ['image/jpeg']
    }
  }
]
