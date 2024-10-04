<?php

namespace App\Controllers;

use \Core\View;
use App\Models\User;
use App\Helper\Session;
use App\Models\Company;
use App\Models\CompanyExportTo;
use App\Models\CompanyLocation;
use App\Models\CompanyProduct;
use App\Models\CompanyService;
use App\Models\Review;
use \Core\Controller;

/**
 * Home controller
 */
class HomeController extends Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function admin()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()){
            header('Location: /login');
        }
        View::renderTemplate('Admin/Dashboard/index.html');
    }
    public function index()
    {
        View::renderTemplate('Frontend/index.html');
    }

    public function login()
    {
        View::renderTemplate('Frontend/login.html');
    }
    public function companySignUp()
    {
        View::renderTemplate('Frontend/companySignUp.html');
    }
    public function aboutUs()
    {
        View::renderTemplate('Frontend/aboutUs.html');
    }
    public function companies()
    {
        $companies = Company::all();
        $reviews = 
        View::renderTemplate('Frontend/companies.html', ['companies'=>$companies]);
    }
    public function companyDetails()
    {
        $id = $_GET['id'];

        $company = Company::findOrFail($id);
        $companyExportsTo = CompanyExportTo::where('company_id', $id)->get();
        $companyLocations = CompanyLocation::where('company_id', $id)->get();
        $companyProducts = CompanyProduct::where('company_id', $id)->get();
        $companyServices = CompanyService::where('company_id', $id)->get();
        $reviews = Review::where('company_id', $id)->get();

        View::renderTemplate('Frontend/companyDetails.html', ['company'=>$company, 'companyExportsTo'=>$companyExportsTo,'companyLocations'=>$companyLocations,
                                                                'companyProducts'=>$companyProducts, 'companyServices'=>$companyServices,'reviews'=>$reviews]);
    }
    public function review()
    {
        $companies = Company::all();
        View::renderTemplate('Frontend/companies.html', ['companies' => $companies]);
    }
    public function addReview()
    {
        $companies = Company::all();
        View::renderTemplate('Frontend/addReview.html', ['companies' => $companies]);
    }



}
