<?php

use TransporterFoundations\Transporter\Requests\Reapit\Landlords\ListLandlordsRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Landlords\GetLandlordRequest;


it('can send a request to list landlords and get a successful response', function () {
    $reapitRequest = ListLandlordsRequest::build();
    expect($reapitRequest->send()->successful())->toBeTrue();
});

it('can send a request to list landlords and get a successful response with content', function () {
    $results  = ListLandlordsRequest::build()->send()->json();
    $landlords = $results['_embedded'] ?? [];
    expect(count($landlords))->toBeGreaterThan(0);
});

it('can get a single landlord', function () {
    $results  = ListLandlordsRequest::build()->send()->json();
    $landlords = $results['_embedded'] ?? [];
    $landlord = $landlords[0] ?? [];
    $id = $landlord['id'] ?? '';

    $landlord = GetLandlordRequest::build()->withId($id)->send()->json();

    expect($landlord['id'])->toBe($id);
});
