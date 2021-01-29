<template>
  <div class="container">
    <div class="row ajusteRow justify-content-center align-items-center">
      <div class="col-md-4">
        <div class="boxCadastro card align-items-center">
          <img class="logo" src="../../../../public/img/logotipo.png" alt="Spreading" />
          <h3 class="mt-4">Acesso</h3>

          <form
            action=""
            method="POST"
            class="formCadastroEscola"
            @submit.prevent="login"
          >
            <div class="form-group mb-5">
              <span class="formWrap">
                <input
                  id="email"
                  type="email"
                  name="email"
                  class="form-control"
                  :class="{
                    'is-invalid':
                      (isSubmitted && $v.form.email.$error) ||
                      errors.email ||
                      errors.password,
                  }"
                  placeholder="*Email do Voluntário"
                  v-model="form.email"
                  @change="resetaCampo"
                  autocomplete="off"
                />
                <div
                  v-if="
                    (isSubmitted && $v.form.email.$error) ||
                    errors.email ||
                    errors.password
                  "
                  class="invalid-feedback"
                >
                  <span v-if="!$v.form.email.required">Informe um email</span>
                  <span v-if="!$v.form.email.email">Email invalido email</span>
                  <span v-else-if="errors.email || errors.password"
                    >Credenciais invalidas, Verifique email ou senha !</span
                  >
                </div>
              </span>
            </div>

            <div class="form-group mb-5">
              <span class="formWrap">
                <input
                  id="password"
                  type="password"
                  name="password"
                  class="form-control"
                  :class="{
                    'is-invalid': isSubmitted && $v.form.password.$error,
                  }"
                  placeholder="*senha do Voluntário"
                  v-model="form.password"
                  autocomplete="off"
                />
                <div
                  v-if="isSubmitted && $v.form.password.$error"
                  class="invalid-feedback"
                >
                  <span v-if="!$v.form.password.required">Informe uma senha</span>
                  <span v-if="!$v.form.password.minLength"
                    >Informe uma senha de 6 carcteres</span
                  >
                </div>
              </span>
            </div>

            <div class="submitTerms mb-4">
              <button class="btn b-block btn-full btn-laranja" type="submit">
                Acessar
              </button>
              <span class="mt-4 d-block text-center"
                ><a href="">Problemas em acessar?</a></span
              >
            </div>
            <span class="mt-5 d-block text-center"
              >Não possui uma conta?
              <inertia-link href="/">Cadastre-se aqui!</inertia-link></span
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
import { required, minLength, sameAs, between, email } from "vuelidate/lib/validators";
export default {
  props: {
    errors: Object,
  },
  data() {
    return {
      form: {
        email: "wesleyrob9@hotmail.com",
        password: "hsw@1234",
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
        minLength: minLength(6),
      },
    },
  },
  methods: {
    login() {
      this.isSubmitted = true;
      this.$v.$touch();
      if (this.$v.$invalid) {
        return;
      }

      this.$inertia.post("/login", this.form);
    },
    resetaCampo() {
      this.errors.email = null;
      this.errors.password = null;
    },
  },
};
</script>

<style src="./style.scss" lang="scss" scoped></style>
