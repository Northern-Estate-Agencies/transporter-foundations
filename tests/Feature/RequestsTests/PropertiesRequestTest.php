<?php

use Illuminate\Support\Facades\Config;
use TransporterFoundations\Transporter\Requests\Reapit\Applicants\ListApplicantsRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Properties\GetPropertyRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Properties\ListPropertiesRequest;

//use function Pest\Laravel\mock;
//use Mockery;

it('can send a request to list properties and get a successful response', function () {
    $reapitRequest = ListPropertiesRequest::build();
    expect($reapitRequest->send()->successful())->toBeTrue();
});

it('can send a request to list properties and get a successful response with content', function () {
    $results  = ListPropertiesRequest::build()->send()->json();
    $properties = $results['_embedded'] ?? [];
    expect(count($properties))->toBeGreaterThan(0);
});

it('can get a single property', function () {
    $results  = ListPropertiesRequest::build()->send()->json();
    $properties = $results['_embedded'] ?? [];
    $property = $properties[0] ?? [];
    $id = $property['id'] ?? '';

    $property = GetPropertyRequest::build()->withId($id)->send()->json();

    expect($property['id'])->toBe($id);
});