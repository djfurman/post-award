<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Log;

class AccessRequestController extends ApiController
{
    protected $permissions = [
        [ 'name' => 'SuperAdmin', 'authorized' => true, 'privileged' => true, 'help' => 'Global administration that can manage users and take nearly any action within the system' ],
        [ 'name' => 'SuperViewer', 'authorized' => true, 'privileged' => false, 'help' => 'Unrestricted read-only access can review any agreement and all artifacts under management regardless of assigned parties; suitable for analysts and system admins' ],
        [ 'name' => 'SuperReviewer', 'authorized' => true, 'privileged' => true, 'help' => 'Agreement review and correction of digitial input or manual agreement processing; not tied to specific parties' ],
        [ 'name' => 'AgreementReview', 'authorized' => false, 'privileged' => true, 'help' => 'Agreement review and correction of digital input or manual agreement processing; tied to specific parties' ],
        [ 'name' => 'Entitlement', 'authorized' => false, 'privileged' => true, 'help' => 'Invoice review and processing along with recieving reports and inspection/acceptances; tied to delivery locations and/or admin offices as specific parties' ],
        [ 'name' => 'FundsValidation', 'authorized' => false, 'privileged' => true, 'help' => 'Payment schedule review to handle so called pre-validation of funds in the accounting system of record prior to payment release' ],
        [ 'name' => 'InspectionAcceptance', 'authorized' => false, 'privileged' => true, 'help' => 'Delivery and agreement review for field inspection of delivered goods or services to validate quality and accept on behalf of US government' ],
        [ 'name' => 'Auditor', 'authorized' => true, 'privileged' => false, 'help' => 'Similar to SuperViewer access in access to agreement and all artifacts under management regardless of assigned parties; must be tied to actual review actions for information control']
    ];

    public function sendToSupervisor()
    {
        Log::info(request()->all());
        return $this->respondSuccess(request()->all());
    }

    public function accessTypes() {
        return $this->respondSuccess($this->permissions);
    }

    public function redirectWithData()
    {
        return array(
            'request' =>
                array(
                'type' =>
                    array(
                    'initial' => true,
                    'modification' => false,
                    'deactivation' => false,
                ),
                'date' => '2018-02-11',
                'system' =>
                    array(
                    'name' => 'FACET-Acq Post Award',
                    'location' => 'Anywhere you need it',
                ),
            ),
            'identification' =>
                array(
                'ldap' => 'DC21797',
                'name' => array('given' => 'Daniel', 'sur' => 'Furman', 'middle_initial'=> 'J'),
                'organization' => 'FACET',
                'department' => 'N/A',
                'phone' => '1234567890',
                'email' => 'djfurman@gmail.com',
                'job' =>
                    array(
                    'title' => 'Architect of Facet',
                    'rank' => 'Supreme Commander',
                ),
                'mailing_address' =>
                    array(
                    'street' => '1600 Pennsylvania Ave',
                    'line_two' => 'Executive Chief of Staff',
                    'city' => 'Washington',
                    'state' => 'DC',
                    'postal' => '20006',
                    'country' => 'USA',
                    'planet' => 'Earth',
                ),
                'citizenship' =>
                    array(
                    'us' => true,
                    'fn' => false,
                    'other' => false,
                ),
                'designation' =>
                    array(
                    'military' => false,
                    'civilian' => true,
                    'contractor' => false,
                ),
            ),
            'training' =>
                array(
                'information_assurance' =>
                    array(
                    'complete' => true,
                    'date_completed' => '2017-03-05',
                ),
            ),
            'justification' =>
                array(
                'reason' => null,
                'type' =>
                    array(
                    'authorized' => false,
                    'privileged' => false,
                ),
                'classification' =>
                    array(
                    'unclassified' => true,
                    'classified' => false,
                    'category' => null,
                    'other' => false,
                    'other_description' => null,
                ),
                'need_to_know' => true,
                'expiration' =>
                    array(
                    'contract_number' => null,
                    'date' => null,
                ),
                'supervisor' =>
                    array(
                    'name' => null,
                    'organization' => null,
                    'department' => null,
                    'phone' => null,
                    'email' => null,
                ),
                'owner' =>
                    array(
                    'phone' => null,
                ),
                'ioa' =>
                    array(
                    'organization' => null,
                    'department' => null,
                    'phone' => null,
                ),
                'additional_details' => null,
            ),
            'investigation' =>
                array(
                'type' => null,
                'date' => null,
                'clearance' => null,
                'it_designation' =>
                    array(
                    'level_1' => false,
                    'level_2' => false,
                    'level_3' => false,
                ),
                'verified_by' =>
                    array(
                    'name' => null,
                    'phone' => null,
                ),
            ),
            'attestation' =>
                array(
                'applicant' => true,
                'manager' => false,
                'owner' => false,
                'ioa' => false,
            ),
        );
    }
}
