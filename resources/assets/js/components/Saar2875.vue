<template>
  <div id="dd2875">
    <!-- Title -->
    <section class="section">
      <div class="container is-centered">
        <h1 class="title">SYSTEM AUTHORIZATION ACCESS REQUEST (SAAR)</h1>
      </div>
    </section>

    <!-- Privacy Act -->
    <section class="section">
      <h2>Privacy Act Statement</h2>
      <div class="columns">
        <div class="column">
          <h3>Authority</h3>
        </div>
        <div class="column">
          <div class="content">Executive Order 10450, 9397; and Public Law 99-474, the Computer Fraud and Abuse Act.</div>
        </div>
      </div>
      <div class="columns">
        <div class="column">
          <h2>Principle Purpose</h2>
        </div>
        <div class="column">
          <div class="content">To record names, signatures and other identifiers for the purpose of validating the trustworthiness of individuals requesting access to Daprtment of Defense (DoD) systems and information. Note: Records may be maintained in both electronic and/or paper form.</div>
        </div>
      </div>
      <div class="columns">
        <div class="column">
          <h3>Disclosure</h3>
        </div>
        <div class="column">
          <div class="content">Disclosure of this infromation is voluntary; however, failure to provide the requested information may impede, delay or prevent further processing of this request.</div>
        </div>
      </div>
    </section>

    <!-- Request -->
    <section class="section">
      <div class="content">The reqeust starts here</div>
    </section>
  </div>
</template>

<script>
import moment from 'moment';
export default {
  data() {
    return {
      request: {
        type: 'Initial',
        date: moment.now(),
        system_name: 'FACET-Acq Post Award',
        location: 'Anywhere you need it'
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
          country: 'USA'
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
          date_complted: ''
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
    }
  }
}
</script>
