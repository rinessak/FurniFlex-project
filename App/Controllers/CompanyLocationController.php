<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Company;
use App\Models\CompanyLocation;
use \Core\View;
use \Core\Controller;

class CompanyLocationController extends Controller
{
    public function __construct()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()){
            header('Location: /login');
        }
    }
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->get();
        $companyLocations = CompanyLocation::orderBy('id', 'desc')->get();
        // dd($companyLocation);
        View::renderTemplate('Admin/CompanyLocations/index.html', ['companyLocations'=> $companyLocations, 'companies' => $companies]);

    }

    public function create()
    {
        $companies = Company::orderBy('company_name')->get();        
        View::renderTemplate('Admin/CompanyLocations/create.html', ['companies' => $companies]);
    }

    public function store()
    {
        $companyLocation = new CompanyLocation();
        $companyLocation->company_id = $_POST['company_id'];
        $companyLocation->address = $_POST['address'];
        $companyLocation->save();


        header('Location: /admin/companyLocation');
    }
    public function show()
    {

    }

    public function edit()
    {
        $id = $_GET['id'];
        $companies = Company::orderBy('company_name')->get();        
        $companyLocation = CompanyLocation::findOrFail($id);

        View::renderTemplate('Admin/CompanyLocations/edit.html', ['companyLocation'=>$companyLocation, 'companies' => $companies]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $companyLocation = CompanyLocation::findOrFail($id);
        $companyLocation->company_id = $_POST['company_id'];
        $companyLocation->address = $_POST['address'];
        $companyLocation->update();

        header('Location: /admin/companyLocation');
    }

    public function destroy()
    {
        $id = $_GET['id'];        
        $companyLocation = CompanyLocation::findOrFail($id);
        $companyLocation->delete();

        header("Location: /admin/companyLocation");
    }
}
