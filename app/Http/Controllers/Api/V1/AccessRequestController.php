<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Log;

class AccessRequestController extends ApiController
{
    public function sendToSupervisor()
    {
        Log::info(request()->all());
        return $this->respondSuccess(request()->all());
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
                'date' => '20180211',
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
                    'date_completed' => '20170305',
                ),
            ),
            'justification' =>
                array(
                'reason' => null,
                'type' =>
                    array(
                    'authorized' => false,
                    'privilaged' => false,
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
