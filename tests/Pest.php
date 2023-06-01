<?php

use Illuminate\Support\Facades\Config;
use Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

//uses(Tests\TestCase::class)->in('Feature');


uses()->beforeAll(function () {

    dd("Here",env('REAPIT_CLIENT_ID'));

    Config::shouldReceive('get')
            ->with('services.reapit.base_url')->andReturn('https://platform.reapit.cloud/');
        
    Config::shouldReceive('get')
        ->with('services.reapit.client_id')->andReturn('2hv94b3bgkgaq65frp8a224vlc');
    
    Config::shouldReceive('get')
        ->with('services.reapit.client_secret')->andReturn('1cf253dd55o0biqtbgn6qkk1munkv982pu5dq31j2ggi9bqpcmsc');
    
    Config::shouldReceive('get')
            ->with('services.reapit.authentication_url')->andReturn('https://connect.reapit.cloud/');

})->in(__DIR__);

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}
