<template>
  <section>
    <div>
      <button
        type="button"
        class="btn btn-sm round btn-outline-success"
        @click.prevent="goToCreateCurency()"
      >
        Ajouter une devise
      </button>
    </div>
    <div class="header">
      <h2>Listes de devises</h2>
    </div>
    <div class="table-responsive">
      <table
        class="table table-hover js-basic-example dataTable table-custom mb-0"
      >
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Devise</th>
            <th>Code</th>
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
              <button type="button" class="btn btn-sm round btn-outline-danger">
                Annuler
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</template>

<script>
export default {};
</script>

<style>
</style>