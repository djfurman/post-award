<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiController;

class WorkflowController extends ApiController
{
    public function index()
    {
        $inbox = [];
        return $this->respondSuccess(['inbox' => $inbox]);
    }
}
