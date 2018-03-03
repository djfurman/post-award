<template>
  <section class="section">
    <h1 class="title">Inbox</h1>

    <div class="container">
      <div class="columns">
        <div class="column is-one-third" v-for='item in items' :key='item.id'>
          <workflow-item
            :action='item.action'
            :name='item.name'
            :summary='item.summary'
            :added_at='item.added_at'></workflow-item>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import WorkflowItem from './WorkflowItem';
export default {
  components: {
    WorkflowItem
  },

  created() {
    this.fetchInboxItems();
  },

  data() {
    return {
      items: []
    }
  },

  methods: {
    fetchInboxItems() {
      // todo swap this for a database query using axios
      this.items.push({
          id: 1,
          action: 'Supervisor Approval',
          name: 'John Doe',
          summary: 'Super Admin Access',
          added_at: '2018-02-15T13:21:12-05:00'
        });
    }
  }
}
</script>
