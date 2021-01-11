<template>
  <b-card
    :title="name"
    style="max-width: 11rem;"
    class="mb-2"
    :img-src="image"  >
    <b-button @click="adopt"  size="sm" class="pull-right">Adopt</b-button>
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
        console.log(this)
        //this.$emit('delete', this.id);
      }
    },
    props: ['id', 'name', 'pic']
  }
</script>
<style>

</style>