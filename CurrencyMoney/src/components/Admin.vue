<template>
  <div>
    <div>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-purple">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">MoneyValue Admin </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a
                  class="nav-link"
                  :class="{ active: showCreateForm || showPairsList }"
                  href="#"
                  @click.prevent="goToPairsList()"
                  >Pairs</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link"
                  :class="{ active: showCreateForm || showPairsList }"
                  href="#"
                  @click.prevent="goToPairsList()"
                  >Devises</a
                >
              </li>
            </ul>
            <form class="d-flex">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-outline-success" type="submit">
                Recherche
              </button>
            </form>
          </div>
        </div>
      </nav>

      <main class="container">
        <div class="row mt-5" v-if="showCreateForm || showPairsList">
          <div class="col">
            <div class="card">
              <div class="card-header text-black bg-purple-light">
                Gestion d'échange de monaie
              </div>
              <div class="card-body">
                <div class="mb-4" v-if="showCreateForm">
                  <div class="d-flex mb-2">
                    <h5 class="card-title flex-grow-1">
                      Formulaire de création d'une paire
                    </h5>
                  </div>
                  <!-- @submit.prevent lors de la soumission du formulaire on annule tout comportement par defaut et on applle la fonction submitStudent-->
                  <form class="row g-3" @submit.prevent="submitPairs">
                    <div class="col-6">
                      <label for="devisedepart" class="form-label"
                        >devise de depart</label
                      >
                      <select
                        v-model="newStudent.niveauScolaire"
                        required
                        id="selectNiveauScolaire"
                        class="form-select"
                      >
                        <option value=""></option>
                      </select>
                    </div>
                    <div class="col-6">
                      <label for="devisedepart" class="form-label"
                        >devise d'arrivée</label
                      >
                      <select
                        v-model="newStudent.niveauScolaire"
                        required
                        id="selectNiveauScolaire"
                        class="form-select"
                      >
                        <option value=""></option>
                      </select>
                    </div>
                    <div class="col-6">
                      <label for="inputDatenaissance" class="form-label"
                        >Taux</label
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
                        <i class="fas fa-save"></i> Créer
                      </button>
                      <button
                        type="button"
                        @click.prevent="goToPairsList()"
                        class="btn btn-danger ms-2"
                      >
                        <i class="fas fa-backspace"></i> Retouner à liste des
                        pairs
                      </button>
                    </div>
                  </form>
                </div>
                <div v-if="showPairsList">
                  <div class="d-flex mb-2">
                    <h5 class="card-title flex-grow-1">Liste des pairs</h5>
                    <div class="d-flex">
                      <a
                        href=""
                        @click.prevent="goToCreateForm()"
                        class="btn btn-link d-block"
                        >Ajouter une paire</a
                      >
                      <input type="text" name="" id="" class="form-control" />
                    </div>
                  </div>
                  <table class="table table-bordered table-striped">
                    <thead>
                      <th class="text-center">Id</th>
                      <th class="text-center">Paire</th>
                      <th class="text-center">Raite</th>
                      <th class="text-center">update</th>
                      <th class="text-center">delete</th>
                    </thead>

                    <tbody>
                      <tr>
                        <td class="text-center">Test</td>
                        <td class="text-center">Test</td>
                        <td class="text-center">Test</td>
                        <td class="text-center">
                          <button class="btn btn-link">
                            <i class="fas fa-edit"></i>
                          </button>
                        </td>
                        <td class="text-center">
                          <button class="btn btn-link">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
export default {
  name: "Admin",

  mounted() {
    this.changeNavigationState("list");
  },
  methods: {
    goToHome() {
      //cette fonction permet de changer l'etat d'une varible. on utilise le this pour viser la variable courante
      this.changeNavigationState("home");
    },
    goToCreateForm() {
      this.changeNavigationState("create");
    },

    goToPairsList() {
      this.changeNavigationState("list");
    },
    changeNavigationState(destination) {
      this.showCreateForm = false;
      this.showHome = false;
      this.showPairsList = false;

      switch (destination) {
        case "home":
          this.showHome = true;
          break;
        case "create":
          this.showCreateForm = true;
          break;
        case "list":
          this.showPairsList = true;
          break;

        default:
          this.showHome = true;
          break;
      }
    },
  },
};
</script>

<style>
.bd-placeholder-img {
  font-size: 1.125rem;
  text-anchor: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

@media (min-width: 768px) {
  .bd-placeholder-img-lg {
    font-size: 3.5rem;
  }
}

body {
  min-height: 75rem;
  padding-top: 4.5rem;
}

.bg-purple {
  background-color: #7367f0;
}

.bg-purple-light {
  background: #e6e4ff !important;
}
</style>