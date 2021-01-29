<template>
  <div class="container">
    <div class="row ajusteRow justify-content-center align-items-center">
      <div class="col-md-4">
        <div class="boxCadastro card align-items-center">
          <img class="logo" src="../../../../public/img/logotipo.png" alt="Spreading" />
          <h3 class="mt-4">Cadastro de {{ tipo }}</h3>

          <form
            action=""
            method="POST"
            class="formCadastroEscola"
            @submit.prevent="register"
          >
            <div class="form-group mb-5">
              <span class="formWrap">
                <input
                  id="email"
                  type="email"
                  value=""
                  name="email"
                  class="form-control"
                  :class="{ 'is-invalid': isSubmitted && $v.form.email.$error }"
                  placeholder="*Email do Voluntário"
                  v-model="form.email"
                  autocomplete="off"
                />
                <div v-if="isSubmitted && $v.form.password.$error" class="invalid-feedback">
                  <span v-if="!$v.form.email.required">Informe um email</span>
                  <span v-if="!$v.form.email.email">Email invalido email</span>
                </div>
              </span>
            </div>
            <div class="form-group mb-5">
              <span class="formWrap">
                <input
                  id="password"
                  type="password"
                  value=""
                  name="password"
                  class="form-control"
                  :class="{ 'is-invalid': isSubmitted && $v.form.password.$error }"
                  placeholder="*senha do Voluntário"
                  v-model="form.password"
                  autocomplete="off"
                />
                <div v-if="isSubmitted && $v.form.password.$error" class="invalid-feedback">
                  <span v-if="!$v.form.password.required">Informe uma senha</span>
                  <span v-if="!$v.form.password.minLength">Informe uma senha de 6 carcteres</span>
                </div>
              </span>
            </div>
             <div class="form-group mb-5">
              <span class="formWrap">
                <input
                  id="passwordConfirm"
                  type="password"
                  value=""
                  name="passwordConfirm"
                  class="form-control"
                  :class="{ 'is-invalid': isSubmitted && $v.form.passwordConfirm.$error }"
                  placeholder="*Repita a senha "
                  v-model="form.passwordConfirm"
                  autocomplete="off"
                />
                <div v-if="isSubmitted && $v.form.passwordConfirm.$error" class="invalid-feedback">
                  <span v-if="!$v.form.passwordConfirm.required">repita a senha</span>
                  <span v-if="!$v.form.passwordConfirm.sameAsPassword">Senha não confere</span>
                </div>
              </span>
            </div>
            <input type="hidden" name="name"  hidden>
            <div class="row"></div>
            <button id="next-1" class="btn b-block btn-full btn-laranja" type="submit">
              Cadastrar
            </button>
            <span class="mt-4 d-block text-center"
              >Ao se cadastrar você estará concordando com
              <a href="#">Termos e Condições</a></span
            >
          </form>
          <!--form-->
        </div>
        <!--box cadastro-->
      </div>
      <!--col-4-->
    </div>
    <!--row-->
  </div>
</template>

<script>
import Layout from "../Layout/Layout.vue";
import { required, minLength, sameAs, between, email } from "vuelidate/lib/validators";
export default {
  props: {
    tipo: {
      type: String,
    },
  },

  data() {
    return {

      form: {
        email: "",
        password: "",
        passwordConfirm: "",
        tipo: this.tipo,
        name: '',
      },
      isSubmitted: false,
    };
  },
  validations: {
    form: {
      email: {
        required,
        email,
      },
      password: {
        required,
       minLength: minLength(6)
      },
       passwordConfirm: {
        required,
       sameAsPassword: sameAs('password')
      },
    },
  },
  methods: {
    register() {
      this.isSubmitted = true;
      this.$v.$touch();
      if (this.$v.$invalid) {
        return;
      }
      this.form.name = this.form.email;
       var user = this.$inertia.post("/register", this.form);
       
       
    },
  },
};
</script>

<style src="./style.scss" lang="scss" scoped></style>
