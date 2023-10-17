<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Voyager\Actions\ViewAction as MyViewAction;
use TCG\Voyager\Actions\ViewAction;
use App\Voyager\Actions\EditAction as MyEditAction;
use TCG\Voyager\Actions\EditAction;
use App\Voyager\Actions\DeleteAction as MyDeleteAction;
use TCG\Voyager\Actions\DeleteAction;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Voyager::replaceAction(ViewAction::class, MyViewAction::class);
        Voyager::replaceAction(EditAction::class, MyEditAction::class);
        Voyager::replaceAction(DeleteAction::class, MyDeleteAction::class);

        Paginator::useBootstrap();
    }
}
