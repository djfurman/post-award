<template>
  <section class="section">
    <!-- Title -->
    <div class="columns">
      <div class="column">
        <h3 class="subtitle">{{ role }} Endorsement</h3>
      </div>
    </div>
    <!-- Identification -->
    <div class="columns">
      <div class="column is-one-third">
        <!-- Name Breakdown -->
        <div class="columns">
          <div class="column is-one-third">
            <label class="label">Last Name (Surname)</label>
            <input type="text" class="input" placeholder="Last Name or Surname" v-model="name.sur">
          </div>
          <div class="column is-one-third">
            <label class="label">First Name (Given)</label>
            <input type="text" class="input" placeholder="First or Given name" v-model="name.given">
          </div>
          <div class="column is-one-third">
            <label class="label">Middle Initial</label>
            <input type="text" class="input" placeholder="Middle Initial" v-model="name.middle_initial">
          </div>
        </div>
      </div>
      <!-- Signature -->
      <div class="column is-one-third">
        <label class="label">Signature</label>
        <input type="checkbox" disabled="true" v-model="signed"> Signed
      </div>
      <div class="column is-one-third">
        <label class="label">Signature Date</label>
        <input type="text" class="input" disabled="true" v-model="sign_date">
      </div>
    </div>
    <!-- Supervisor Contact -->
    <div class="columns is-grouped">
      <div class="column is-one-third">
        <div class="columns">
          <div class="column is-half">
            <label class="label">Organization</label>
            <input type="text" class="input" v-model="organization">
          </div>
          <div class="column is-half">
            <label class="label">Department</label>
            <input type="text" class="input" v-model="department">
          </div>
        </div>
      </div>
      <div class="column is-one-third">
        <label class="label">Email Address</label>
        <input type="email" class="input" v-model="email">
      </div>
      <div class="column is-one-third">
        <label class="label">Phone Number</label>
        <input type="tel" class="input" v-model="phone">
      </div>
    </div>
    <div class="columns">
      <div class="field is-grouped">
        <p class="control">
          <button class="button is-success is-rounded" @click="sign()">Sign</button>
        </p>
        <p class="control">
          <button class="button is-danger is-rounded" @click="reject()">Reject</button>
        </p>
      </div>
    </div>
  </section>
</template>

<script>
import moment from 'moment';
export default {
  props: ['role'],

  created() {
    if(this.role) {
      this.role_name = this.role;
    }

    // todo pull name & email from active PKI
  },

  computed: {
    signed() {
      if(this.sign_date) {
        return true;
      }

      return false;
    }
  },

  data() {
    return {
      department: '',
      email: '',
      name: {
        given: '',
        middle_initial: '',
        sur: ''
      },
      organization: '',
      phone: '',
      role_name: '',
      sign_date: ''
    };
  },

  methods: {
    reject() {
      // todo add something to get a reason
      // todo post to server that this is killed and why
      // todo notify upstream approvers (including applicant) why it was rejected
      window.flash(this.rejectMessage);
    },

    rejectMessage() {
      return 'This has been rejected';
    },

    sign() {
      // todo digitally sign with the PKI and include current state of parent
      // todo post this signed JSON to server
      this.sign_date = moment().format();
      // todo send signature to the server
      window.flash(this.signMessage());
      // todo handle server error
    },

    signMessage(){
      return `${this.role.replace("_", " ").toUpperCase()} has successfully signed`;
    }
  }
};
</script>
