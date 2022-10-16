<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Course;
use App\Models\Group;
use App\Models\Lecture;
use App\Policies\CoursePolicy;
use App\Policies\GroupPolicy;
use App\Policies\LecturePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Group::class => GroupPolicy::class,
        Lecture::class => LecturePolicy::class,
        Course::class => CoursePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
