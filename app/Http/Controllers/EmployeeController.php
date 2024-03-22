<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeeController extends Controller
{
    // private $apiUrl = 'https://dummy.restapiexample.com/api/v1/';
    public function index() {
        $baseURL = ENV('API_URL');
        $employes = Http::get($baseURL.'employees');

        $response = json_decode($employes->body());
        $result = $response->data;

        return view('employees.index', compact('result'));
    }
    public function show($id) {
        $baseURL = ENV('API_URL');
        $employes = Http::get($baseURL.'employee'.$id);
        dd($employes);
        $response = json_decode($employes);
        dd($response);
        $result = $response->data;

        return view('employees.show', compact('result'));
    }
}
