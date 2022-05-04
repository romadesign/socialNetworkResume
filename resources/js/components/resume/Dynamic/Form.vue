<template>
  <div class="card mt-3 mb-3">
    <div class="card-header">{{ title }}</div>

    <div class="card-body">
      <div v-for="(input, i) in target[prop]" :key="i" class="d-flex p-0">
        <div class="col-10">
          <input
            class="form-control"
            type="text"
            v-model="target[prop][i]"
						:placeholder="placeholder"
          />
        </div>
        <div class="col-2 d-flex ms-2">
          <button 
					class="btn btn-danger ms-2"
					@click="remove(i)">
						<i class="fa fa-trash"></i>
					</button>
        </div>
      </div>
			<div>
          <button 
					class="btn btn-primary"
					@click="add()">
						add
					</button>
        </div>
    </div>
  </div>
</template>

<script>
import mixins from './mixin'
export default {
	name: 'Form',
	mixins:	[mixins],

	data() {
		return {
			push: () => '',
		}
	},

	props: {
		placeholder: {
			type: String,
			required: false,
			default: () => '',
		}
	}
};
</script>
