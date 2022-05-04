<template>
  <div class="my-2 w-100">
    <div v-for="(form, i) in target[prop]" :key="i" class="row mb-3">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div>
              <h3>{{ title }} #{{ i }}</h3>
            </div>
            <div>
              <button class="btn btn-danger btn-block" @click="remove(i)">
                Delete <i class="fa fa-trash"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <VueFormGenerator
              :schema="schema"
              :model="target[prop][i]"
              :options="{
                validateAfterLoad: true,
                validateAfterChanged: true,
                validateAsync: true,
              }"
            />
						<div v-for="(subform, j) in subforms" :key="j">
							<component 
							 :is="subform.component"
							 v-bind="{ model:target[prop][i], ...subform.props}"
							/>
						</div>
          </div>
        </div>
      </div>
    </div>
    <button class="btn btn btn-primary" @click="add()">Add new</button>
  </div>
</template>

<script>
//vuefromGenerator
import { component as VueFormGenerator } from "vue-form-generator";
import "vue-form-generator/dist/vfg.css";
import mixins from "./mixin";

export default {
  name: "DynamicForm",
  mixins: [mixins],
  components: {
    VueFormGenerator,
  },
  props: {
    schema: {
      type: Object,
      required: true,
    },
		subforms: {
			type: Array,
			required: false,
			default: () => [],
		}
  },
};
</script>

<style>
</style>