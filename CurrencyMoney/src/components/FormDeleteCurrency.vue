<template>
<section>
      <div class="card-body">                
            <div class="mb-4" v-if="showCreateForm">
                <div class="d-flex mb-2">
                    <h5 class="card-title flex-grow-1">Formulaire de suppression d'une paire</h5>
                </div>
                <!-- @submit.prevent lors de la soumission du formulaire on annule tout comportement par defaut et on applle la fonction submitStudent-->
                <form class="row g-3" @submit.prevent="submitStudent">
                    <div class="col-6">
                    <label for="inputDatenaissance" class="form-label">Devise</label>
                    <input v-model="newStudent.dateNaissance" required type="date" class="form-control" id="inputDatenaissance">
                    </div>
                    <div class="col-6">
                    <label for="inputDatenaissance" class="form-label">Code devise</label>
                    <input v-model="newStudent.dateNaissance" required type="date" class="form-control" id="inputDatenaissance">
                    </div>
            
                    <div class="col-12">
                    <button type="submit" class="btn btn-primary "><i class="fas fa-save"></i> suppression devise</button>
                    </div>
                </form>
            </div>
        </div>>
  </section>
</template>

<script>
export default {

}
</script>

<style>

</style>