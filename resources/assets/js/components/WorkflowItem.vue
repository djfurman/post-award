<template>
  <div class="card">
    <header class="card-header">
      <p class="card-header-title">
        {{ action_needed }}
      </p>
      <a class="card-header-icon" aria-label="more options">
        <span class="icon">
          <i class="fas fa-angle-down" aria-hidden="true"></i>
        </span>
      </a>
    </header>
    <div class="card-content">
      <div class="content">
        {{ item.summary }} for {{ item.name }}
      </div>
      <div class="content">
        <span class="icon is-small"><i class="fas fa-calendar-plus"></i></span> {{ duration }}
      </div>
    </div>
    <footer class="card-footer">
      <a href="#" class="card-footer-item">Open</a>
      <a href="#" class="card-footer-item">Dismiss</a>
    </footer>
  </div>
</template>

<script>
import moment from 'moment';
export default {
  computed: {
    duration() {
      return this.item.added_at.fromNow();
    }
  },

  created() {
    this.action_needed = this.action;

    if (this.added_at) {
      this.item.added_at = moment(this.added_at);
    } else {
      this.item.added_at = moment();
    }

    this.item.name = this.name;

    this.item.summary = this.summary;
  },

  data() {
    return {
      action_needed: '',
      item: {
        name: '',
        summary: '',
        added_at: moment()
      },
      more_options: []
    }
  },

  props: ['action', 'added_at', 'name', 'summary']
}
</script>

