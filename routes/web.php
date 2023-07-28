<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PermissionController;

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
$str =  "Array
    (
        [user_id] => 78
        [tax] => 0
        [restaurant_id] => 46
        [food_orders] => Array
            (
                [0] => Array
                    (
                        [price] => 5.5
                        [quantity] => 2
                        [food_id] => 5646
                        [extras] => Array
                            (
                            )

                        [excludes] => Array
                            (
                            )

                    )

                [1] => Array
                    (
                        [price] => 8
                        [quantity] => 1
                        [food_id] => 5647
                        [extras] => Array
                            (
                            )

                        [excludes] => Array
                            (
                            )

                    )

                [2] => Array
                    (
                        [price] => 9
                        [quantity] => 3
                        [food_id] => 5648
                        [extras] => Array
                            (
                            )

                        [excludes] => Array
                            (
                            )

                    )

                [3] => Array
                    (
                        [price] => 7
                        [quantity] => 1
                        [food_id] => 5643
                        [extras] => Array
                            (
                            )

                        [excludes] => Array
                            (
                                [0] => Array
                                    (
                                        [food_exclude_id] => 99
                                    )

                                [1] => Array
                                    (
                                        [food_exclude_id] => 98
                                    )

                                [2] => Array
                                    (
                                        [food_exclude_id] => 97
                                    )

                                [3] => Array
                                    (
                                        [food_exclude_id] => 96
                                    )

                            )

                    )

                [4] => Array
                    (
                        [price] => 10
                        [quantity] => 2
                        [food_id] => 5649
                        [extras] => Array
                            (
                            )

                        [excludes] => Array
                            (
                            )

                    )

                [5] => Array
                    (
                        [price] => 12
                        [quantity] => 1
                        [food_id] => 5644
                        [extras] => Array
                            (
                                [0] => Array
                                    (
                                        [extra_id] => 93
                                        [price] => 2
                                    )

                                [1] => Array
                                    (
                                        [extra_id] => 92
                                        [price] => 3
                                    )

                                [2] => Array
                                    (
                                        [extra_id] => 91
                                        [price] => 1
                                    )

                            )

                        [excludes] => Array
                            (
                            )

                    )

            )

        [delivery_address_id] => 81
        [restaurant] => Array
            (
                [id] => 46
                [name] => الكهف-الدهماني
                [description] =>
                [address] => الدهماني
                [latitude] => 32.894798
                [longitude] => 13.199173
                [phone] => 920000720
                [mobile] => 914433323
                [information] =>
                [created_at] => 2021-01-04T13:57:25.000000Z
                [updated_at] => 2023-07-06T13:03:32.000000Z
                [rate] => 0
                [media] => Array
                    (
                        [0] => Array
                            (
                                [id] => 160
                                [size] => 108469
                                [url] => https://api-demo.waqtey.com.ly/storage/app/public/160/IMG_2357.JPG
                                [thumb] => https://api-demo.waqtey.com.ly/storage/app/public/160/conversions/IMG_2357-thumb.jpg
                                [icon] => https://api-demo.waqtey.com.ly/storage/app/public/160/conversions/IMG_2357-icon.jpg
                                [formated_size] => 105.9 KB
                                [created_at] => 2021-01-06T17:53:20.000000Z
                                [updated_at] => 2021-01-06T17:53:20.000000Z
                            )

                        [1] => Array
                            (
                                [id] => 8996
                                [size] => 378960
                                [url] => https://api-demo.waqtey.com.ly/storage/app/public/8996/_DSC2553.jpg
                                [thumb] => https://api-demo.waqtey.com.ly/storage/app/public/8996/conversions/_DSC2553-thumb.jpg
                                [icon] => https://api-demo.waqtey.com.ly/storage/app/public/8996/conversions/_DSC2553-icon.jpg
                                [formated_size] => 370.1 KB
                                [created_at] => 2022-09-28T13:31:46.000000Z
                                [updated_at] => 2022-09-28T13:31:46.000000Z
                            )

                    )

                [distance] =>
                [delivery_price] => 0
                [is_closed] =>
                [order_et] => 15
            )

        [delivery_price] => 0
        [delivery_address] => Array
            (
                [id] => 81
                [user_id] => 78
                [description] => شارع ميزران، طرابلس، ليبيا
                [address] => شارع ميزران، طرابلس، ليبيا
                [latitude] => 32.8870584
                [longitude] => 13.1827445
                [name] => شارع ميزران
                [note] =>
                [is_default] => 1
                [created_at] => 2021-03-20T12:05:56.000Z
                [updated_at] => 2023-06-24T19:13:04.000Z
            )

        [order_type_id] => 1
        [wallet_payment] =>
        [latitude] => 32.8870584
        [longitude] => 13.1827445
        [api_token] => 0sfVM0Qbn8q1e3iEvIazX2I1kAzbBAjiHZNrMVH9pUW9N6DWCmXqr3jDFsze
    )";

        //The array we begin with
        // $start_array = array('foo' => 'bar', 'bar' => 'foo', 'foobar' => 'barfoo');

        // //Convert the array to a string
        // $array_string = print_r($start_array, true);

        //Get the new array

            $keys = array();
            $values = array();
            $output = array();

            dd();
              if( substr($str, 0, 5) == 'Array' ) {
                $array_contents = substr($str, 7, -2);
                $array_contents = str_replace(array('[', ']', '=>'), array('#!#', '#?#', ''), $array_contents);
                $array_fields = explode("#!#", $array_contents);
                for($i = 0; $i < count($array_fields); $i++ ) {
                    if( $i != 0 ) {
                        $bits = explode('#?#', $array_fields[$i]);
                        if( $bits[0] != '' ) $output[$bits[0]] = $bits[1];
                    }
                }
                return $output;
            } else {
                echo 'The given parameter is not an array.';
                return null;
            }


});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::resource('departments', DepartmentController::class);
        Route::resource('sections', SectionController::class);
        Route::resource('papers', PaperController::class);
        Route::resource('books', BookController::class);
    });
