<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Include the checks routes
require __DIR__.'/api/AccountRoutes.php';

// Include the claims routes
require __DIR__.'/api/ActivityRoutes.php';

// Include the providers routes
require __DIR__.'/api/ContactRoutes.php';

// Include the claims routes
require __DIR__.'/api/Customer.php';

// Include the claims routes
require __DIR__.'/api/LeadRoutes.php';

// Include the claims routes
require __DIR__.'/api/NoteRoutes.php';

// Include the claims routes
require __DIR__.'/api/OpportunityRoutes.php';

// Include the claims routes
require __DIR__.'/api/TaskRoutes.php';