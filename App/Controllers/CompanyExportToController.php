<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Company;
use App\Models\CompanyExportTo;
use \Core\View;
use \Core\Controller;

class CompanyExportToController extends Controller
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
        $companyExportsTo = CompanyExportTo::orderBy('id', 'desc')->get();
        // dd($companyLocation);
        View::renderTemplate('Admin/CompanyExportTo/index.html', ['companyExportsTo'=> $companyExportsTo, 'companies' => $companies]);

    }

    public function create()
    {
        $companies = Company::orderBy('company_name')->get();        
        View::renderTemplate('Admin/CompanyExportTo/create.html', ['companies' => $companies]);
    }

    public function store()
    {
        $companyExportTo = new CompanyExportTo();
        $companyExportTo->company_id = $_POST['company_id'];
        $companyExportTo->state = $_POST['state'];
        $companyExportTo->save();


        header('Location: /admin/companyExportTo');
    }
    public function show()
    {

    }

    public function edit()
    {
        $id = $_GET['id'];
        $companies = Company::orderBy('company_name')->get();        
        $companyExportTo = CompanyExportTo::findOrFail($id);

        View::renderTemplate('Admin/CompanyExportTo/edit.html', ['companyExportTo'=>$companyExportTo, 'companies' => $companies]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $companyExportTo = CompanyExportTo::findOrFail($id);
        $companyExportTo->company_id = $_POST['company_id'];
        $companyExportTo->state = $_POST['state'];
        $companyExportTo->update();

        header('Location: /admin/companyExportTo');
    }

    public function destroy()
    {
        $id = $_GET['id'];        
        $companyExportTo = CompanyExportTo::findOrFail($id);
        $companyExportTo->delete();

        header("Location: /admin/companyExportTo");
    }
}
