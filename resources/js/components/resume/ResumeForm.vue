<template>
  <div class="container">
    <div class="vue-tabs-">
      <Tabs>
        <Tab selected="true" title="home">
          <div class="tab-pane">
            <input placeholder="hello" />
          </div>
        </Tab>
        <Tab title="profiles">
          <input placeholder="as" />
        </Tab>
      </Tabs>
    </div>
  </div>
</template>

<script>
import Tabs from "./tabs/Tabs.vue";
import Tab from "./tabs/Tab.vue";
export default {
  name: "resume-form",

  components: {
    Tabs,
    Tab,
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>

<style  scoped>
</style>