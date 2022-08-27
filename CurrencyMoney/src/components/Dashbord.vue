<template>
  <section>
    <input type="checkbox" name="" id="menu" />
    <div class="sidebar">
      <div class="sidebar-brand">
        <h2><span class="fa fa-user-o"> </span> MoneyValue</h2>
      </div>

      <div class="sidebar-menu">
        <nav>
          <ul>
            <li :class="{ active: selected === 'login' }">
              <RouterLink @click="setSelected('login')" to="/">
                Pairs
                <!-- Add Icons using String format -->
                <font-awesome-icon
                  class="home-icon"
                  icon="fa-solid fa-home-alt"
                ></font-awesome-icon>
              </RouterLink>
            </li>
            <li :class="{ active: selected === 'listecurrency' }">
              <RouterLink @click="setSelected('listecurrency')" to="/dashbord-liste-currency"
                >Currency</RouterLink
              >
            </li>
            <!-- <li>
              <a href="#" class="active">Accueil</a>
            </li> -->
          </ul>
        </nav>
      </div>
    </div>
    <div class="content">
      <header>
        <p>
          <label for="menu"><span class="fa fa-bars"></span></label
          ><span class="accueil">Accueil</span>
        </p>

        <div id="dropdown" class="user-wrapp">
          <button
            type="submit"
            @click.prevent="logout"
            class="btn btn-outline-success"
          >
            Déconnexion
          </button>
        </div>
      </header>
      <main>
        <div class="col-lg-12 col-md-12 col-sm-12 m-2 p-2">
          <div class="card">
            <div class="body">
              <RouterView />
            </div>
          </div>
        </div>
      </main>
    </div>
  </section>
</template>




<script>
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import "../assets/style_dashbord.css";
import axios from "axios";
import { ref, onMounted } from "vue";
 
export default {
  data() {

    return {
      token: null,
    };
  },
  methods: {
    logout() {
      console.log("exit deconnecte", localStorage.getItem("token"));
      localStorage.removeItem("token");
      this.$router.push("/");
      let token_get = localStorage.getItem("token");
      console.log("token_get", token_get);
      axios
        .get("http://127.0.0.1:8000/api/logout", {
          headers: {},
        })
        .then((response) => {
          localStorage.removeItem("token");
          console.log(response);
          this.$router.push("/");
        })
        .catch((errors) => {
          console.log("errors");
        });
    },
  },
};
// reactive state
const selected = ref("home");

// functions that mutate state and trigger updates
function setSelected(value) {
  selected.value = value;
}

// lifecycle hooks
onMounted(() => {
  console.log(`Au chargement du composant, 
        "selected" a pour valeur ${selected.value}.`);
});
</script> 

<style>
</style>