<template>
  <div v-show="isActive">
    <slot></slot>
  </div>
</template>

<script>
export default {
  title: "Tab",

  data: () => {
    return {
      isActive: false,
    };
  },

  props: {
    title: {
      type: String,
      required: true,
    },
    selected: {
      default: false,
    },
  },
  mounted() {
    this.isActive = this.selected;
  },
};
</script>

<style scoped>
</style>