<template>
  <div class="navv">
    <inertia-link href="home">Home</inertia-link>
    <inertia-link href="cadastro">Cadastro</inertia-link>
     <inertia-link href="register">Register</inertia-link>
    <div>
        <slot />
    </div>
  </div>
</template>

<script>
export default {};
</script>
<style >
.navv{
  background-color: red;
  margin-top: 100px;
}
</style>
