<script>
export default {
  name: 'Notifications'
}
</script>
<template>
  <div>

    <div class="h-24">

    </div>

    <div class="bg-white max-w-xs  mx-auto rounded-md shadow-md">
      <div class="p-6">
        <h2 class="font-medium text-xl">Editar configuración de IP</h2>
        <div class="py-2">
          <select name="name" id="" class="shadow-sm w-full border border-gray-200 rounded-md p-1">
            <option value="">Manual</option>
          </select>
          <div class="py-2">
            <h1 class="text-lg font-medium">IPv4</h1>
            <label class="relative inline-flex items-center cursor-pointer">
              <input type="checkbox" value="" class="sr-only peer">
              <div
                class="w-11 h-6 bg-gray-200 peer-focus:outline-none dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
              </div>
              <span class="ml-3 ">Activado</span>
            </label>
          </div>

          <div class="py-2">
            <label for="ip">Dirección IP</label>
            <input type="text"
              class="w-full border border-gray-200 rounded-md p-1 border-b-2 focus:outline-none focus:border-b-blue-600">

          </div>

          <div class="py-2">
            <label for="ip">Máscara de subred</label>
            <input type="text"
              class="w-full border border-gray-200 rounded-md p-1 border-b-2 focus:outline-none focus:border-b-blue-600">

          </div>

          <div class="py-2">
            <label for="ip">Puerta de enlace</label>
            <input type="text"
              class="w-full border border-gray-200 rounded-md p-1 border-b-2 focus:outline-none focus:border-b-blue-600">

          </div>


          <div class="py-2">
            <label for="ip">DNS preferido</label>
            <input type="text"
              class="w-full border border-gray-200 rounded-md p-1 border-b-2 focus:outline-none focus:border-b-blue-600">

          </div>

          <span>DNS a través de HTTPS</span>

          <select name="name" id="" class="shadow-sm w-full border border-gray-200 rounded-md p-1">
            <option value="">Desactivado</option>
          </select>


          <div class="py-8">
            <span class="font-medium ">DNS Alternativo</span>
          </div>



        </div>


      </div>
      <div class="bg-gray-100">
        <div class="p-6 space-x-2 flex items-center justify-center">

          <button
            class="bg-white py-1 px-10 rounded-md border border-b-2 border-gray-300 hover:bg-gray-100">cancelar</button>

          <button
            class="bg-blue-500 text-white py-1 px-10 rounded-md border border-b-2 border-gray-300 hover:bg-gray-100 ">Guardar</button>
        </div>

      </div>

    </div>
  </div>
</template>