<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AccountService;
use App\Services\ActivityService;
use App\Services\ContactService;
use App\Services\CustomerService;
use App\Services\LeadService;
use App\Services\NoteService;
use App\Services\OpportunityService;
use App\Services\TaskService;
use App\Services\UserService;
use App\ServicesImpl\AccountServiceImpl;
use App\ServicesImpl\ActivityServiceImpl;
use App\ServicesImpl\ContactServiceImpl;
use App\ServicesImpl\CustomerServiceImpl;
use App\ServicesImpl\LeadServiceImpl;
use App\ServicesImpl\NoteServiceImpl;
use App\ServicesImpl\OpportunityServiceImpl;
use App\ServicesImpl\TaskServiceImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AccountService::class, AccountServiceImpl::class);
        $this->app->bind(ActivityService::class, ActivityServiceImpl::class);
        $this->app->bind(ContactService::class, ContactServiceImpl::class);
        $this->app->bind(CustomerService::class, CustomerServiceImpl::class);
        $this->app->bind(LeadService::class, LeadServiceImpl::class);
        $this->app->bind(NoteService::class, NoteServiceImpl::class);
        $this->app->bind(OpportunityService::class, OpportunityServiceImpl::class);
        $this->app->bind(TaskService::class, TaskServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
