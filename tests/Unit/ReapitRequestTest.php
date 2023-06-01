<?php

use Illuminate\Support\Facades\Config;
use TransporterFoundations\Transporter\Requests\Reapit\Applicants\ListApplicantsRequest;
//use function Pest\Laravel\mock;
//use Mockery;

beforeAll(function () {

    //$configMock = Mockery::mock(Config::class);

    Config::shouldReceive('get')
            ->with('services.reapit.base_url')->andReturn('https://platform.reapit.cloud/');
        
    Config::shouldReceive('get')
        ->with('services.reapit.client_id')->andReturn('2hv94b3bgkgaq65frp8a224vlc');
    
    Config::shouldReceive('get')
        ->with('services.reapit.client_secret')->andReturn('1cf253dd55o0biqtbgn6qkk1munkv982pu5dq31j2ggi9bqpcmsc');
    
    Config::shouldReceive('get')
            ->with('services.reapit.authentication_url')->andReturn('https://connect.reapit.cloud/');

});

it('can send a reapit request and get a successful response', function () {

    $reapitRequest = ListApplicantsRequest::build();

    expect($reapitRequest->send()->successful())->toBeTrue();

});
