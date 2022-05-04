<template>
  <div class="container">
    <div class="vue-tabs-">
      <Tabs>
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
        <Tab title="Profile">
          <DynamicForm
            title="Profile"
            self="profiles"
            :model="resume.content.basics"
            :schema="schemas.profiles"
          />
        </Tab>
        <Tab title="Work">
          <DynamicForm
            title="Work"
            self="work"
            :model="resume.content"
            :schema="schemas.work"
            :subforms="subforms.work"
          />
        </Tab>
        <Tab title="Education">
          <DynamicForm
            title="Education"
            self="education"
            :model="resume.content"
            :schema="schemas.education"
            :subforms="subforms.education"
          />
        </Tab>
        <Tab title="Skills">
          <DynamicForm
            title="Skills"
            self="skills"
            :model="resume.content"
            :schema="schemas.skills"
            :subforms="subforms.skills"
          />
        </Tab>
        <Tab title="Awards">
          <DynamicForm
            title="Awards"
            self="awards"
            :model="resume.content"
            :schema="schemas.awards"
            :subforms="subforms.awards"
          />
        </Tab>
      </Tabs>
    </div>
  </div>
</template>

<script>
//component image and dynamicForm
import FieldResumeImage from "./Image/FieldResumeImage.vue";
import DynamicForm from "./Dynamic/DynamicForm.vue";
import Form from "./Dynamic/Form.vue";

//componente tabs
import Tabs from "./tabs/Tabs.vue";
import Tab from "./tabs/Tab.vue";
//Schemas Json
import basics from "./schema/basics/basics";
import location from "./schema/basics/location";
import profiles from "./schema/basics/profiles";
import work from "./schema/work";
import education from "./schema/education";
import skills from "./schema/skills";
import awards from "./schema/awards";

//vuefromGenerator
import { component as VueFormGenerator } from "vue-form-generator";
import "vue-form-generator/dist/vfg.css";
export default {
  name: "resume-form",

  components: {
    Tabs,
    Tab,
    VueFormGenerator,
    FieldResumeImage,
    DynamicForm,
    Form,
  },

  data() {
    return {
      resume: {
        title: "",
        content: {
          basics: {
            location: {},
          },
        },
      },

      schemas: {
        basics,
        location,
        profiles,
        work,
        education,
        skills,
        awards,
      },

      //subComponentes Form
      subforms: {
        work: [
          {
            component: Form,
            props: {
              title: "Highlights",
              self: "highlights",
              placeholder: 'Started the company"',
            },
          },
        ],
        education: [
          {
            component: Form,
            props: {
              title: "Courses",
              self: "courses",
              placeholder: "DB1101 - Basic SQL",
            },
          },
        ],
        skills: [
          {
            component: Form,
            props: {
              title: "Keywords",
              self: "keywords",
              placeholder: "Javascript",
            },
          },
        ],
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