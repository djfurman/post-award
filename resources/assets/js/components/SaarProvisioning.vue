lear<template>
  <div class="columns">
    <div class="column is-one-fifth">
      <label class="label">Title</label>
      <input type="text" class="input" disabled="true">
    </div>
    <div class="column">
      <label class="label">{{ section_label }}</label>
      <input type="text" class="input" disabled="true" v-model="section_value">
    </div>
    <div class="column">
      <label class="label">{{ code_label }}</label>
      <input type="text"  class="input" disabled="true" v-model="code_value_value">
    </div>
  </div>
</template>

<script>
export default {
  created() {
    this.section_label = this.section;
    this.section_value = this.value;
    this.code_label = this.code;
    this.code_value_value = this.code_value;
  },

  data() {
    return {
      section_label: '',
      section_value: '',
      code_label: '',
      code_value_value: ''
    }
  },

  props: {
    section: {
      type: String,
      default: ''
    },
    value: {
      type: String,
      default: ''
    },
    code: {
      type: String,
      default: 'Account Code'
    },
    code_value: {
      type: String,
      default: ''
    },
  }
}
</script>
