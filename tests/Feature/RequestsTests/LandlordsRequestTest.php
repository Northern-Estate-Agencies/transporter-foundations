<?php

use TransporterFoundations\Transporter\Requests\Reapit\Landlords\CreateLandlordRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Landlords\ListLandlordsRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Landlords\GetLandlordRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Landlords\UpdateLandlordRequest;

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

it('can create a landlord', function () {

    $faker = fake('en_GB');
    
    $landlord = [
        "active" => true,
        "solicitorId" => "OXF12300101",
        "officeId" => "OXF",
        "source" => [
          "id" => "GGL",
          "type" => "source"
        ],
        "related" => [
          [
            "associatedId" => "OXF12300101",
            "associatedType" => "contact"
          ]
        ],
        "metadata" => [
          "CustomField1" => "CustomValue1",
          "CustomField2" => true
        ]
    ];
    
    $request = CreateLandlordRequest::fake()->withData($landlord)->send();

    expect($request->successful())->toBeTrue();

});

it('can update a landlord', function () {

    $fakeId = 'RPT20000001';

    $landlord = [
        "active" => true,
        "solicitorId" => "OXF12300101",
        "officeId" => "OXF",
        "source" => [
          "id" => "GGL",
          "type" => "source"
        ],
        "related" => [
          [
            "associatedId" => "OXF12300101",
            "associatedType" => "contact"
          ]
        ],
        "metadata" => [
          "CustomField1" => "CustomValue1",
          "CustomField2" => true
        ]
    ];

    $request = UpdateLandlordRequest::fake()->withId($fakeId)->withData($landlord)->send();

    expect($request->successful())->toBeTrue();

});