<?php

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('admin', ['controller' => 'HomeController', 'action' => 'login']);
$router->add('admin/dashboard', ['controller' => 'HomeController', 'action' => 'admin']);
$router->add('', ['controller' => 'HomeController', 'action' => 'index']);
$router->add('companies', ['controller' => 'HomeController', 'action' => 'companies']);
$router->add('companyDetails', ['controller' => 'HomeController', 'action' => 'companyDetails']);
$router->add('aboutUs', ['controller' => 'HomeController', 'action' => 'aboutUs']);
$router->add('login', ['controller' => 'HomeController', 'action' => 'login']);
$router->add('companySignUp', ['controller' => 'HomeController', 'action' => 'companySignUp']);
$router->add('addReview', ['controller' => 'HomeController', 'action' => 'addReview']);


$router->add('admin/companies', ['controller' => 'CompanyController', 'action' => 'index']);
$router->add('admin/company-create', ['controller' => 'CompanyController', 'action' => 'create']);
$router->add('admin/company-store', ['controller' => 'CompanyController', 'action' => 'store']);
$router->add('admin/company-edit', ['controller' => 'CompanyController', 'action' => 'edit']);
$router->add('admin/company-update', ['controller' => 'CompanyController', 'action' => 'update']);
$router->add('admin/company-delete', ['controller' => 'CompanyController', 'action' => 'destroy']);

$router->add('admin/companyLocation', ['controller' => 'CompanyLocationController', 'action' => 'index']);
$router->add('admin/companyLocation-create', ['controller' => 'CompanyLocationController', 'action' => 'create']);
$router->add('admin/companyLocation-store', ['controller' => 'CompanyLocationController', 'action' => 'store']);
$router->add('admin/companyLocation-edit', ['controller' => 'CompanyLocationController', 'action' => 'edit']);
$router->add('admin/companyLocation-update', ['controller' => 'CompanyLocationController', 'action' => 'update']);
$router->add('admin/companyLocation-delete', ['controller' => 'CompanyLocationController', 'action' => 'destroy']);

$router->add('admin/companyProduct', ['controller' => 'CompanyProductController', 'action' => 'index']);
$router->add('admin/companyProduct-create', ['controller' => 'CompanyProductController', 'action' => 'create']);
$router->add('admin/companyProduct-store', ['controller' => 'CompanyProductController', 'action' => 'store']);
$router->add('admin/companyProduct-edit', ['controller' => 'CompanyProductController', 'action' => 'edit']);
$router->add('admin/companyProduct-update', ['controller' => 'CompanyProductController', 'action' => 'update']);
$router->add('admin/companyProduct-delete', ['controller' => 'CompanyProductController', 'action' => 'destroy']);

$router->add('admin/companyService', ['controller' => 'CompanyServiceController', 'action' => 'index']);
$router->add('admin/companyService-create', ['controller' => 'CompanyServiceController', 'action' => 'create']);
$router->add('admin/companyService-store', ['controller' => 'CompanyServiceController', 'action' => 'store']);
$router->add('admin/companyService-edit', ['controller' => 'CompanyServiceController', 'action' => 'edit']);
$router->add('admin/companyService-update', ['controller' => 'CompanyServiceController', 'action' => 'update']);
$router->add('admin/companyService-delete', ['controller' => 'CompanyServiceController', 'action' => 'destroy']);

$router->add('admin/companyExportTo', ['controller' => 'CompanyExportToController', 'action' => 'index']);
$router->add('admin/companyExportTo-create', ['controller' => 'CompanyExportToController', 'action' => 'create']);
$router->add('admin/companyExportTo-store', ['controller' => 'CompanyExportToController', 'action' => 'store']);
$router->add('admin/companyExportTo-edit', ['controller' => 'CompanyExportToController', 'action' => 'edit']);
$router->add('admin/companyExportTo-update', ['controller' => 'CompanyExportToController', 'action' => 'update']);
$router->add('admin/companyExportTo-delete', ['controller' => 'CompanyExportToController', 'action' => 'destroy']);

$router->add('admin/users', ['controller' => 'UserController', 'action' => 'index']);
$router->add('admin/user-create', ['controller' => 'UserController', 'action' => 'create']);
$router->add('admin/user-store', ['controller' => 'UserController', 'action' => 'store']);
$router->add('admin/user-edit', ['controller' => 'UserController', 'action' => 'edit']);
$router->add('admin/user-update', ['controller' => 'UserController', 'action' => 'update']);
$router->add('admin/user-delete', ['controller' => 'UserController', 'action' => 'destroy']);


$router->add('admin/reviews', ['controller' => 'ReviewController', 'action' => 'index']);
$router->add('admin/review-create', ['controller' => 'ReviewController', 'action' => 'create']);
$router->add('admin/review-store', ['controller' => 'ReviewController', 'action' => 'store']);
$router->add('admin/review-edit', ['controller' => 'ReviewController', 'action' => 'edit']);
$router->add('admin/review-update', ['controller' => 'ReviewController', 'action' => 'update']);
$router->add('admin/review-delete', ['controller' => 'ReviewController', 'action' => 'destroy']);
$router->add('review', ['controller' => 'ReviewController', 'action' => 'storeReview']);


$router->add('login', ['controller' => 'AuthController', 'action' => 'loginForm']);
$router->add('login-store', ['controller' => 'AuthController', 'action' => 'store']);
$router->add('logout', ['controller' => 'AuthController', 'action' => 'logout']);



$router->dispatch($_SERVER['QUERY_STRING']);


?>