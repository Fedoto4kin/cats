<template>
  <div id="app">
    <div class="container">
      <div class="heading">
      <h2>Stray Cats <b-button size="lg" @click="read">SHUFFLE</b-button></h2>
    </div>

      <div class="row" >
         <cat-component
      v-for="cat in cats"
      v-bind="cat"
      :key="cat.id"
      @update="update"
      @delete="del"
    ></cat-component>

      </div>


    </div>
  </div>

</template>
<script>
  function Cat({ id, name, pic}) {
    this.id = id;
    this.name = name;
    this.pic = pic;
  }

  import axios from 'axios';
  import CatComponent from './CatComponent.vue';

  export default {
    data() {
      return {
        cats: []
      }
    },
    methods: {

      async read() {
        this.cats = []
        axios.get('/api/cats').then(res => {
          res.data.forEach(cat => this.cats.push(new Cat(cat)));
        });
      },
      async update(id, color) {
        // To do
      },
      async del(id) {
        // To do
      }
    },
    created() {
        this.read();
    },
    components: {
      CatComponent
    }
  }
</script>