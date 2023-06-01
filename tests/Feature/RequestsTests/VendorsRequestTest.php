<?php

use TransporterFoundations\Transporter\Requests\Reapit\Vendors\ListVendorsRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Vendors\GetVendorRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Vendors\UpdateVendorRequest;

//use function Pest\Laravel\mock;
//use Mockery;

it('can send a request to list vendors and get a successful response', function () {
    $reapitRequest = ListVendorsRequest::build();
    expect($reapitRequest->send()->successful())->toBeTrue();
});

it('can send a request to list vendors and get a successful response with content', function () {
    $results  = ListVendorsRequest::build()->send()->json();
    $vendors = $results['_embedded'] ?? [];
    expect(count($vendors))->toBeGreaterThan(0);
});

it('can get a single vendor', function () {
    $results  = ListVendorsRequest::build()->send()->json();
    $vendors = $results['_embedded'] ?? [];
    $vendor = $vendors[0] ?? [];
    $id = $vendor['id'] ?? '';

    $vendor = GetVendorRequest::build()->withId($id)->send()->json();

    expect($vendor['id'])->toBe($id);
});


it('can update a vendor', function () {

    $fakeId = 'RPT20000001';

    $vendor = [
        "lastCall" => "2019-11-12",
        "nextCall" => "2019-12-29",
        "typeId" => "S",
        "sellingReasonId" => "RL",
        "solicitorId" => "OXF12300101",
        "source" => [
          "id" => "OXF",
          "type" => "office"
        ],
        "metadata" => [
          "CustomField1" => "CustomValue1",
          "CustomField2" => true
        ]
    ];

    $request = UpdateVendorRequest::fake()->withId($fakeId)->withData($vendor)->send();

    expect($request->successful())->toBeTrue();

});