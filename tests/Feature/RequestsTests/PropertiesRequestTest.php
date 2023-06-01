<?php

use TransporterFoundations\Transporter\Requests\Reapit\Properties\CreatePropertyRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Properties\GetPropertyRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Properties\ListPropertiesRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Properties\UpdatePropertyRequest;

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

it('can create a property', function () {

    $faker = fake('en_GB');
    
    $property = [
        "marketingMode" => "sellingAndLetting",
        "departmentId" => "G",
        "strapline" => null,
        "description" => $faker->text(),
        "summary" => $faker->text(),
        "alternateId" => "10001",
        "address" => [
          "buildingName" => "",
          "buildingNumber" => "15",
          "line1" => "Example street",
          "line2" => "Solihull",
          "line3" => "West Midlands",
          "line4" => "",
          "postcode" => "B91 2XX",
          "countryId" => "GB",
          "geolocation" => [
            "latitude" => 52.4158586,
            "longitude" => 1.7773383
          ]
        ],
        "bedrooms" => 4,
        "bedroomsMax" => 5,
        "numberOfUnits" => 0,
        "receptions" => 1,
        "receptionsMax" => 2,
        "bathrooms" => 2,
        "bathroomsMax" => 3,
        "parkingSpaces" => 0,
      ];
    
    $request = CreatePropertyRequest::fake()->withData($property)->send();

    expect($request->successful())->toBeTrue();

});

it('can update a property', function () {
    
    $fakeId = 'RPT20000001';
    $faker = fake('en_GB');

    $property = [
        "marketingMode" => "sellingAndLetting",
        "departmentId" => "G",
        "strapline" => null,
        "description" => $faker->text(),
        "summary" => $faker->text(),
        "alternateId" => "10001",
        "address" => [
          "buildingName" => "",
          "buildingNumber" => "15",
          "line1" => "Example street",
          "line2" => "Solihull",
          "line3" => "West Midlands",
          "line4" => "",
          "postcode" => "B91 2XX",
          "countryId" => "GB",
          "geolocation" => [
            "latitude" => 52.4158586,
            "longitude" => 1.7773383
          ]
        ],
        "bedrooms" => 4,
        "bedroomsMax" => 5,
        "numberOfUnits" => 0,
        "receptions" => 1,
        "receptionsMax" => 2,
        "bathrooms" => 2,
        "bathroomsMax" => 3,
        "parkingSpaces" => 0,
      ];

    $request = UpdatePropertyRequest::fake()->withId($fakeId)->withData($property)->send();

    expect($request->successful())->toBeTrue();

});