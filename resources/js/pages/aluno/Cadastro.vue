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
                  :class="nome.invalido ? 'is-invalid' : ''"
                  required=""
                  v-model="form.name"
                />
                <div class="invalid-feedback">
                  {{ nome.msg }}
                </div>
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
                  class="form-control"
                  :class="idade.invalido ? 'is-invalid' : ''"
                  required=""
                  v-model="form.idade"
                />
                <div class="invalid-feedback">
                  {{ idade.msg }}
                </div>
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
                  class="form-control"
                  :class="objetivo.invalido ? 'is-invalid' : ''"
                  required=""
                  v-model="form.objetivo"
                />
                <div class="invalid-feedback">
                  {{ objetivo.msg }}
                </div>
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
      nome: {
        invalido: false,
        msg: "",
      },
      email: {
        invalido: false,
        msg: "",
      },
      idade: {
        invalido: false,
        msg: "",
      },
      objetivo: {
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
          console.log(resposta);
          if(resposta.status ==200){
            this.form.name = '';
             this.form.email = '';
              this.form.objetivo = '';
               this.form.idade = '';

          }else{

          if (resposta.erros.email) {
            this.email.invalido = true;
            this.email.msg = resposta.erros.email[0];
          } else {
            this.email.invalido = false;
            this.email.msg = "";
          }
          if (resposta.erros.name) {
            this.nome.invalido = true;
            this.nome.msg = resposta.erros.name[0];
          } else {
            this.nome.invalido = false;
            this.nome.msg = "";
          }
          if (resposta.erros.idade) {
            this.idade.invalido = true;
            this.idade.msg = resposta.erros.idade[0];
          } else {
            this.idade.invalido = false;
            this.idade.msg = "";
          }
          if (resposta.erros.objetivo) {
            this.objetivo.invalido = true;
            this.objetivo.msg = resposta.erros.objetivo[0];
          } else {
            this.objetivo.invalido = false;
            this.objetivo.msg = "";
          }
          }
        })
        
        .catch((e) => {
          //console.log(e);
        });
    },
  },
};
</script>
