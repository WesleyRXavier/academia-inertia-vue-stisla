<template>
  <section class="section">
    <div class="section-header">
      <h1>Cadastro de alunos</h1>
    </div>
    <div class="section-body">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <form>
            <div class="card-body">
              <div class="form-group">
                <label
                  ><font style="vertical-align: inherit"
                    ><font style="vertical-align: inherit"
                      >Nome do aluno:</font
                    ></font
                  ></label
                >
                <input
                  type="text"
                  class="form-control"
                  value="Rizal Fakhri"
                  required=""
                  v-model="form.name"
                />
              </div>
              <div class="form-group">
                <label
                  ><font style="vertical-align: inherit"
                    ><font style="vertical-align: inherit"
                      >Email do aluno:</font
                    ></font
                  ></label
                >
                <input
                  type="text"
                  class="form-control"
                  :class="email.invalido ? 'is-invalid' : ''"
                  value="Rizal Fakhri"
                  required=""
                  v-model="form.email"
                />
                <div class="invalid-feedback">
                 {{ email.msg }}
                </div>
              </div>
              <div class="form-group">
                <label
                  ><font style="vertical-align: inherit"
                    ><font style="vertical-align: inherit"
                      >Idade do aluno:</font
                    ></font
                  ></label
                >
                <input
                  type="text"
                  class="form-control is-valid"
                  value="Rizal Fakhri"
                  required=""
                  v-model="form.idade"
                />
              </div>
              <div class="form-group">
                <label
                  ><font style="vertical-align: inherit"
                    ><font style="vertical-align: inherit"
                      >objetivo do aluno:</font
                    ></font
                  ></label
                >
                <input
                  type="text"
                  class="form-control is-valid"
                  value="Rizal Fakhri"
                  required=""
                  v-model="form.objetivo"
                />
              </div>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-success" @click.prevent="salvar">
                <font style="vertical-align: inherit"
                  ><font style="vertical-align: inherit">Salvar</font></font
                >
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      form: {
        name: "",
        email: "",
        objetivo: "",
        idade: "",
      },
      email: {
        invalido: false,
        msg: "",
      },
    };
  },
  computed: {},

  methods: {
    salvar() {
      axios
        .post("/aluno/store", this.form)
        .then((res) => {
          var resposta = res.data;
          console.log(resposta.erro.email);
          if (resposta.erro.email) {
            this.email.invalido = true;
            this.email.msg = resposta.erro.email[0];
          }
        })
        .catch((e) => {
          console.log("erro");
        });
    },
  },
};
</script>
