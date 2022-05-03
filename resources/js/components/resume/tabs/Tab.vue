<template>
   <div class="tab-pane" :class="{ 'active': active }">
      <slot></slot>
    </div>

</template>

<script>
export default {
  name: "Tab",

  data() {
    return {
      active: this.active
    };
  },

  props: {
    active: {
      type: String,
      required: '',
    },
    title: {
      type: String,
      required: true,
    },
  },
};
</script>

<style scoped>
.tab-pane {
  display: none;
}
.tab-pane.active {
  display: block;
}
</style>