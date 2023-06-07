import DataTable from '../../templates/DataTable.vue';
import DataForm from '../../templates/DataForm.vue';
export default [
  {
    path: "organizations",
    name: "organizations",
    component: DataTable,
    props: {
      title: 'Organizaciones',
      fields: [
        { label: 'ID', name: 'id' },
        { label: 'Organizacion', name: 'name' },
        { label: 'Razon Social', name: 'businessName' },
        { label: 'Direccion', name: 'address', },
        { label: 'Poblacion', name: 'city' },
        { label: 'Estado', name: 'state' },
        { label: 'C P', name: 'postalCode' },
        { label: 'Creado Por', name: 'createdBy', hidden: true },
        { label: 'Creado a las', name: 'createdAt', filter: 'date' },
        { label: 'Actualizado Por', name: 'updatedBy', hidden: true },
        { label: 'Actualizado a las', name: 'updatedAt', filter: 'date' },
      ],
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
      fields: [
        {
          label: 'Nombre de la Organización',
          name: 'name',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        },
        {
          label: 'Razón Social',
          name: 'businessName',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        },
        {
          label: 'Dirección',
          name: 'address',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        },
        {
          label: 'Ciudad / Población',
          name: 'city',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        },
        {
          label: 'Estado',
          name: 'state',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        },
        {
          label: 'Codigo Postal',
          name: 'postalCode',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        }
      ]
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
      fields: [
        {
          label: 'Nombre de la Organización',
          name: 'name',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        },
        {
          label: 'Razón Social',
          name: 'businessName',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        },
        {
          label: 'Dirección',
          name: 'address',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        },
        {
          label: 'Ciudad / Población',
          name: 'city',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        },
        {
          label: 'Estado',
          name: 'state',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        },
        {
          label: 'Codigo Postal',
          name: 'postalCode',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        }
      ]
    }
  }
]
