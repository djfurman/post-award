<template>
  <div id="dd2875" class="container">
    <section v-if="preSaar" class="section">
      <h1 class="title is-centered">Access Needs</h1>

      <label class="label">User Role</label>
      <div class="columns">
        <div class="column">
          <div class="field control">
            <div class="select is-multiple">
              <select multiple size="groups.available.length" v-model="groups.requested">
                <option v-for="permission in groups.available" :value="permission.name" v-bind:key="permission.name">{{ permission.name }}</option>
              </select>
            </div>
          </div>
        </div>
        <div class="column">
          <button class="button" @click="moveToSaar">Submit</button>
        </div>
      </div>
    </section>

    <div v-if="!preSaar">
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
      <section id="request" class="section">
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
                <input type="text" class="input" placeholder="User ID here" v-model="identification.ldap">
              </div>
            </div>
          </div>

          <div class="column">
            <div class="field">
              <label class="label">Date</label>
              <input type="date" class="input" v-model="request.date" disabled="true">
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

      <section id="identification" class="section">
        <div class="columns">
          <div class="column">
            <h2 class="subtitle is-centered"><strong>Part 1</strong> (To be completed by Requestor)</h2>
          </div>
        </div>

        <div class="columns">
          <div class="column">
            <div class="field">
              <label class="label">Name (Last, First, Middle Initial)</label>
              <div class="columns">
                <div class="column field">
                  <input type="text" class="input" placeholder="Last Name or Surname" v-model="identification.name.sur">
                </div>
                <div class="column field">
                  <input type="text" class="input" placeholder="First or Given Name" v-model="identification.name.given">
                </div>
                <div class="column field">
                  <input type="text" class="input" placeholder="Middle Initial" v-model="identification.name.middle_initial">
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Organization</label>
              <input type="text" class="input" v-model="identification.organization">
            </div>
          </div>
        </div>

        <div class="columns">
          <div class="column">
            <div class="field">
              <label class="label">Office Symbol/Department</label>
              <input type="text" class="input" v-model="identification.department">
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Phone</label>
              <input type="tel" class="input" v-model="identification.phone">
            </div>
          </div>
        </div>

        <div class="columns">
          <div class="column">
            <div class="field">
              <label class="label">Official E-Mail Address</label>
              <input type="email" class="input" v-model="identification.email">
            </div>
          </div>
          <div class="column">
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label class="label">Job Title</label>
                  <input type="text" class="input" v-model="identification.job.title">
                </div>
              </div>
              <div class="column">
                <div class="field">
                  <label class="label">Grade/Rank</label>
                  <input type="text" class="input" v-model="identification.job.rank">
                </div>
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
                <label for="ia_date" class="label">Date</label>
                <input id="ia_date" type="date" class="input" v-model="training.information_assurance.date_completed">
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

    <section id="endorsment" class="section">
        <div class="columns">
          <div class="column">
            <h2 class="subtitle is-centered"><strong>Part 2</strong> Endorsement of Access by Information Owner, User Supervisor or Government Sponsor</h2>
            <span class="content" v-if="identification.designation.contractor">If individual is a contractor - provide company name, contract number, and date of contract expiration.</span>
          </div>
        </div>

        <div class="columns">
          <div class="column field">
            <label class="label">Justification for Access</label>
            <textarea
              class="textarea"
              v-model="justification.reason"
              placeholder="As a [role] in order to [function] for [customer], I need [access level] access to Post-Award"
            ></textarea>
          </div>
        </div>
        <div class="columns">
          <div class="column field is-grouped">
            <label class="label">Type of Access Required:</label>
            <input
              type="checkbox"
              class="checkbox"
              v-model="justification.type.authorized"
              disabled="true"
            > Authorized
            <input
              type="checkbox"
              class="checkbox"
              v-model="justification.type.privilaged"
              disabled="true"
            > Privilaged
          </div>
        </div>
        <div class="columns">
          <div class="column field">
            <div class="label">User requires access to:</div>
            <input
              type="checkbox"
              class="checkbox"
              v-model="justification.classification.unclassified"
            > Unclassified
            <input
              type="checkbox"
              class="checkbox"
              v-model="justification.classification.classified"
            > Classified
            <input
              type="text"
              class="input"
              placeholder="Specify Category"
              v-model="justification.classification.category"
            >
          </div>
        </div>
        <div class="columns">
          <div class="column field">
            <input
              type="checkbox"
              class="checkbox"
              v-model="justification.classification.other"> Other
            <input
              type="text"
              class="input is-primary"
              v-model="justification.classification.other_description">
          </div>
        </div>
        <div class="columns">
          <div class="column is-half">
            <div class="field">
              <label class="label">Verification of Need to Know</label>
              <input
                type="checkbox"
                class="checkbox"
                v-model="justification.need_to_know">
              </div>
          </div>
          <div class="column is-half">
            <div class="field">
              <label for="expire_date" class="label">Access Expiration Date</label>
              <input
                id="expire_date"
                type="date"
                class="input"
                v-model="justification.expiration.date">
              <div id="contractors_only" v-if="identification.designation.contractor">
                <label class="label">Contractors must specify Company Name, Contract Number and Expiration Date</label>
                <label for="contract_number" class="label">Contract Number</label>
                <input
                  id="contract_number"
                  type="text"
                  class="input"
                  v-model="justification.expiration.contract_number">
                <label for="contract_company_name" class="label">Contractor Company Name</label>
                <input
                  id="contract_company_name"
                  type="text"
                  class="input"
                  v-model="justification.expiration.contract_company_name">
              </div>
            </div>
          </div>
        </div>
      </section>
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
        date: moment().format('YYYY-MM-DD'),
        system: {
          name: 'FACET-Acq Post Award',
          location: 'Anywhere you need it'
        }
      },
      identification: {
        ldap: '',
        mfa_token: '',
        name: {
          given: '',
          sur: '',
          middle_initial: ''
        },
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
          contract_company_name: '',
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
      },
      groups: {
        available: [
          { name: 'SuperAdmin', help: 'Global administration that can manage users and take nearly any action within the system' },
          { name: 'SuperViewer', help: 'Unrestricted read-only access can review any agreement and all artifacts under management regardless of assigned parties; suitable for analysts and system admins' },
          { name: 'SuperReviewer', help: 'Agreement review and correction of digitial input or manual agreement processing; not tied to specific parties' },
          { name: 'AgreementReview', help: 'Agreement review and correction of digital input or manual agreement processing; tied to specific parties' },
          { name: 'Entitlement', help: 'Invoice review and processing along with recieving reports and inspection/acceptances; tied to delivery locations and/or admin offices as specific parties' },
          { name: 'FundsValidation', help: 'Payment schedule review to handle so called pre-validation of funds in the accounting system of record prior to payment release' },
          { name: 'InspectionAcceptance', help: 'Delivery and agreement review for field inspection of delivered goods or services to validate quality and accept on behalf of US government' },
          { name: 'Auditor', help: 'Similar to SuperViewer access in access to agreement and all artifacts under management regardless of assigned parties; must be tied to actual review actions for information control'}
        ],
        requested: []
      },
      preSaar: true
    };
  },

  computed: {
    applicant_name() {
      return this.identification.name.sur + ', ' + this.identification.name.given + ', ' + this.identification.name.middle_initial + '.';
    }
  },

  methods: {
    sendToSupervisor() {
      this.attestation.applicant = true;
      const payload = this.$data;
      // this should be a method call to sign with the NON-EMAIL cert, then remit that value to the server
      window.axios.post('/api/v1/access/request', payload)
        .then(() => {
          window.flash('Your request has been successfully submitted to your supervisor');
        })
        .catch(() => {
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
    },

    moveToSaar() {
      this.preSaar = false;
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
