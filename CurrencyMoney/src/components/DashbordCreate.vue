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
            <li>
              <a href="#" class="active">Accueil</a>
            </li>
            <li>
              <a href="#" @click.prevent="goToListCurency()" >Currency</a>
            </li>
            <li>
              <a href="#" @click.prevent="goToListPair()" >Pairs</a>
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

            
            <div class="body">
             
                <div v-if="showTableListPair">
                  <TableListPairs />
                </div>
                <div v-if="showTableListCurency">
                  <TableListCurrency />
                </div>
                <div v-if="showFormCreatePair">
                  <FormCreatePair />
                </div>
                <div v-if="showFormCreateCurrency">
                  <FormCreateCurrency />
                </div>
              
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
import TableListPairs from "./TableListPairs.vue";
import TableListCurrency from "./TableListCurrency.vue";
import FormCreatePair from "./FormCreatePair.vue";
import FormCreateCurrency from "./FormCreateCurrency.vue";
import axios from "axios";
export default {
  name: "DashbordCreate",
  components: {
    TableListPairs,
    TableListCurrency,
    FormCreatePair,
    FormCreateCurrency,

  },
  data() {
    return {
      showTableListCurency: false,
      showTableListPair: false,
      showFormCreatePair: false,
      showFormCreateCurrency: false,
      pairs: [],
      token: localStorage.getItem("token"),
    };
  },
  mounted() {
    axios.get("http://127.0.0.1:8000/api/pairs").then((res) => {
      this.pairs = res.data.data;
      //console.log(this.pairs);
    }),
    this.changeState("CreatePair");
  },
  methods: {
    logout() {
      axios
        .post("http://127.0.0.1:8000/api/logout")
        .then((response) => {
          localStorage.removeItem("token");
          this.$router.push("/");
        })
        .catch((errors) => {
          console.log(errors);
        });
    },
    goToListPair() {
      this.changeState("ListTablePair");
    },

    goToListCurency() {
      this.changeState("ListTableCurrency");
    },
    goToCreatePair() {
      this.changeState("CreatePair");
    },

    goToCreateCurency() {
      this.changeState("CreateCurrency");
    },
    changeState(destination) {
        this.showTableListCurency = false
        this.showTableListPair = false
        this.showFormCreatePair = false
        this.showFormCreateCurrency = false
    
      switch (destination) {
        case "ListTablePair":
          this.showTableListPair = true;
          break;
        case "ListTableCurrency":
          this.showTableListCurency = true;
          break;
        case "CreatePair":
          this.showFormCreatePair = true;
          break;
        case "CreateCurrency":
          this.showFormCreateCurrency = true;
          break;
        default:
          this.showTableListPair = true;
          break;
      }
    },
  },
};
</script>

<style>
</style>