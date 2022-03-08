<?php

namespace App\Http\Controllers\Api;

use App\Models\Upazila;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;

class HelperController extends  BaseController
{

    public function designations()
    {
        $designations = Designation::orderBy('name', 'asc')->get();
        return $this->sendResponse($designations, 'Designation List.');
    }
    public function upazilas()
    {
        $upazilas = Upazila::where('type', 'UP')->get();
        return $this->sendResponse($upazilas, 'Upazila List.');
    }

    public function unions(Request $request)
    {
        $id = $request->upazila_id;
        $unions = Upazila::where('upazila_id', $id)->get();
        if ($unions) {
            return $this->sendResponse($unions, 'Union List.');
        }
    }
}
