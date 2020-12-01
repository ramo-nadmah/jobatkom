<?php

use App\Category;
use App\Http\Middleware\Employer;
use App\Http\Middleware\Freelancer;
use App\Job;
use App\Job_Bid;
use App\Task;
use App\Task_Bid;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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


//Route::get('/register','RegisterController@main');
//Route::post('/register','RegisterController@registration');


Route::get('/job', function () {
    return view('job');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', "IndexController@main");

Route::get('/contact',"ContactUsController@main");
Route::post('/contact',"ContactUsController@send");

Route::get('/view-freelancer={id}', 'FreelancerController@viewFreelancer');
Route::get('/view-employer={id}', 'EmployerController@viewEmployer');
Route::get('/task={task_id}', 'TaskController@viewSingleTask');
Route::get('/job={job_id}', 'JobController@viewSingleJob');

Route::get('/browse-jobs','JobController@browseJobs');
Route::get('/search-job','JobController@filterJobs');

Route::get('/browse-tasks','TaskController@browseTasks');
Route::get('/search-task','TaskController@filterTasks');

Route::get('/browse-freelancers','FreelancerController@browseFreelancers');
Route::get('/search-freelancer','FreelancerController@filterFreelancers');


Route::get('/browse-employers','EmployerController@browseEmployers');
Route::get('/search-employer/{letter}','EmployerController@filterEmployers');

Route::get('/logout','LogoutController@logout');



Route::group(["middleware" => ['auth']], function () {

    Route::get('/select', "IndexController@check");


    Route::group(["middleware" => [Freelancer::class]], function () {
        Route::get('/freelancer-info', "FreelancerController@main")->name('freelancersData');
        Route::post('/freelancer-info', "FreelancerController@saveFreelancersData");

        Route::post('/job-bid/{job_id}', 'JobBidController@main');
        Route::post('/task-bid/{task_id}', 'TaskBidController@main');

        Route::get('/freelancer-bids', 'TaskBidController@showFreelancerBids');
        Route::get("/get_form/{id}", function ($id) {
            $task_bid = Task_Bid::findOrFail($id);
            return view("form-generator", compact('task_bid'));
        });
        Route::post('/edit-task-bid/{id}','TaskBidController@editFreelancerBid');
        Route::get('/delete-task-bid/{id}','TaskBidController@deleteFreelancerBid');


        Route::get('/freelancer-applications','JobBidController@showFreelancerApplications');
        Route::get("/get_application_form/{id}", function ($id)
        {
            $job_application = Job_Bid::findOrFail($id);
            return view("application-form-generator", compact('job_application'));
        }
        );
        Route::post('/edit-job-application/{id}','JobBidController@editFreelancerApplication');
        Route::get('/delete-job-application/{id}','JobBidController@deleteFreelancerApplication');


    }
    );

    Route::group(["middleware" => [Employer::class]], function () {

        Route::get('/employer-info', "EmployerController@main")->name('employersData');
        Route::post('/employer-info', "EmployerController@saveEmployersData");

        Route::get('/post-task', 'TaskController@viewPostTask');
        Route::post('/post-task', 'TaskController@postTask');

        Route::get('/post-job', 'JobController@viewPostJob');
        Route::post('/post-job', 'JobController@postJob');

        Route::get('/manage-tasks','TaskController@manageEmployerTasks');
        Route::get("/task-get-form/{id}", function ($id) {
            $task= Task::findOrFail($id);
            $task_skills=Task::findOrFail($id)->pluck('skills');
            $categories=Category::all();
            return view("task-form-generator", compact(['categories','task']));
        });
        Route::post('/edit-task/{id}','TaskController@editTask');
        Route::get('/delete-task/{id}','TaskController@deleteTask');

        Route::get('/manage-jobs','JobController@manageEmployerJobs');
        Route::get("/job-get-form/{id}", function ($id) {
            $job= Job::findOrFail($id);

            $categories=Category::all();
            return view("job-form-generator", compact(['categories','job']));
        });
        Route::post('/edit-job/{id}','JobController@editJob');
        Route::get('/delete-job/{id}','JobController@deleteJob');
        Route::get('/manage-candidates/{job_id}','JobController@showCandidates');
        Route::get('accept-job-request/{job_bid_id}','JobBidController@acceptJobRequest');
        Route::get('reject-job-request/{job_bid_id}','JobBidController@rejectJobRequest');

        Route::get('/manage-bidders/{task_id}','TaskController@showBidders');
        Route::get('accept-task-bid/{task_bid_id}','TaskBidController@acceptTaskBid');
        Route::get('reject-task-bid/{task_bid_id}','TaskBidController@rejectTaskBid');
    }
    );
});


Auth::routes();
