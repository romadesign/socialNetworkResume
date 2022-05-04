<template>
  <div>
    <nav>
      <div class="nav nav-tabs d-flex justify-content-around">
        <button
          class="nav-link"
          v-for="(tab, index) in tabs"
          :key="index"
          :class="{ 'is-active': tab.isActive }"
          @click="selectTab(tab)"
        > 
          <i :class="tab.icon"></i>
          {{ tab.title }}
        </button>
      </div>
    </nav>
    <div class="tab-content d-flex justify-content-around">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  title: "Tabs",
  components: {},
  props: {
    // icon: {
    //   type: String,
    //   required: true,
    // },
  },
  data() {
    return {
      tabs: [],
      icons: [],
    };
  },

  created: function () {
    this.tabs = this.$children;
    this.icons = this.$children;
  },
  methods: {
    selectTab(selectedTab) {
      this.tabs.forEach((tab) => {
        tab.isActive = tab.title === selectedTab.title;
      });
    },
  },
};
</script>

<style scoped>
.nav-link {
  cursor: pointer;
}
.nav-link:hover {
  color: red;
}
.is-active {
  color: red;
}
</style>