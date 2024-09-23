<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Company;
use App\Models\CompanyProduct;
use \Core\View;
use \Core\Controller;

class CompanyProductController extends Controller
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
        $companyProducts = CompanyProduct::orderBy('id','desc')->get();
        // dd($companyLocation);
        View::renderTemplate('Admin/CompanyProducts/index.html', ['companyProducts'=> $companyProducts, 'companies' => $companies]);

    }

    public function create()
    {
        $companies = Company::orderBy('company_name')->get();        
        View::renderTemplate('Admin/CompanyProducts/create.html', ['companies' => $companies]);
    }

    public function store()
    {
        $companyProduct = new CompanyProduct();
        $companyProduct->company_id = $_POST['company_id'];
        $companyProduct->product = $_POST['product'];
        $companyProduct->save();


        header('Location: /admin/companyProduct');
    }
    public function show()
    {

    }

    public function edit()
    {
        $id = $_GET['id'];
        $companies = Company::orderBy('company_name')->get();        
        $companyProduct = CompanyProduct::findOrFail($id);

        View::renderTemplate('Admin/CompanyProducts/edit.html', ['companyProduct'=>$companyProduct, 'companies' => $companies]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $companyProduct = CompanyProduct::findOrFail($id);
        $companyProduct->company_id = $_POST['company_id'];
        $companyProduct->product = $_POST['product'];
        $companyProduct->update();

        header('Location: /admin/companyProduct');
    }

    public function destroy()
    {
        $id = $_GET['id'];        
        $companyProduct = CompanyProduct::findOrFail($id);
        $companyProduct->delete();

        header("Location: /admin/companyProduct");
    }
}
