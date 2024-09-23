<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Company;
use App\Models\CompanyService;
use \Core\View;
use \Core\Controller;

class CompanyServiceController extends Controller
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
        $companies = Company::orderBy('company_name')->get();
        $companyServices = CompanyService::orderBy('id', 'desc')->get();
        // dd($companyLocation);
        View::renderTemplate('Admin/CompanyServices/index.html', ['companyServices'=> $companyServices, 'companies' => $companies]);

    }

    public function create()
    {
        $companies = Company::orderBy('company_name')->get();        
        View::renderTemplate('Admin/CompanyServices/create.html', ['companies' => $companies]);
    }

    public function store()
    {
        $companyService = new CompanyService();
        $companyService->company_id = $_POST['company_id'];
        $companyService->service = $_POST['service'];
        $companyService->description = $_POST['description'];
        $companyService->save();


        header('Location: /admin/companyService');
    }
    public function show()
    {

    }

    public function edit()
    {
        $id = $_GET['id'];
        $companies = Company::orderBy('company_name')->get();        
        $companyService = CompanyService::findOrFail($id);

        View::renderTemplate('Admin/CompanyServices/edit.html', ['companyService'=>$companyService, 'companies' => $companies]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $companyService = CompanyService::findOrFail($id);
        $companyService->company_id = $_POST['company_id'];
        $companyService->service = $_POST['service'];
        $companyService->description = $_POST['description'];
        $companyService->update();

        header('Location: /admin/companyService');
    }

    public function destroy()
    {
        $id = $_GET['id'];        
        $companyService = CompanyService::findOrFail($id);
        $companyService->delete();

        header("Location: /admin/companyService");
    }
}
