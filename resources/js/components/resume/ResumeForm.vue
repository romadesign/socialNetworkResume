<template>
  <div class="container">
    <div class="vue-tabs-">
      <Tabs >
        <Tab selected="true" title="Basics">
            <VueFormGenerator
              :schema="schemas.basics"
              :model="resume.content.basics"
              :options="options"
            />
            <VueFormGenerator
              :schema="schemas.location"
              :model="resume.content.basics.location"
              :options="options"
            />
        </Tab>
      </Tabs>
    </div>
  </div>
</template>

<script>
//component image
import FieldResumeImage from './Image/FieldResumeImage.vue'
//componente tabs
import Tabs from "./tabs/Tabs.vue";
import Tab from "./tabs/Tab.vue";
//Schemas Json
import basics from "./schema/basics/basics";
import location from "./schema/basics/location";

//vuefromGenerator
import { component as VueFormGenerator } from "vue-form-generator";
import 'vue-form-generator/dist/vfg.css';
export default {
  name: "resume-form",

  components: {
    Tabs,
    Tab,
    VueFormGenerator,
    FieldResumeImage,
  },

  data() {
    return {
      resume: {
        title: "",
        content: {
          basics: {
            location: {}
          },
        },
      },

      schemas: {
        basics,
        location,
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