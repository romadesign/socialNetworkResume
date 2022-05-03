<template>
  <div class="container">
    <div class="vue-tabs-">
      <Tabs >
        <Tab selected="true" title="home">
          <div class="tab-pane">
            <VueFormGenerator
              :schema="schemas.basics"
              :model="resume.content.basics"
              :options="options"
            />
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
//componente tabs
import Tabs from "./tabs/Tabs.vue";
import Tab from "./tabs/Tab.vue";
//Schemas Json
import basics from "./schema/basics/basics";

//vuefromGenerator
import { component as VueFormGenerator } from "vue-form-generator";
import 'vue-form-generator/dist/vfg.css';
export default {
  name: "resume-form",

  components: {
    Tabs,
    Tab,
    VueFormGenerator,
  },

  data() {
    return {
      resume: {
        title: "",
        content: {
          basics: {},
        },
      },

      schemas: {
        basics,
      },

      options: {
        validateAfterLoad: true,
        validateAfterChanged: true,
        validateAsync: true,
      },
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>

<style  scoped>
</style>