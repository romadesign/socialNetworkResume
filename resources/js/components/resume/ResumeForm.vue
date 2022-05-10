<template>
  <div class="container">
    <div class="vue-tabs-">
      <Alert
        v-if="alert.messages.length !== 0"
        :messages="alert.messages"
        :type="alert.type"
      />
      <div class="row d-flex">
        <div class="form-group col-md-8">
          <input
            v-model="resume.title"
            placeholder="Resume title"
            required
            autofocus
            class="form-control w-100"
          />
        </div>
        <div class="col-md-4">
          <button class="btn btn-success btn-block" @click="submit()">
            submit <i class="fa fa-upload"></i>
          </button>
        </div>
      </div>
      <Tabs>
        <Tab selected="true" title="Basics" icon="fa fa-user">
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
        <Tab title="Profile" icon="fa fa-users">
          <DynamicForm
            title="Profile"
            self="profiles"
            :model="resume.content.basics"
            :schema="schemas.profiles"
          />
        </Tab>
        <Tab title="Work" icon="fa fa-briefcase">
          <DynamicForm
            title="Work"
            self="work"
            :model="resume.content"
            :schema="schemas.work"
            :subforms="subforms.work"
          />
        </Tab>
        <Tab title="Education" icon="fa fa-graduation-cap">
          <DynamicForm
            title="Education"
            self="education"
            :model="resume.content"
            :schema="schemas.education"
            :subforms="subforms.education"
          />
        </Tab>
        <Tab title="Skills" icon="fa fa-lightbulb">
          <DynamicForm
            title="Skills"
            self="skills"
            :model="resume.content"
            :schema="schemas.skills"
            :subforms="subforms.skills"
          />
        </Tab>
        <Tab title="Awards" icon="fa fa-trophy">
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
import jsonresume from "./jsonresume";
import Alert from "../reusable/Alert";

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
    education,
    awards,
    skills,
    jsonresume,
    Alert,
  },

  props: {
    update: false,
    resume: {
      type: Object,
      default: () => ({
        id: null,
        title: "Resume Title",
        content: jsonresume,
      }),
    },
  },

  data() {
    return {
      // resume: {
      //   title: "",
      //   content: {
      //     basics: {
      //       location: {},
      //     },
      //   },
      // },
      alert: {
        type: "warning",
        messages: [],
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
  methods: {
    async submit() {
      try {
        const res = this.update
          ? await axios.put(
              route("resumes.update", this.resume.id),
              this.resume
            )
          : await axios.post(route("resumes.store"), this.resume);
        console.log(res);
        window.location = "/home";
      } catch (e) {
        console.log(e.response.data);
        this.alert.messages = ["error", "asd"];
      }
    },
  },
};
</script>

<style  scoped>
</style>