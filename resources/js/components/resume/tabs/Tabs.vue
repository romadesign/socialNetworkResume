<template>
  <article>
    <nav>
      <div class="nav nav-tabs">
        <button
          class="nav-link"
          v-for="(tab, index) in tabs"
          :key="index"
          :class="{ 'is-active': tab.isActive }"
          @click="selectTab(tab)"
        > 
          {{ tab.title }}
        </button>
        
      </div>
    </nav>
    <div class="tab-content">
      <slot></slot>
    </div>
  </article>
</template>

<script>
export default {
  title: "Tabs",
  components: {},
  data() {
    return {
      tabs: [],
    };
  },
 
  created: function () {
    this.tabs = this.$children;
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