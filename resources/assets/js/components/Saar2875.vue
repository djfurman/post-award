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
          <button class="button is-primary" @click="moveToSaar">Submit</button>
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
            <div class="content">To record names, signatures and other identifiers for the purpose of validating the trustworthiness of individuals requesting access to Department of Defense (DoD) systems and information. Note: Records may be maintained in both electronic and/or paper form.</div>
          </div>
        </div>
        <div class="columns">
          <div class="column is-one-quarter">
            <h3>Disclosure</h3>
          </div>
          <div class="column">
            <div class="content">Disclosure of this information is voluntary; however, failure to provide the requested information may impede, delay or prevent further processing of this request.</div>
          </div>
        </div>
      </section>

      <!-- Request -->
      <section id="request" class="section">
        <div class="columns">
          <div class="column">
            <h3 class="subtitle">Type of Request</h3>
          </div>

          <div class="column">
            <div class="field">
              <div class="control">
                <input type="radio" name="request_type" value="initial" v-model="request.type"> Initial
                <input type="radio" name="request_type" value="modification" v-model="request.type"> Modification
                <input type="radio" name="request_type" value="deactivate" v-model="request.type"> Deactivate
              </div>
            </div>
          </div>

          <div class="column">
            <div class="field" v-if="request.type != 'initial'">
              <label class="label">User Id</label>
              <div class="control">
                <input type="text" class="input" placeholder="User ID here" v-model="identification.ldap">
              </div>
            </div>
          </div>

          <div class="column">
            <div class="field">
              <label class="label">Date</label>
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
              <input type="text" class="input" placeholder="Agency or Department Name" v-model="identification.organization">
            </div>
          </div>
        </div>

        <div class="columns">
          <div class="column">
            <div class="field">
              <label class="label">Office Symbol/Department</label>
              <input type="text" class="input" placeholder="Organization Symbol e.g., J6" v-model="identification.department">
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Phone</label>
              <input type="tel" class="input" placeholder="202-867-5309" v-model="identification.phone">
            </div>
          </div>
        </div>

        <!-- Email and Title -->
        <div class="columns">
          <div class="column">
            <div class="field">
              <label class="label">Official E-Mail Address</label>
              <input type="email" class="input" placeholder="firstName.lastName@mail.mil" v-model="identification.email">
            </div>
          </div>
          <div class="column">
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label class="label">Job Title</label>
                  <input type="text" class="input" placeholder="e.g., Contract Technician" v-model="identification.job.title">
                </div>
              </div>
              <div class="column">
                <div class="field">
                  <label class="label">Grade/Rank</label>
                  <input type="text" class="input" placeholder="e.g., GS-4, Lt. Col." v-model="identification.job.rank">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Mailing and Citizenship -->
        <div class="columns">
          <div class="column">
            <label class="label">Official Mailing Address</label>
            <div class="field">
              <div class="control">
                <label for="line_1" class="label">Street Address</label>
                <input id="line_1" type="text" class="input" placeholder="1600 Pennsylvania Ave" v-model="identification.mailing_address.street">

                <label for="line_2" class="label">Location</label>
                <input id="line_2" type="text" class="input" placeholder="Chief of Staff" v-model="identification.mailing_address.line_two">

                <div class="columns">
                  <div class="column field is-one-third">
                    <label for="city" class="label">City</label>
                    <input type="text" id="city" class="input" placeholder="Washington" v-model="identification.mailing_address.city">
                  </div>
                  <div class="column field is-one-third">
                    <label for="state" class="label">State</label>
                    <input type="text" id="state" class="input" placeholder="DC" v-model="identification.mailing_address.state">
                  </div>
                  <div class="column field is-one-third">
                    <label for="postal" class="label">Postal Code</label>
                    <input type="text" id="postal" class="input" placeholder="20500" v-model="identification.mailing_address.postal">
                  </div>
                </div>

                <div class="columns">
                  <div class="column field is-half">
                    <label for="country" class="label">Country</label>
                    <input type="text" id="country" class="input" placeholder="United States" v-model="identification.mailing_address.country">
                  </div>
                  <div class="column field is-half">
                    <label for="planet" class="label">Planet</label>
                    <input type="text" id="planet" class="input" placeholder="Earth" v-model="identification.mailing_address.planet">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="column">
            <label class="label">Citizenship</label>
            <div class="columns">
              <div class="column">
                <input type="radio" name="id_citizenship" value="US" v-model="identification.citizenship"> US
                <input type="radio" name="id_citizenship" value="FN" v-model="identification.citizenship"> FN
                <input type="radio" name="id_citizenship" value="Other" v-model="identification.citizenship"> Other
              </div>
            </div>
          </div>

          <div class="column">
            <label class="label">Designation of Person</label>
            <div class="columns">
              <div class="column">
                <input type="radio" name="id_designation" value="Military" v-model="identification.designation"> Military
                <input type="radio" name="id_designation" value="Civilian" v-model="identification.designation"> Civilian
                <input type="radio" name="id_designation" value="Contractor" v-model="identification.designation"> Contractor
              </div>
            </div>
          </div>
        </div>

        <!-- IA Training -->
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

      <!-- Submission -->
      <div class="columns">
        <div class="column">
          <button class="button is-primary" @click="sendToSupervisor">Submit for Supervisor Review</button>
        </div>
      </div>

      <!-- Part 2 -->
      <section id="endorsement" class="section">
        <div class="columns">
          <div class="column">
            <h2 class="subtitle is-centered"><strong>Part 2</strong> Endorsement of Access by Information information_owner, User Supervisor or Government Sponsor</h2>
            <span class="content" v-if="identification.designation == 'Contractor'">If individual is a contractor - provide company name, contract number, and date of contract expiration.</span>
          </div>
        </div>

        <!-- Justification -->
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

        <!-- Access Types -->
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
              v-model="justification.type.privileged"
              disabled="true"
            > Privileged
          </div>
        </div>

        <!-- Classification -->
        <div class="is-grouped">
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
                class="input"
                v-model="justification.classification.other_description">
            </div>
          </div>
        </div>

        <!-- NTK -->
        <div class="columns">
          <!-- NTK Verified -->
          <div class="column is-half">
            <div class="field">
              <label class="label">Verification of Need to Know</label>
              <input
                type="checkbox"
                class="checkbox"
                v-model="justification.need_to_know">
              </div>
          </div>
          <!-- Expiration -->
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
                <label class="label">Contract Number</label>
                <input
                  type="text"
                  placeholder="BCD123-18-A-0001"
                  class="input"
                  v-model="justification.expiration.contract_number">
                <label class="label">Contractor Company Name</label>
                <input
                  type="text"
                  placeholder="Acme, Inc."
                  class="input"
                  v-model="justification.expiration.contract_company_name">
              </div>
            </div>
          </div>
        </div>

        <!-- Supervisor Endorsement -->
        <div class="columns">
          <div class="column">
            <h3 class="subtitle">Supervisor Endorsement</h3>
          </div>
        </div>
        <!-- Supervisor ID -->
        <div class="columns">
          <div class="column is-one-third">
            <!-- Name Breakdown -->
            <div class="columns">
              <div class="column is-one-third">
                <label class="label">Last Name (Surname)</label>
                <input type="text" class="input" v-model="reviewedBy.supervisor.name.sur">
              </div>
              <div class="column is-one-third">
                <label class="label">First Name (Given)</label>
                <input type="text" class="input" v-model="reviewedBy.supervisor.name.given">
              </div>
              <div class="column is-one-third">
                <label class="label">Middle Initial</label>
                <input type="text" class="input" v-model="reviewedBy.supervisor.name.middle_initial">
              </div>
            </div>
          </div>
          <!-- Signature -->
          <div class="column is-one-third">
            <label class="label">Signature</label>
            <input type="checkbox" disabled="true" v-model="attestation.supervisor"> Signed
          </div>
          <div class="column is-one-third">
            <label class="label">Signature Date</label>
            <input type="text" class="input" disabled="true" v-model="reviewedBy.supervisor.signed_date">
          </div>
          <button class="button is-warning" @click="signBy('supervisor')">Sign</button>
        </div>
        <!-- Supervisor Contact -->
        <div class="columns is-grouped">
          <div class="column is-one-third">
            <div class="columns">
              <div class="column is-half">
                <label class="label">Organization</label>
                <input type="text" class="input" v-model="reviewedBy.supervisor.organization">
              </div>
              <div class="column is-half">
                <label class="label">Department</label>
                <input type="text" class="input" v-model="reviewedBy.supervisor.department">
              </div>
            </div>
          </div>
          <div class="column is-one-third">
            <label class="label">Email Address</label>
            <input type="text" class="input" v-model="reviewedBy.supervisor.email">
          </div>
          <div class="column is-one-third">
            <label class="label">Phone Number</label>
            <input type="tel" class="input" v-model="reviewedBy.supervisor.phone">
          </div>
        </div>

        <!-- information_owner Endorsement -->
        <div class="columns">
          <div class="column">
            <h3 class="subtitle">Information Owner Endorsement</h3>
          </div>
        </div>
        <!-- information_owner ID -->
        <div class="columns">
          <div class="column is-one-third">
            <label class="label">Name (Last, First, Middle Initial)</label>
            <!-- Name Breakdown -->
            <div class="columns">
              <div class="column is-one-third">
                <input type="text" class="input" placeholder="Last Name or Surname" v-model="reviewedBy.information_owner.name.sur">
              </div>
              <div class="column is-one-third">
                <input type="text" class="input" placeholder="First Name or Given name" v-model="reviewedBy.information_owner.name.given">
              </div>
              <div class="column is-one-third">
                <input type="text" class="input" placeholder="Middle Initial" v-model="reviewedBy.information_owner.name.middle_initial">
              </div>
            </div>
          </div>
          <!-- Signature -->
          <div class="column is-one-third">
            <label class="label">Signature</label>
            <input type="checkbox" disabled="true" v-model="attestation.information_owner"> Signed
          </div>
          <div class="column is-one-third">
            <label class="label">Signature Date</label>
            <input type="text" class="input" disabled="true" v-model="reviewedBy.information_owner.signed_date">
          </div>
          <button class="button is-warning" @click="signBy('information_owner')">Sign</button>
        </div>
        <!-- Information information_owner Contact -->
        <div class="columns is-grouped">
          <div class="column is-one-third">
            <div class="columns">
              <div class="column is-half">
                <label class="label">Organization</label>
                <input type="text" class="input" placeholder="Agency or Department Name" v-model="reviewedBy.information_owner.organization">
              </div>
              <div class="column is-half">
                <label class="label">Department</label>
                <input type="text" class="input" placeholder="Organization Symbol e.g., J6" v-model="reviewedBy.information_owner.department">
              </div>
            </div>
          </div>
          <div class="column is-one-third">
            <label class="label">Email Address</label>
            <input type="text" class="input" placeholder="firstName.lastName@mail.mil" v-model="reviewedBy.information_owner.email">
          </div>
          <div class="column is-one-third">
            <label class="label">Phone Number</label>
            <input type="tel" class="input" placeholder="202-867-5309" v-model="reviewedBy.information_owner.phone">
          </div>
        </div>

        <!-- IAO Endorsement -->
        <div class="columns">
          <div class="column">
            <h3 class="subtitle">IAO Endorsement</h3>
          </div>
        </div>
        <!-- IAO ID -->
        <div class="columns">
          <div class="column is-one-third">
            <!-- Name Breakdown -->
            <div class="columns">
              <div class="column is-one-third">
                <label class="label">Last Name (Surname)</label>
                <input type="text" class="input" v-model="reviewedBy.iao.name.sur">
              </div>
              <div class="column is-one-third">
                <label class="label">First Name (Given)</label>
                <input type="text" class="input" v-model="reviewedBy.iao.name.given">
              </div>
              <div class="column is-one-third">
                <label class="label">Middle Initial</label>
                <input type="text" class="input" v-model="reviewedBy.iao.name.middle_initial">
              </div>
            </div>
          </div>
          <!-- Signature -->
          <div class="column is-one-third">
            <label class="label">Signature</label>
            <input type="checkbox" disabled="true" v-model="attestation.iao"> Signed
          </div>
          <div class="column is-one-third">
            <label class="label">Signature Date</label>
            <input type="text" class="input" disabled="true" v-model="reviewedBy.iao.signed_date">
          </div>
          <button class="button is-warning" @click="signBy('iao')">Sign</button>
        </div>
        <!-- Information information_owner Contact -->
        <div class="columns is-grouped">
          <div class="column is-one-third">
            <div class="columns">
              <div class="column is-half">
                <label class="label">Organization</label>
                <input type="text" class="input" v-model="reviewedBy.iao.organization">
              </div>
              <div class="column is-half">
                <label class="label">Department</label>
                <input type="text" class="input" v-model="reviewedBy.iao.department">
              </div>
            </div>
          </div>
          <div class="column is-one-third">
            <label class="label">Email Address</label>
            <input type="text" class="input" v-model="reviewedBy.iao.email">
          </div>
          <div class="column is-one-third">
            <label class="label">Phone Number</label>
            <input type="tel" class="input" v-model="reviewedBy.iao.phone">
          </div>
        </div>
      </section>

      <!-- Second Page -->
      <section class="section">
        <!-- Applicant Name -->
        <div class="columns">
          <div class="column">
            <label class="label">Name</label>
            <input type="text" class="input" disabled="true" v-model="applicant_name">
          </div>
        </div>

        <!-- Additional Info Block -->
        <div class="columns">
          <div class="column">
            <label class="label">Optional Information</label>
            <textarea class="textarea" disabled="true" v-model="justification.additional_details" rows="10"></textarea>
          </div>
        </div>
      </section>

      <!-- Third Page -->
      <section class="section">
        <!-- Part 3 -->
        <div class="columns">
          <div class="column">
            <h3 class="subtitle"><strong>Part 3</strong> Security Manager Validates the Background Investigation or Clearance Information</h3>
          </div>
        </div>
        <div class="columns">
          <!-- Investigation Details -->
          <div class="column">
            <div class="columns">
              <div class="column is-half">
                <label class="label">Type of Investigation</label>
                <input type="text" class="input" v-model="investigation.type">
              </div>
              <div class="column is-half">
                <label class="label">Date of Investigation</label>
                <input type="text" class="input" v-model="investigation.date">
              </div>
            </div>
          </div>
        </div>
        <!-- Cleared for -->
        <div class="columns">
          <div class="column is-half">
            <label class="label">Clearance Level</label>
            <input type="text" class="input" v-model="investigation.clearance">
          </div>
          <div class="column is-half">
            <label class="label">IT Level Designation</label>
            <input type="checkbox" v-model="investigation.it_designation.level_1"> Level I
            <input type="checkbox" v-model="investigation.it_designation.level_2"> Level II
            <input type="checkbox" v-model="investigation.it_designation.level_3"> Level III
          </div>
        </div>
        <!-- Verified By -->
        <div class="columns">
          <div class="column is-one-third">
            <!-- Name Breakdown -->
            <div class="columns">
              <div class="column is-one-third">
                <label class="label">Last Name (Surname)</label>
                <input type="text" class="input" v-model="reviewedBy.security_manager.name.sur">
              </div>
              <div class="column is-one-third">
                <label class="label">First Name (Given)</label>
                <input type="text" class="input" v-model="reviewedBy.security_manager.name.given">
              </div>
              <div class="column is-one-third">
                <label class="label">Middle Initial</label>
                <input type="text" class="input" v-model="reviewedBy.security_manager.name.middle_initial">
              </div>
            </div>
          </div>
          <!-- Signature -->
          <div class="column is-one-third">
            <label class="label">Signature</label>
            <input type="checkbox" disabled="true" v-model="attestation.security_manager"> Signed
          </div>
          <div class="column is-one-third">
            <label class="label">Signature Date</label>
            <input type="text" class="input" disabled="true" v-model="reviewedBy.security_manager.signed_date">
          </div>
          <button class="button is-warning" @click="signBy('security_manager')">Sign</button>
        </div>
        <!-- Information information_owner Contact -->
        <div class="columns is-grouped">
          <div class="column is-one-third">
            <div class="columns">
              <div class="column is-half">
                <label class="label">Organization</label>
                <input type="text" class="input" v-model="reviewedBy.security_manager.organization">
              </div>
              <div class="column is-half">
                <label class="label">Department</label>
                <input type="text" class="input" v-model="reviewedBy.security_manager.department">
              </div>
            </div>
          </div>
          <div class="column is-one-third">
            <label class="label">Email Address</label>
            <input type="text" class="input" v-model="reviewedBy.security_manager.email">
          </div>
          <div class="column is-one-third">
            <label class="label">Phone Number</label>
            <input type="tel" class="input" v-model="reviewedBy.security_manager.phone">
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
        type: "",
        date: moment().format(),
        system: {
          name: "FACET-Acq Post Award",
          location: "Anywhere you need it"
        }
      },
      identification: {
        ldap: "",
        mfa_token: "",
        name: {
          given: "",
          sur: "",
          middle_initial: ""
        },
        organization: "",
        department: "",
        phone: "",
        email: "",
        job: {
          title: "",
          rank: ""
        },
        mailing_address: {
          street: "",
          line_two: "",
          city: "",
          state: "",
          postal: "",
          country: "United States",
          planet: "Earth"
        },
        citizenship: {
          us: false,
          fn: false,
          other: false
        },
        designation: ''
      },
      training: {
        information_assurance: {
          complete: false,
          date_completed: ""
        }
      },
      reviewedBy: {
        supervisor: {
          name: {
            sur: "",
            given: "",
            middle_initial: ""
          },
          signed_date: "",
          organization: "",
          department: "",
          phone: "",
          email: ""
        },
        information_owner: {
          name: {
            sur: "",
            given: "",
            middle_initial: ""
          },
          signed_date: "",
          organization: "",
          department: "",
          phone: "",
          email: ""
        },
        iao: {
          name: {
            sur: "",
            given: "",
            middle_initial: ""
          },
          signed_date: "",
          organization: "",
          department: "",
          phone: "",
          email: ""
        },
        security_manager: {
          name: {
            sur: "",
            given: "",
            middle_initial: ""
          },
          signed_date: "",
          organization: "",
          department: "",
          phone: "",
          email: ""
        }
      },
      justification: {
        reason: "",
        type: {
          authorized: false,
          privileged: false
        },
        classification: {
          unclassified: true,
          classified: false,
          category: "",
          other: false,
          other_description: ""
        },
        need_to_know: true,
        expiration: {
          contract_number: "",
          contract_company_name: "",
          date: ""
        },
        additional_details: "This section intentionally left blank"
      },
      investigation: {
        type: "",
        date: "",
        clearance: "",
        it_designation: {
          level_1: false,
          level_2: false,
          level_3: false
        }
      },
      attestation: {
        applicant: false,
        supervisor: false,
        information_owner: false,
        iao: false,
        security_manager: false
      },
      groups: {
        available: [],
        requested: []
      },
      preSaar: true
    };
  },

  computed: {
    applicant_name() {
      const applicant = this.identification.name;
      if (applicant.sur.length != 0 && applicant.given.length != 0 && applicant.middle_initial.length != 0){
        return (`${applicant.sur}, ${applicant.given}, ${applicant.middle_initial}.`);
      }
      return '';
    },

    supervisor_name() {
      return this.nameBuild("supervisor");
    },

    information_owner_name() {
      return this.nameBuild("information_owner");
    },

    iao_name() {
      return this.nameBuild("iao");
    },

    security_manager_name() {
      return this.nameBuild("security_manager");
    }
  },

  methods: {
    nameBuild(role) {
      return (
        this.reviewedBy[role].name.sur +
        ", " +
        this.reviewedBy[role].name.given +
        ", " +
        this.reviewedBy[role].name.middle_initial +
        "."
      );
    },

    sendToSupervisor() {
      this.attestation.applicant = true;
      const payload = this.$data;
      // this should be a method call to sign with the NON-EMAIL cert, then remit that value to the server
      window.axios
        .post("/api/v1/access/request", payload)
        .then(() => {
          window.flash(
            "Your request has been successfully submitted to your supervisor"
          );
        })
        .catch(() => {
          window.flash("Your request failed to post");
        });
    },

    populateFromJson(saar) {
      this.request = saar.request;
      this.identification = saar.identification;
      this.training = saar.training;
      this.justification = saar.justification;
      this.investigation = saar.investigation;
      this.attestation = saar.attestation;
    },

    fetchAccessTypes() {
      window.axios
        .get("/api/v1/access/types")
        .then(result => {
          this.groups.available = result.data.result;
        })
        .catch(() => {
          window.flash("Access types could not be loaded");
        });
    },

    moveToSaar() {
      this.preSaar = false;
    },

    signBy(role) {
      // todo use PkiJS to extract name elements and email from PKI
      this.attestation[role] = true;
      this.reviewedBy[role].signed_date = moment().format();
      // todo update the workflow
      window.flash(
        `${role
          .replace("_", " ")
          .toUpperCase()} has successfully signed & endorsed this application`
      );
    }
  },

  created() {
    this.fetchAccessTypes();
  }
};
</script>
