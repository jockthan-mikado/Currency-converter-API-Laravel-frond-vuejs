<template>
  <section>
    <div class="card-body">
      <div class="mb-4" v-if="showCreateForm">
        <div class="d-flex mb-2">
          <h5 class="card-title flex-grow-1">
            Formulaire de modification d'une paire
          </h5>
        </div>
        <!-- @submit.prevent lors de la soumission du formulaire on annule tout comportement par defaut et on applle la fonction submitStudent-->
        <form class="row g-3" @submit.prevent="submitStudent">
          <div class="col-6">
            <label for="selectNiveauScolaire" class="form-label"
              >Devise de depart</label
            >
            <select
              v-model="newStudente"
              required
              id="selectNiveauScolaire"
              class="form-select"
            >
              <option value=""></option>
              <option value="Terminal A">Terminal A</option>
            </select>
          </div>
          <div class="col-6">
            <label for="selectNiveauScolaire" class="form-label"
              >Devise d'arrivée</label
            >
            <select
              v-model="newStudent.niveauScolaire"
              required
              id="selectNiveauScolaire"
              class="form-select"
            >
              <option value=""></option>
              <option value="Terminal A">Terminal A</option>
            </select>
          </div>
          <div class="col-6">
            <label for="inputDatenaissance" class="form-label"
              >Taux d'échange</label
            >
            <input
              v-model="newStudent.dateNaissance"
              required
              type="date"
              class="form-control"
              id="inputDatenaissance"
            />
          </div>

          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save"></i> Création paire
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>

<script>
export default {};
</script>

<style>
</style>