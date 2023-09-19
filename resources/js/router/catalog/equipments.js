const DataTable = () => import('../../templates/DataTable.vue')
const DataForm = () => import('../../templates/DataForm.vue')

const TABLE_ATTRIBUTES = [
  { label: 'ID', id: 'id' },
  { label: 'Equipo', id: 'name' },
  { label: 'Creado Por', id: 'createdBy', hidden: true },
  { label: 'Creado a las', id: 'createdAt', filter: 'date' },
  { label: 'Actualizado Por', id: 'updatedBy', hidden: true },
  { label: 'Actualizado a las', id: 'updatedAt', filter: 'date' },
];

const TABLE_RELATIONSHIPS = [
  { label: 'Categoria', id: 'category_id', resource: 'categories' },
]

const FORM_ATTRIBUTES = [
  {
    label: 'Nombre del Equipo', id: 'name', type: 'input',
    propieties: { type: 'text', required: true }
  },
]

const FORM_RELATIONSHIPS = [
  {
    label: 'Nombre de la Categoria', id: 'category_id', type: 'select', resource: 'categories',
    propieties: { required: true, }
  }
]

export default [
  {
    path: "equipment",
    name: "equipment",
    component: DataTable,
    props: {
      title: 'Equipos',
      resource: 'equipment',
      attributes: TABLE_ATTRIBUTES,
      relationships: TABLE_RELATIONSHIPS,
      actions: [
        { name: 'edit', icon: 'pencil_outline', route: 'equipment.edit', title: 'Editar Registro' },
      ]
    }
  },
  {
    path: "/equipment/create",
    name: "equipment.create",
    component: DataForm,
    props: {
      title: 'Equipos',
      resource: 'equipment',
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  },
  {
    path: "/equipment/edit/:id",
    name: "equipment.edit",
    component: DataForm,
    props: {
      title: 'Equipos',
      resource: 'equipment',
      is_new_record: false,
      attributes: FORM_ATTRIBUTES,
      relationships: FORM_RELATIONSHIPS,
    }
  }
]
