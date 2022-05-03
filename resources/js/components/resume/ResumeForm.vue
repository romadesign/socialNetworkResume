<template>
  <div class="container">
  
    <div class="vue-tabs-">
        <Tabs>
        <Tab active="true" title="home">
            <input placeholder="hello"/>
        </Tab>
         <Tab title="profiles">
           <input placeholder="as"/>
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
    .tab-linls {
        display: flex;
        align-items: center;
        margin: 0;
        padding: 0;
        list-style: none;
    }


</style>