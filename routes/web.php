<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\DoctorController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MLConntroller;
use App\Http\Middleware\AuthSetter;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/articles/example', function(){
    return view('discover.articles.show');
} );

Route::resource('learn', \App\Http\Controllers\Learn\LearnController::class);

Route::resource('blog', \App\Http\Controllers\Blog\BlogController::class);

Route::resource('articles', ArticleController::class);


Route::controller(MainController::class)
    ->name('discover.')
    ->group(function(){
        Route::get('/discover', 'index')->name('index');
    });
Route::controller(ArticleController::class)
    ->name('articles.')
    ->group(function(){

        //Route::get('articles/{article}/like', 'like')

        //Route::get('articles/{article}/comment', 'like')

        //Route::get('articles/{article}/share', 'like')

    });


Route::get('test-text', function (){
    $classifier = new \App\Services\Ai\TextEmotionService();

    $emotions = $classifier->classify('i am very happy for you');

    dd($emotions);
});

Route::get('test-post', function() {
    dd(\App\Services\Ai\PostAnalysisService::detectFromText('i have a headache'));
});

Route::controller(\App\Http\Controllers\Medical\MainController::class)
    ->group(function(){
        Route::post('/{patient}/alert', 'alert');
    });

Route::middleware([AuthSetter::class])->group(function () {
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            $user = auth()->user();

            $redirectTo = \App\Enums\AuthRoles::PATIENT;

            if( $user->role == \App\Enums\AuthRoles::PATIENT->value ){
                $redirectTo = "/workspace";
            }
            if( $user->role == \App\Enums\AuthRoles::DOCTOR->value ){
                $redirectTo = "/doctor/workspace";
            }
            return redirect($redirectTo);
        })->name('dashboard');
    });

    Route::get('/d', function(){
        return 'f4';
    });
    Route::get('/test', function () {
        $process = Artisan::call('analyzer:run', [
            '--audio' => base_path('\storage\app\public\audio\661fe8c165407.wav')
        ]);

        $output = Artisan::output();

        return $output;
    });

    Route::get('/test-chat', function () {
        return view('test');
    });

    Route::get('/test-chain', [MainController::class, "chain"]);

    Route::post('/upload-audio', [MainController::class, 'upload']);

    Route::middleware(['auth'])
        ->group(function () {

            Route::controller(ChatController::class)
                ->group(function () {


                    Route::get('/chat', 'create');

                    Route::post('message/send', 'send');
                });
        });


    Route::get("/profile", function(){
        return view('auth.custom.profile');
    });
});


Route::resource('doctors', DoctorController::class)
    ->except(
        'create',
        'edit',
        'delete'
    );

Route::controller(DoctorController::class)
    ->group(function(){
        Route::get('/doctors/{doctor}/{section}', 'profile')->name('doctor.profile');
    });

Route::get('/s', function(){
    $t = "These symptoms could indicate an underlying medical condition, such as: * **Hyperthyroidism:** An overactive thyroid gland can cause increased appetite, weight loss, sleep disturbances, and anxiety. * **Diabetes:** Untreated diabetes can lead to excessive thirst and hunger, weight loss, and difficulty sleeping. * **Anxiety disorder:** Anxiety can trigger increased eating, sleep problems, and feelings of restlessness. * **Inflammatory bowel disease (IBD):** Conditions like ulcerative colitis and Crohn's disease can cause increased appetite, weight loss, and sleep disturbances. * **Cancer:** In some cases, certain types of cancer can lead to unexplained weight loss, appetite changes, and sleep issues. It's important to consult a healthcare professional to determine the cause of your symptoms and receive appropriate treatment. They may recommend: * **Physical exam:** To check for signs and symptoms of underlying conditions. * **Blood tests:** To assess thyroid function, blood sugar levels, and inflammatory markers. * **Imaging tests:** Such as X-rays or CT scans, to rule out structural abnormalities or masses. * **Referral to a specialist:** Depending on the suspected diagnosis, they may refer you to an endocrinologist, gastroenterologist, or mental health professional for further evaluation and treatment. Early detection and treatment of an underlying medical condition is crucial for improving your health and well-being.";
    dd(formatNormalMessage($t));
});

Route::controller(\App\Http\Controllers\Medical\FollowingController::class)
    ->group(function(){
        Route::post('doctors/{doctor}/request', 'sendFollowRequest');

        Route::post('following-requests/{patient}/accept', 'acceptRequest');
    });


//social routes here

Route::controller(AuthController::class)->name("social.")->prefix("auth")
    ->group(function () {

        Route::get('redirect/{service}', "socialRedirect")->name("redirect");

        Route::get('/{service}/callback', 'socialCallback')->name('callback');
    });
