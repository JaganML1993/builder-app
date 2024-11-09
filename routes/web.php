<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HtmlController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/clear', function() { Artisan::call('optimize:clear'); return 'Config cache has been cleared'; });

Route::get('dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'checkUserStatus'])->name('dashboard');


require __DIR__ . '/auth.php';

Route::view('/account/inactive', 'auth.account_inactive')->name('account.inactive');
Route::delete('/services/{service}/tech-image/{image}', [ServiceController::class, 'deleteTechImage'])->name('services.deleteTechImage');
Route::post('/save-html', [HtmlController::class, 'saveHtml'])->name('save-html');
Route::post('/save-html-case-study', [HtmlController::class, 'saveHtmlCaseStudy'])->name('save-html-case-study');
Route::post('/save-html-article', [HtmlController::class, 'saveHtmlArticle'])->name('save-html-article');

Route::middleware(['auth', 'checkUserStatus'])->group(function () {

    Route::prefix('admin')->as('admin.')->group(function () {

        Route::get('index', [AdminController::class, 'index'])->name('index');

        Route::prefix('service')->as('service.')->group(function () {

            Route::get('index', [ServiceController::class, 'index'])->name('index');
            Route::get('create', [ServiceController::class, 'create'])->name('create');
            Route::get('edit/{id}', [ServiceController::class, 'edit'])->name('edit');
            Route::get('publish/{id}', [ServiceController::class, 'publish'])->name('publish');
            Route::post('store', [ServiceController::class, 'store'])->name('store');
            Route::post('update/{id}', [ServiceController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [ServiceController::class, 'delete'])->name('delete');

            Route::get('professional-service-index/{id}', [ServiceController::class, 'professionalServiceIndex'])->name('professional.index');
            Route::get('professional-service-create/{id}', [ServiceController::class, 'professionalServiceCreate'])->name('professional.create');
            Route::post('professional-service-store/{id}', [ServiceController::class, 'professionalServiceStore'])->name('professional.store');
            Route::delete('professional-service-delete/{id}', [ServiceController::class, 'professionalServiceDelete'])->name('professional.delete');

            Route::get('servicesolution-index/{id}', [ServiceController::class, 'serviceSolutionIndex'])->name('servicesolution.index');
            Route::get('servicesolution-create/{id}', [ServiceController::class, 'serviceSolutionCreate'])->name('servicesolution.create');
            Route::post('servicesolution-store/{id}', [ServiceController::class, 'serviceSolutionStore'])->name('servicesolution.store');
            Route::delete('servicesolution-delete/{id}', [ServiceController::class, 'serviceSolutionDelete'])->name('servicesolution.delete');
        });

        Route::prefix('case-study')->as('case-study.')->group(function () {

            Route::get('index', [CaseStudyController::class, 'index'])->name('index');
            Route::get('create', [CaseStudyController::class, 'create'])->name('create');
            Route::get('edit/{id}', [CaseStudyController::class, 'edit'])->name('edit');
            Route::post('store', [CaseStudyController::class, 'store'])->name('store');
            Route::post('update/{id}', [CaseStudyController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [CaseStudyController::class, 'delete'])->name('delete');
            Route::get('publish/{id}', [CaseStudyController::class, 'publish'])->name('publish');
        });

        Route::prefix('article')->as('article.')->group(function () {

            Route::get('index', [ArticleController::class, 'index'])->name('index');
            Route::get('create', [ArticleController::class, 'create'])->name('create');
            Route::get('edit/{id}', [ArticleController::class, 'edit'])->name('edit');
            Route::post('store', [ArticleController::class, 'store'])->name('store');
            Route::post('update/{id}', [ArticleController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [ArticleController::class, 'delete'])->name('delete');
            Route::get('publish/{id}', [ArticleController::class, 'publish'])->name('publish');
        });

        

        Route::prefix('service-list')->as('service-list.')->group(function () {
            // service list
            Route::get('index', [ServiceListController::class, 'index'])->name('index');
            Route::get('create', [ServiceListController::class, 'create'])->name('create');
            Route::post('store', [ServiceListController::class, 'store'])->name('store');
            Route::get('edit/{id}', [ServiceListController::class, 'edit'])->name('edit');
            Route::post('update', [ServiceListController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [ServiceListController::class, 'delete'])->name('delete');
        });

        Route::prefix('sub-service-list')->as('sub-service-list.')->group(function () {
            Route::get('index', [ServiceListController::class, 'indexSub'])->name('index');
            Route::get('create', [ServiceListController::class, 'createSub'])->name('create');
            Route::post('store', [ServiceListController::class, 'storeSub'])->name('store');
            Route::get('edit/{id}', [ServiceListController::class, 'editSub'])->name('edit');
            Route::post('update', [ServiceListController::class, 'updateSub'])->name('update');
            Route::delete('delete/{id}', [ServiceListController::class, 'deleteSub'])->name('delete');
        });

        Route::prefix('sub-sub-service-list')->as('sub-sub-service-list.')->group(function () {
            Route::get('index', [ServiceListController::class, 'indexSubSub'])->name('index');
            Route::get('create', [ServiceListController::class, 'createSubSub'])->name('create');
            Route::post('store', [ServiceListController::class, 'storeSubSub'])->name('store');
            Route::get('edit/{id}', [ServiceListController::class, 'editSubSub'])->name('edit');
            Route::post('update', [ServiceListController::class, 'updateSubSub'])->name('update');
            Route::delete('delete/{id}', [ServiceListController::class, 'deleteSubSub'])->name('delete');
        });

    });
});


Route::get('/get-subservices/{serviceId}', [ServiceController::class, 'getSubServices']);
Route::get('/get-subsubservices/{subServiceId}', [ServiceController::class, 'getSubSubServices']);


Route::get('{slug}', [FrontendController::class, 'service']);
