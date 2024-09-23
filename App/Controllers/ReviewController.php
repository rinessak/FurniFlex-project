<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Company;
use App\Models\Review;
use \Core\View;
use \Core\Controller;

class ReviewController extends Controller
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
        $reviews = Review::orderBy('id', 'desc')->get();
        // $reviews = Review::orderBy('id','desc')->with('event')->with('speaker')->get();

        View::renderTemplate('Admin/Reviews/index.html', ['reviews' => $reviews, 'companies'=>$companies]);
    }

    public function create()
    {
        $companies = Company::orderBy('company_name')->get();
        View::renderTemplate('Admin/Reviews/create.html', ['companies'=>$companies]);
    }

    public function store()
    {
        $review = new Review();
        $review->content = $_POST['content'];
        $review->rating = $_POST['rating'];
        $review->username = $_POST['username'];
        $review->company_id = $_POST['company_id'];
        $review->save();

        header('Location: /admin/reviews');
    }

    public function edit()
    {
        $id = $_GET['id'];

        $companies = Company::orderBy('company_name')->get();
        $review = Review::findOrFail($id);

        View::renderTemplate('Admin/Reviews/edit.html', ['review'=>$review, 'companies'=>$companies]);
    }

    public function update()
    {
        $id = $_POST['id'];
        // dd($id);
        $review = Review::findOrFail($id);
        $review->content = $_POST['content'];
        $review->rating = $_POST['rating'];
        $review->username = $_POST['username'];
        $review->company_id = $_POST['company_id'];
        $review->update();

        header('Location: /admin/reviews');
    }

    public function destroy()
    {
        $id = $_GET['id'];        
        $review = Review::findOrFail($id);
        $review->delete();

        header("Location: /admin/reviews");
    }
    public function storeReview()
    {
        $review = new Review();
        $review->content = $_POST['content'];
        $review->rating = $_POST['rating'];
        $review->username = $_POST['username'];
        $review->company_id = $_POST['company_id'];
        $review->save();

        header('Location: /companies');

    }


}
