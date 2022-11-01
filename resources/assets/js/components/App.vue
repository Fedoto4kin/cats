<template>
  <div id="app">
    <div class="container">

      <div class="row">

        <div class="col-6">
          <div class="heading my-5">
            <h2>Stray Cats <b-button @click="read">SHUFFLE</b-button></h2>
          </div>

          <div class="row" >
            <cat-component
                v-for="cat in strayCats"
                v-bind="cat"
                :key="cat.uuid"
                @adopt="adopt"
            ></cat-component>
          </div>
        </div>
        <div class="col-6">
          <div class="heading my-5">
            <h2>My Cats</h2>
          </div>

          <div class="row" >
            <cat-component
                v-for="cat in cats"
                v-bind="cat"
                :key="cat.uuid"
                @pet="pet"
            ></cat-component>
          </div>
        </div>

      </div>
    </div>
  </div>

</template>
<script>
function Cat({ uuid, name, pic, home=false}) {
  this.uuid = uuid;
  this.name = name;
  this.pic = pic;
  this.home = home;
}

import axios from 'axios';
import CatComponent from './CatComponent.vue';

export default {
  data() {
    return {
      strayCats: [],
      cats: [],
    }
  },
  // mounted() {
  //   if (localStorage.getItem('cats')) {
  //     try {
  //       this.cats = JSON.parse(localStorage.getItem('cats'));
  //     } catch(e) {
  //       localStorage.removeItem('cats');
  //     }
  //   }
  // },
  methods: {

    async read() {
      this.strayCats = []
      axios.get('/api/cats').then(res => {
        res.data.forEach(cat => this.strayCats.push(new Cat(cat)));
      });
    },

    adopt(cat) {
      let i = this.strayCats.map(item => item.uuid).indexOf(cat.uuid)
      this.cats.push(
          new Cat({
            'uuid': cat.uuid,
            'name': cat.name,
            'pic': cat.pic,
            'home': true
          })
      );
      this.strayCats.splice(i, 1);
      //  this.saveCats();

    },
    saveCats() {
      //todo: save
    },
    pet() {
      var audio = new Audio('sounds/purring.wav');
      audio.play();
    },
  },
  created() {
    this.read();
  },
  components: {
    CatComponent
  }
}
</script>