<?php

namespace App\Http\Controllers\Api\V1\Registration;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\JsonResponse;

class RegistrationController extends Controller
{
    public function index(): JsonResponse
    {
        $registrations = Registration::query()
            ->orderBy('id')
            ->get(['id', 'bib', 'first_name', 'last_name', 'phone', 'category_entered', 'email', 'dob', 'gender', 'created_at', 'updated_at']);

        return response()->json($registrations);

    }
}
