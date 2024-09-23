<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\User;
use App\Models\Company;
use \Core\View;
use \Core\Controller;

/**
 * HomeController controller
 */
class CompanyController extends Controller
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
        $users = User::orderBy('username')->get();
        $companies = Company::orderBy('id', 'desc')->get();
        // dd($companies);
        View::renderTemplate('Admin/Companies/index.html', ['companies'=> $companies ,'users' => $users]);
    }

    public function create()
    {
        $users = User::orderBy('username')->get();
        View::renderTemplate('Admin/Companies/create.html', ['users' => $users]);
    }

    public function store()
    {
        $company = new Company();
        $company->user_id = $_POST['user_id'];
        $company->company_name = $_POST['company_name'];
        $company->contact_email = $_POST['contact_email'];
        $company->phone_numbers = $_POST['phone_numbers'];
        $company->description = $_POST['description'];
        $company->website = $_POST['website'];
        $company->save();

        header("Location: /admin/companies");
    }

    public function show()
    {

    }

    public function edit()
    {
        $id = $_GET['id'];
        $users = User::orderBy('username')->get();        
        $company = Company::findOrFail($id);

        View::renderTemplate('Admin/Companies/edit.html', ['company' => $company, 'users'=>$users]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $company = Company::findOrFail($id);
        $company->user_id = $_POST['user_id'];
        $company->company_name = $_POST['company_name'];
        $company->contact_email = $_POST['contact_email'];
        $company->phone_numbers = $_POST['phone_numbers'];
        $company->description = $_POST['description'];
        $company->website = $_POST['website'];
        $company->update();

        header("Location: /admin/companies");
    }
    public function destroy()
    {
        $id = $_GET['id'];
        $company = Company::findOrFail($id);
        $company->delete();     

        header("Location: /admin/companies");
    }
}
