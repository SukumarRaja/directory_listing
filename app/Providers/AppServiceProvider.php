<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {

            // Log queries in development
            DB::listen(function ($query) {
                $sql = $query->sql;
                $bindings = $query->bindings;
                $time = $query->time;

                // Exclude specific tables from logging
                $excludedTables = ['activity_log', 'telescope_entries', 'telescope_entries_tags', 'telescope_monitoring'];

                foreach ($excludedTables as $table) {
                    if (str_contains($sql, $table)) {
                        return;
                    }
                }

                logger("Query: $sql", ['bindings' => $bindings, 'time' => $time]);
            });
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
