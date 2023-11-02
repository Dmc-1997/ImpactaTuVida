<?php

use App\Helpers\Utils;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

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

Route::group(['domain' => 'api.cursos.test'], function() {
    Route::get('/', function() {
        echo 'api';
    });

});

Route::domain('{subdomain}.'.config('app.short_url'))->group(function () {

    Route::get('/', function($subdomain) {
        if ($subdomain == 'www') {
            $r = config('app.url');
            return redirect()->away($r);
        }

        $r = url('/ingresar');
        $find = '://'.$subdomain.'.';
        $exist = Utils::existInString($r, $find);
        if (!$exist) {
            $r = str_replace('://', '://'.$subdomain.'.', $r);
        }
        return redirect()->away($r);
    });

    Route::name('ingresar')->get('/ingresar','Business\BusinessController@login');
    Route::name('recuperar-contrasena')->get('/recuperar-contrasena','Business\BusinessController@forgotpassword');
    //rutas del home
    //Route::get('/', 'Home\HomeController@notAllowed');
    Route::get('/cursos', 'Home\HomeController@notAllowed');
    Route::get('/curso/{id}/{slug}', 'Home\HomeController@notAllowed');

    Route::name('lista')->get('/lista','Home\HomeController@lista');
    
    //Ruta de prueba
    //Route::name('logoutv2')->post('/logoutv2','Home\HomeController@endThisSession');
    
    //Route::post('logoutv2','Home\HomeController@endThisSession');
    

});

/*Route::get('test',function(){
    DB::table('users')->where('id', '=', 5)->update([
        'total_hours' => 33,
    ]);
    echo "Hola Mundo";
    return redirect()->route('logout');
});*/

//HomeController@endThisSession
//Route::post('logoutv2','Home\HomeController@endThisSession');
Route::name('logoutv2')->post('/logoutv2','Home\HomeController@endThisSession');

//rutas del home
Route::get('/', 'Home\HomeController@index');
Route::name('index')->get('/', 'Home\HomeController@index');
Route::name('home')->get('/home', 'Home\HomeController@index');
Route::name('about')->get('/nosotros', 'Home\HomeController@about');
Route::name('blog')->get('/blog', 'Home\HomeController@blog');
Route::name('plans')->get('/planes', 'Home\HomeController@plans');
Route::name('courses')->get('/cursos', 'Home\CourseController@courses');
Route::name('course.show')->get('/curso/{id}/{slug}','Home\CourseController@CourseDetailPage');

Route::name('mycourses')->get('/miscursos', 'Home\CourseController@mycourses');
Route::name('courses.by.category')->get('/categoria/{slug}', 'Home\CourseController@coursesByCategory');
Route::name('contact')->get('/contacto', 'Home\ContactController@index');
Route::name('contact.confirmation')->post('/contacto/confirmacion', 'Home\ContactController@confirmation');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//access control
Route::middleware(['auth:sanctum', 'verified'])->get('/valid/account', 'Home\HomeController@validAccount')->name('valid.account');
Route::name('terminate.user.session')->get('/terminate/user/session', 'Home\HomeController@terminateUserSession');
Route::name('account.suspended')->get('/account/suspended', 'Home\HomeController@accountSuspended');
Route::name('end.this.session')->get('/end/this/session', 'Home\HomeController@endThisSession');

Route::name('invitation')->get('/invitation/{user_id}/{confirmation_code}', 'Home\HomeController@invitation');
Route::name('invitation2')->get('/invitation/{user_id}', 'Home\HomeController@invitation');

//Route::post('/logout', 'Home\HomeController@endThisSession');


//mi cuenta
// Route::name('myaccount')->get('/myaccount/','Account\MyAccountController@index')->middleware('auth');
// Route::name('myaccount.index')->get('/myaccount/index','Account\MyAccountController@index')->middleware('auth');
// Route::name('myaccount.update.my.profile')->post('/myaccount/update/my/profile','Account\MyAccountController@updateMyProfile')->middleware('auth');
// Route::name('myaccount.update.my.avatar')->post('/myaccount/update/my/avatar','Account\MyAccountController@updateMyAvatar')->middleware('auth');
// Route::name('myaccount.update.my.password')->post('/myaccount/update/my/password','Account\MyAccountController@updateMyPassword')->middleware('auth');




//rutas de los usuarios autenticados
Route::group(['middleware' => 'can:accessUserpanel'], function() {

});

 /*Route::get('/register', function() {
     return redirect()->route('login');
 });*/
 
 