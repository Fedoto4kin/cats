<template>
  <b-card
    :title="name"
    style="max-width: 11rem;"
    class="mb-2"
    :img-src="image"  >
    <b-button @click="adopt" size="sm"  v-if="!home" class="pull-right">Adopt</b-button>
    <b-button @click="pet" size="sm" variant="outline-primary" v-if="home" class="pull-right">Pet the cat</b-button>

  </b-card>
</template>
<script>
  export default {
    computed: {
      image() {
        return `/${this.pic}`;
      }
    },
    methods: {
      update(val) {
        this.$emit('update', this.id, val.target.selectedOptions[0].value);
      },
      adopt() {
        this.$emit('adopt', this);
      },
      pet() {
        this.$emit('pet', this);
      }
    },
    props: ['uuid', 'name', 'pic', 'home']
  }
</script>
<style>

</style>