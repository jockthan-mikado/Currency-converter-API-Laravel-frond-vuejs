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
              <a href="#">Ajouter une dévise</a>
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
          <button class="btn btn-outline-success">Déconnexion</button>
        </div>
      </header>
      <main>
        <div class="col-lg-12 col-md-12 col-sm-12 m-2 p-2">
          <div class="card">
            <div class="header">
              <h2>Active Order</h2>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table
                  class="
                    table table-hover
                    js-basic-example
                    dataTable
                    table-custom
                    mb-0
                  "
                >
                  <thead class="thead-dark">
                    <tr>
                      <th>Date</th>
                      <th>Type</th>
                      <th>Amount BTC</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>28-July-2018 06:51:51</td>
                      <td>Buy</td>
                      <td>0.58647</td>
                      <td>
                        <button class="btn btn-sm round btn-outline-success">
                          Accept
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>28-July-2018 06:50:50</td>
                      <td>Sell</td>
                      <td>1.38647</td>
                      <td>
                        <button class="btn btn-sm round btn-outline-success">
                          Accept
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>28-July-2018 06:49:51</td>
                      <td>Buy</td>
                      <td>0.45879</td>
                      <td>
                        <button class="btn btn-sm round btn-outline-success">
                          Accept
                        </button>
                        <button class="btn btn-sm round btn-outline-danger">
                          Cancel test
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>28-July-2018 06:51:51</td>
                      <td>Buy</td>
                      <td>0.89877</td>
                      <td>
                        <button class="btn btn-sm round btn-outline-success">
                          Accept
                        </button>
                        <button class="btn btn-sm round btn-outline-success">
                          Accept
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>28-July-2018 06:51:51</td>
                      <td>Sell</td>
                      <td>0.45712</td>
                      <td>
                        <button class="btn btn-sm round btn-outline-danger">
                          Cancel test
                        </button>
                        <button class="btn btn-sm round btn-outline-danger">
                          Cancel test
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>28-July-2018 06:51:51</td>
                      <td>Buy</td>
                      <td>0.58647</td>
                      <td>
                        <button class="btn btn-sm round btn-outline-success">
                          Accept
                        </button>
                        <button class="btn btn-sm round btn-outline-danger">
                          Cancel test
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
export default {};
</script>

<style>
</style>