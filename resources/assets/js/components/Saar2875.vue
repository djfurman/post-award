<template>
  <div id="dd2875" class="container">
    <!-- Title -->
    <section class="section">
      <h1 class="title is-centered">SYSTEM AUTHORIZATION ACCESS REQUEST (SAAR)</h1>
    </section>

    <!-- Privacy Act -->
    <section class="section">
      <h2 class="subtitle is-centered">Privacy Act Statement</h2>
      <div class="columns">
        <div class="column is-one-quarter">
          <h3>Authority</h3>
        </div>
        <div class="column">
          <div class="content">Executive Order 10450, 9397; and Public Law 99-474, the Computer Fraud and Abuse Act.</div>
        </div>
      </div>
      <div class="columns">
        <div class="column is-one-quarter">
          <h2>Principle Purpose</h2>
        </div>
        <div class="column">
          <div class="content">To record names, signatures and other identifiers for the purpose of validating the trustworthiness of individuals requesting access to Daprtment of Defense (DoD) systems and information. Note: Records may be maintained in both electronic and/or paper form.</div>
        </div>
      </div>
      <div class="columns">
        <div class="column is-one-quarter">
          <h3>Disclosure</h3>
        </div>
        <div class="column">
          <div class="content">Disclosure of this infromation is voluntary; however, failure to provide the requested information may impede, delay or prevent further processing of this request.</div>
        </div>
      </div>
    </section>

    <!-- Request -->
    <section class="section">
      <div class="columns">
        <div class="column">
          <h3>Type of Request</h3>
        </div>

        <div class="column">
          <div class="field is-grouped">
            <div class="control">
              <input type="checkbox" v-model="request.type.initial"> Initial
              <input type="checkbox" v-model="request.type.modification"> Modification
              <input type="checkbox" v-model="request.type.deactivation"> Deactivate
            </div>
          </div>
        </div>

        <div class="column">
          <div class="field">
            <label class="label">User Id</label>
            <div class="control">
              <input type="text" class="input" placeholder="User ID here">
            </div>
          </div>
        </div>

        <div class="column">
          <div class="field">
            <label class="label">Date (YYYYMMDD)</label>
            <input type="text" class="input" v-model="request.date" disabled="true">
          </div>
        </div>
      </div>

      <div class="columns">
        <div class="column is-two-thirds">
          <div class="field">
            <label class="label">System Name (Platform or Applications)</label>
            <input type="text" class="input" v-model="request.system.name" disabled="true">
          </div>
        </div>
        <div class="column is-one-third">
          <div class="field">
            <label class="label">Location (Physical Location of System)</label>
            <input type="text" class="input" v-model="request.system.location" disabled="true">
          </div>
        </div>
      </div>
    </section>

    <!-- Identification -->
    <section>
      <div class="columns">
        <div class="column">
          <h2 class="subtitle is-centered"><strong>Part 1</strong> (To be completed by Requestor)</h2>
        </div>
      </div>

      <div class="columns">
        <div class="column">
          <label class="label">Name (Last, First, Middle Initial)</label>
          <input type="text" class="input" v-model="identification.name">
        </div>
        <div class="column">
          <label class="label">Organization</label>
          <input type="text" class="input" v-model="identification.organization">
        </div>
      </div>

      <div class="columns">
        <div class="column">
          <label class="label">Office Symbol/Department</label>
          <input type="text" class="input" v-model="identification.department">
        </div>
        <div class="column">
          <label class="label">Phone</label>
          <input type="text" class="input" v-model="identification.phone">
        </div>
      </div>

      <div class="columns">
        <div class="column">
          <label class="label">Official E-Mail Address</label>
          <input type="email" class="input" v-model="identification.email">
        </div>
        <div class="column">
          <div class="columns">
            <div class="column">
              <label class="label">Job Title</label>
              <input type="text" class="input" v-model="identification.job.title">
            </div>
            <div class="column">
              <label class="label">Grade/Rank</label>
              <input type="text" class="input" v-model="identification.job.rank">
            </div>
          </div>
        </div>
      </div>

      <div class="columns">
        <div class="column">
          <label class="label">Official Mailing Address</label>
          <input type="text" class="input" v-model="identification.mailing_address.street">
          <input type="text" class="input" v-model="identification.mailing_address.line_two">
          <div class="columns">
            <div class="column">
              <input type="text" class="input" v-model="identification.mailing_address.city">
            </div>
            <div class="column">
              <input type="text" class="input" v-model="identification.mailing_address.state">
            </div>
            <div class="column">
              <input type="text" class="input" v-model="identification.mailing_address.postal">
            </div>
          </div>
          <input type="text" class="input" v-model="identification.mailing_address.country">
          <input type="text" class="input" v-model="identification.mailing_address.planet">
        </div>

        <div class="column">
          <label class="label">Citizenship</label>
          <div class="columns">
            <div class="column">
              <input type="checkbox" v-model="identification.citizenship.us"> US
              <input type="checkbox" v-model="identification.citizenship.fn"> FN
              <input type="checkbox" v-model="identification.citizenship.other"> Other
            </div>
          </div>
        </div>

        <div class="column">
          <label class="label">Designation of Person</label>
          <div class="columns">
            <div class="column">
              <input type="checkbox" v-model="identification.designation.military"> Military
              <input type="checkbox" v-model="identification.designation.civilian"> Civilian
              <input type="checkbox" v-model="identification.designation.contractor"> Contractor
            </div>
          </div>
        </div>
      </div>

      <div class="column">
        <label class="label">IA Training and Awareness Certification Requirements (Complete as required for user or functional level access.)</label>
        <div class="columns">
          <div class="column">
            <input type="checkbox" v-model="training.information_assurance.complete"> I have completed Annual Information Awareness Training.
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Date (YYYYMMDD)</label>
              <input type="text" class="input" v-model="training.information_assurance.date_completed">
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="columns">
      <div class="column">
        <button class="button is-primary" @click="sendToSupervisor">Submit for Supervisor Review</button>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  data() {
    return {
      request: {
        type: {
          initial: false,
          modification: false,
          deactivation: false
        },
        date: moment().format('YYYYMMDD'),
        system: {
          name: 'FACET-Acq Post Award',
          location: 'Anywhere you need it'
        }
      },
      identification: {
        name: '',
        organization: '',
        department: '',
        phone: '',
        email: '',
        job: {
          title: '',
          rank: ''
        },
        mailing_address: {
          street: '',
          line_two: '',
          city: '',
          state: '',
          postal: '',
          country: 'USA',
          planet: 'Earth'
        },
        citizenship: {
          us: false,
          fn: false,
          other: false
        },
        designation: {
          military: false,
          civilian: false,
          contractor: false
        }
      },
      training: {
        information_assurance: {
          complete: false,
          date_completed: ''
        }
      },
      justification: {
        reason: '',
        type: {
          authorized: false,
          privilaged: false
        },
        classification: {
          unclassified: true,
          classified: false,
          category: '',
          other: false,
          other_description: ''
        },
        need_to_know: true,
        expiration: {
          contract_number: '',
          date: ''
        },
        supervisor: {
          name: '',
          organization: '',
          department: '',
          phone: '',
          email: ''
        },
        owner: {
          phone: ''
        },
        ioa: {
          organization: '',
          department: '',
          phone: ''
        },
        additional_details: ''
      },
      investigation: {
        type: '',
        date: '',
        clearance: '',
        it_designation: {
          level_1: false,
          level_2: false,
          level_3: false
        },
        verified_by: {
          name: '',
          phone: ''
        }
      },
      attestation: {
        applicant: false,
        manager: false,
        owner: false,
        ioa: false
      }
    };
  },

  methods: {
    sendToSupervisor() {
      this.attestation.applicant = true;
      window.axios.post('/api/v1/access/request', this.$data)
        .then(response => {
          console.log(response.data);
          window.flash('Your request has been successfully submitted to your supervisor');
        })
        .catch(error => {
          console.log(error);
          window.flash('Your request failed to post');
        })
    },
    populateFromJson(saar) {
      this.request = saar.request;
      this.identification = saar.identification;
      this.training = saar.training;
      this.justification = saar.justification;
      this.investigation = saar.investigation;
      this.attestation = saar.attestation;
    }
  },

  created() {
    window.axios.get('/api/v1/access/temp')
      .then(response => {
        this.populateFromJson(response.data);
      })
  }
};
</script>
