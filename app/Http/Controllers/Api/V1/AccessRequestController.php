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
        return array (
            'request' =>
            array (
              'type' =>
              array (
                'initial' => true,
                'modification' => false,
                'deactivation' => false,
              ),
              'date' => '20180211',
              'system' =>
              array (
                'name' => 'FACET-Acq Post Award',
                'location' => 'Anywhere you need it',
              ),
            ),
            'identification' =>
            array (
              'name' => 'Furman, Daniel, J',
              'organization' => 'FACET',
              'department' => 'N/A',
              'phone' => '1234567890',
              'email' => 'djfurman@gmail.com',
              'job' =>
              array (
                'title' => 'Architect of Facet',
                'rank' => 'Supreme Commander',
              ),
              'mailing_address' =>
              array (
                'street' => '1600 Pennsylvania Ave',
                'line_two' => 'Executive Chief of Staff',
                'city' => 'Washington',
                'state' => 'DC',
                'postal' => '20006',
                'country' => 'USA',
                'planet' => 'Earth',
              ),
              'citizenship' =>
              array (
                'us' => true,
                'fn' => false,
                'other' => false,
              ),
              'designation' =>
              array (
                'military' => false,
                'civilian' => true,
                'contractor' => false,
              ),
            ),
            'training' =>
            array (
              'information_assurance' =>
              array (
                'complete' => true,
                'date_completed' => '20170305',
              ),
            ),
            'justification' =>
            array (
              'reason' => NULL,
              'type' =>
              array (
                'authorized' => false,
                'privilaged' => false,
              ),
              'classification' =>
              array (
                'unclassified' => true,
                'classified' => false,
                'category' => NULL,
                'other' => false,
                'other_description' => NULL,
              ),
              'need_to_know' => true,
              'expiration' =>
              array (
                'contract_number' => NULL,
                'date' => NULL,
              ),
              'supervisor' =>
              array (
                'name' => NULL,
                'organization' => NULL,
                'department' => NULL,
                'phone' => NULL,
                'email' => NULL,
              ),
              'owner' =>
              array (
                'phone' => NULL,
              ),
              'ioa' =>
              array (
                'organization' => NULL,
                'department' => NULL,
                'phone' => NULL,
              ),
              'additional_details' => NULL,
            ),
            'investigation' =>
            array (
              'type' => NULL,
              'date' => NULL,
              'clearance' => NULL,
              'it_designation' =>
              array (
                'level_1' => false,
                'level_2' => false,
                'level_3' => false,
              ),
              'verified_by' =>
              array (
                'name' => NULL,
                'phone' => NULL,
              ),
            ),
            'attestation' =>
            array (
              'applicant' => true,
              'manager' => false,
              'owner' => false,
              'ioa' => false,
            ),
        );
    }
}
