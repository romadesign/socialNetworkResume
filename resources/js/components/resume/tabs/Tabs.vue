<template>
  <div class="tabs">
    <ul class="tab-links">
      <li
        v-for="tab in tabs"
        :key="tab[0]"
        :class="{ active: active }"
        @click="setActive(tab)"
      >
        {{ tab.title }}
      </li>
    </ul>
    <slot></slot>
  </div>
</template>

<script>
export default {
  name: "Tabs",
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
    setActive(tab) {
      this.tabs.forEach(function (t) {
        t.active = t === tab;
      });
    },
  },
};
</script>

<style scoped>
.tab-links {
  display: flex;
  align-items: center;
  margin: 0;
  padding: 0;
  list-style: none;
}
.tab-links li {
  position: relative;
  padding: 12px 24px;
  cursor: pointer;
  user-select: none;
}
li::before {
  position: absolute;
  left: 0;
  top: 100%;
  width: 100%;
  height: 2px;
  background: dodgerblue;
  opacity: 0;
  transition: all 0.3s ease;
  content: "";
}
li.active {
  color: dodgerblue;
}
li.active::before {
  opacity: 1;
}
</style>