<template>
  <div>
    <h1 class="text-center bg-info text-white">Clientes</h1>
    <div>
      <b-button v-b-modal.modal-1>Crear</b-button>
      <b-modal id="modal-1" title="BootstrapVue">
        <b-form>
         
          <b-form-input
            id="inline-form-input-name"
            class="mb-2 mr-sm-2 mb-sm-0"
            placeholder="Introducir nombre"
            v-model="customer.nombre"
          ></b-form-input> 

          <b-input-group prepend="@" class="mb-2 mr-sm-2 mb-sm-1">
            <b-form-input
              id="inline-form-input-username"
              placeholder="Introducir email"
              v-model="customer.email"
            ></b-form-input>
          </b-input-group>
           <b-form-input
            id="inline-form-input-name"
            class="mb-2 mr-sm-2 mb-sm-1"
            placeholder="Introducir teléfono"
            v-model="customer.telefono"
          ></b-form-input>
           <b-form-input
            id="inline-form-input-name"
            class="mb-2 mr-sm-2 mb-sm-1"
            placeholder="Introducir nombre mascota"
            v-model="customer.nombre_mascota"
          ></b-form-input>
           <b-form-input
            id="inline-form-input-name"
            class="mb-2 mr-sm-2 mb-sm-1"
            placeholder="Introducir tipo de pelo mascota"
            v-model="customer.pelo_mascota"
          ></b-form-input>
           <b-form-input
            id="inline-form-input-name"
            class="mb-2 mr-sm-2 mb-sm-1"
            placeholder="Introducir raza de mascota"
            v-model="customer.raza_mascota"
          ></b-form-input>          

          <b-button variant="primary">Guardar</b-button>
        </b-form>
      </b-modal>
    </div>
    <div v-for="customer in customers" :key="customer.id">
      <div class="d-flex justify-content-center mb-2">
        <span class="col-7">{{ customer.name }}-{{ customer.email }}</span>
        <div class="col-5">
          <button class="btn btn-primary">Editar</button>
          <button class="btn btn-danger" @click="deleteCustomer(customer.id)">
            Eliminar
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      customer:{
        nombre:"",
        email:"", 
        telefono:"",
        nombre_mascota:"",
        pelo_mascota:"",
        raza_mscota:""
      },
      customers: []
    };
  },
  created() {
    this.get();
  },
  methods: {
    async get() {
      let res = await axios.get("clientes");
      this.customers = res.data;
    },
    async deleteCustomer(value) {
      console.log("hola");
      let res = await axios.delete("clientes/" + value);
      this.customers.filter(customer => customer.id == value);
      this.get();
    }
  }
};
</script>

<style scoped></style>
