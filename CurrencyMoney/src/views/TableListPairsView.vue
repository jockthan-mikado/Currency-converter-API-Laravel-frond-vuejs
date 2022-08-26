<template>
  <section>
    <div  >
      <button
        type="button"
        class="btn btn-sm round btn-outline-success"
        @click.prevent="goToCreatePair()"
      >
        Ajouter une paire
      </button>
    </div>
    <div class="header">
      <h2>Listes de paires</h2>
    </div>
    <div class="table-responsive">
      <table
        class="table table-hover js-basic-example dataTable table-custom mb-0"
      >
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Paires</th>
            <th>Taux d'echanges</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="pair in pairs" :key="pair.id">
            <td>{{ pair.id }}</td>
            <td>
              {{ pair.currency_from.exchange_code }} -
              {{ pair.currency_to.exchange_code }}
            </td>
            <td>{{ pair.rate }}</td>
            <td>
              <button
                type="button"
                class="btn btn-sm round btn-outline-success"
              >
                Accept
              </button>
              <button type="button" class="btn btn-sm round btn-outline-danger" @click.prevent="deletePair(pair.id)">
                Supprimer
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-if="showFormCreatePair">
        <FormCreatePair />
    </div>
  </section>
</template>

<script>

import axios from "axios";
export default {
   name: "TableListPairs",
  
  data() {
    return {
     
      showTableListPair: false,
      showFormCreatePair: false,
      pairs: [],
    };
  },
  mounted() {
    this.getPairs();
  },
  methods:{
    deletePair(id){
      axios.delete(`http://127.0.0.1:8000/api/pairs/${id}`)
      .then((res)=>{
        console.log("réussi")
        this.getPairs()
      })
      .catch(error=>{
        console.log(error)
      })
    },
    async getPairs(){
      await axios.get("http://127.0.0.1:8000/api/pairs")
     .then((res) => {
       this.pairs = res.data.currencies;
       console.log("response",res.data.currencies);
     })
    }
  },
};
</script>

<style>
</style> 