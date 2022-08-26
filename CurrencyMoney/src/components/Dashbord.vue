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
            <li :class="{ active: selected === 'posts-feed' }">
              <RouterLink
                @click="setSelected('dashbord')"
                to="/dashbord"
                >Articles</RouterLink
              >
            </li>
            <li :class="{ active: selected === 'dashbord-listepair' }">
              <RouterLink @click="setSelected('listepair')" to="/dashbord-listepair"
                >A propos</RouterLink
              >
            </li>
            <li>
              <a href="#" class="active">Accueil</a>
            </li>
            <li>
              <a href="#">Pairs</a>
            </li>
            <li>
              <a href="#">Currency</a>
            </li>
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
          <form class="form-horizontal" method="get" @submit.prevent="logout">
            <button class="btn btn-outline-success">Déconnexion</button>
          </form>
        </div>
      </header>
      <main>
        <div class="col-lg-12 col-md-12 col-sm-12 m-2 p-2">
          <div class="card">
            <div class="body"></div>
          </div>
        </div>
      </main>
    </div>
  </section>
</template>




<script setup>
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import "../assets/style_dashbord.css";
import { ref, onMounted } from "vue";


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