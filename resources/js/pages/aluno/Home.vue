<template>
  <div class="hero bg-primary text-white">
    <div class="hero-inner">
      <h2>{{this.teste }}</h2>
      
      
    </div>
  </div>
</template>

<script>
export default {
  props: {
    user: Object,
  },
  data() {
    return {
        teste:'',
    }
  },
};
</script>
