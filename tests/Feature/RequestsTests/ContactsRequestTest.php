<?php

use Illuminate\Support\Facades\Config;
use TransporterFoundations\Transporter\Requests\Reapit\Applicants\ListApplicantsRequest;
//use function Pest\Laravel\mock;
//use Mockery;


it('can send a reapit request and get a successful response', function () {

    $reapitRequest = ListApplicantsRequest::build();

    expect($reapitRequest->send()->successful())->toBeTrue();
    //test

});
