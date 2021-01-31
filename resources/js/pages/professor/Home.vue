<template>
  <section class="section">
    <div class="section-header">
      <h1>Painel</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Lista de alunos</h4>
              <div class="card-header-form">
                <form>
                  <div class="input-group">
                    <input
                      type="text"
                      v-model="pesquisa"
                      class="form-control"
                      placeholder="Search"
                      @keyup.prevent="pesquisaAluno"
                    />
                    <div class="input-group-btn">
                      <button class="btn btn-primary">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped" v-if="listaAlunos != null">
                  <tbody>
                    <tr>
                      <th>Matricula</th>
                      <th>Nome</th>
                      <th>Telefone</th>
                      <th>Foto</th>
                      <th>Situação</th>
                      <th>Detalhes</th>
                    </tr>

                    <tr v-for="aluno in listaAlunos.data" :key="aluno.id">
                      <td>{{ aluno.id }}</td>
                      <td>{{ aluno.name }}</td>
                      <td>{{ aluno.telefone }}</td>
                      <td>
                        <img
                          alt="image"
                          src="https://img.estadao.com.br/fotos/politica/eleicoes-2020/TO/FTO270001149172_div.jpg"
                          class="rounded-circle"
                          width="35"
                          data-toggle="tooltip"
                          title=""
                          data-original-title="Wildan Ahdian"
                        />
                      </td>
                      <td>
                        <div class="badge badge-success">{{ aluno.situacao }}</div>
                      </td>
                      <td>
                        <a href="#" class="btn btn-primary"
                          ><i class="fa fa-eye" aria-hidden="true"></i
                        ></a>
                      </td>
                    </tr>
                  </tbody>

                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item" :class="anterior">
                          <a class="page-link" tabindex="-1"
                            ><i class="fas fa-chevron-left" ></i
                          ></a>
                        </li>

                        <li class="page-item" :class=" link.active ? 'active' : ''" v-for="link in listaAlunos.links" :key="link.id">
                          <a class="page-link" href="" v-show="link.label > 0 && link.label <= listaAlunos.last_page  ">
                            <span class="sr-only">(current)</span>{{link.label }}</a
                          >
                        </li>

                        <li class="page-item">
                          <a class="page-link"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </table>
                <p v-else>Não achei os alunos</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
export default {
  props: {},
  data() {
    return {
      pesquisa: null,
      listaAlunos: null,
      anterior:{
        disabled:false,
      },
      proximo:{
        disabled:false,
      }
    };
  },
  computed: {
    pesquisaValida: function () {
      return (
        this.pesquisa != "" && this.pesquisa != null && !this.pesquisa.match(/^(\s)+$/)
      );
    },
  },

  mounted() {
    this.pesquisaAluno();
    console.log(this.listaAlunos);
  },
  methods: {
    paginacao(pag){



    },
    pesquisaAluno() {
      var url = "professor/alunos/" + (this.pesquisaValida ? this.pesquisa : "todos");
      axios
        .post(url)
        .then((res) => {
          if (res.data.data.length > 0) {
            this.listaAlunos = res.data;
            if(this.listaAlunos.current_page ==1){
             this.anterior.disabled = true;
            }
            if(this.listaAlunos.current_page == this.listaAlunos.last_page){
             this.proximo.disabled = true;
            }
          } else {
            this.listaAlunos = null;
          }
          console.log(res.data);
        })
        .catch((e) => {
          this.listaAlunos = null;
          console.log("erro");
        });
    },
  },
};
</script>
