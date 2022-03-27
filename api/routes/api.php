<?php

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SignOutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\MeController;
use App\Http\Controllers\Work\WorkController;
use App\Http\Controllers\Profile\MessagesController;
use App\Http\Controllers\Profile\FriendsController;
use App\Http\Controllers\PigeonHawks\PigeonHawksController;
use App\Http\Controllers\Pigeon\PigeonController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\StoreHouse\StoreHouseController;
use App\Http\Controllers\Marketplace\MarketplaceController;

use App\Mail\WelcomeMail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;

Route::group(['prefix' => 'auth'], function(){
    Route::post('signin' , SignInController::class);
    Route::post('register' , RegisterController::class);
    Route::post('signout' , SignOutController::class);

    Route::get('me' , MeController::class);
});

//Email Route TESTY
Route::get('/email' , function(){
    Mail::to('flaku2012@gmail.com')->send(new WelcomeMail());
    return new WelcomeMail();
});

//Email Route Reset Password TESTY
Route::get('/reset-password-email/{email}' , function($email){
    Mail::to($email)->send(new ResetPasswordMail());
    return new ResetPasswordMail();
});

Route::post('/send_token_email', [ResetPasswordController::class, 'send_token_email'] );
Route::post('/validate_token', [ResetPasswordController::class, 'validate_token'] );
Route::post('/reset_password', [ResetPasswordController::class, 'reset_password'] );
Route::post('/change_password' , [ResetPasswordController::class, 'change_password'] );

Route::group(['prefix' => 'work'], function(){
    Route::post('start' , [WorkController::class, 'start']);
    Route::post('manual_end' , [WorkController::class, 'manual_end']);
    Route::post('end_time_work' , [WorkController::class, 'end_time_work']);
    Route::get('status' , [WorkController::class, 'status']);
});

// PigeonHawks
Route::group(['prefix' => 'pigeonhawks'], function(){
    Route::get('get_user_pigeon_hawks' , [PigeonHawksController::class, 'getUserPigeonHawks']);
    Route::get('get_user_pigeon_hawk/{pigeonhawk}' , [PigeonHawksController::class, 'getUserPigeonHawk']);
    Route::post('clean_hawk' , [PigeonHawksController::class, 'cleanHawk']);
    Route::post('add_level_water_to_hawk' , [PigeonHawksController::class, 'addLevelWaterToHawkHawk']);
    Route::post('add_food_to_hawk', [PigeonHawksController::class, 'addFoodToHawk']);
    Route::post('upgrade_hawk', [PigeonHawksController::class, 'upgradeHawk']);
    Route::post('add_grit', [PigeonHawksController::class, 'addGrit']);
    Route::post('test', [PigeonHawksController::class, 'test']);
});

// Gołębie
Route::group(['prefix' => 'pigeon'], function(){
    Route::get('get_user_pigeons/{pigeon_hawk_id}' , [PigeonController::class, 'getUserPigeons']);
    Route::get('get_user_pigeon/{pigeon_id}' , [PigeonController::class, 'getUserPigeon']);
    Route::get('get_pigeon_parents/{pigeon_id}' , [PigeonController::class, 'getPigeonParents']);
    Route::get('get_pigeon_partner/{pigeon_id}' , [PigeonController::class, 'getPigeonPartner']);
});

// SHOP
Route::group(['prefix' => 'shop'], function(){
    Route::get('get_products' , [ShopController::class, 'getProducts']);
    Route::get('get_products_by_category/{category}' , [ShopController::class, 'getProductsByCategory']);
    Route::get('get_product/{product_id}' , [ShopController::class, 'getProduct']);
    Route::post('buy_product' , [ShopController::class, 'buyProduct']);
});

// STOREHOUSES - magazyn
Route::group(['prefix' => 'storehouse'], function(){
    Route::get('get_storehouse' , [StoreHouseController::class, 'getStoreHouse']);
    Route::get('get_storehouse_by_category' , [StoreHouseController::class, 'getStoreHouseByCategory']);
    Route::post('product_action' , [StoreHouseController::class, 'productAction']);
});

// MARKETPLACE
Route::group(['prefix' => 'marketplace'], function(){
    Route::get('/' , [MarketplaceController::class, 'getMarketplace']);
    Route::get('/details_auction' , [MarketplaceController::class, 'getDetailsAuction']);
});

// FRIENDS
Route::group(['prefix' => 'friends'], function(){
    Route::get('/' , [FriendsController::class, 'getFriends']);
    Route::get('/search' , [FriendsController::class, 'searchFriends']);
    Route::get('/friendship' , [FriendsController::class, 'friendship']);
    Route::get('/has_friend_invitation' , [FriendsController::class, 'hasFriendInvitation']);
});


// wiadomości + websocket
Route::get('messages' , [MessagesController::class, 'fetchMessages']);
Route::post('messages' , [MessagesController::class, 'sendMessage']);

Route::get('weryf' , [MessagesController::class, 'weryfikacja']);


// //test JOB
// Route::get('sendjob', function(){
//     $data = 'testSendJobDone';
//     dispatch( new App\Jobs\SendEmailJob($data) );
// });

// //do testów
// Route::get('test' , [WorkController::class, 'doTestow']);