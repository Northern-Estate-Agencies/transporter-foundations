<?php

use TransporterFoundations\Transporter\Requests\Reapit\Applicants\CreateApplicantRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Applicants\GetApplicantRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Applicants\ListApplicantsRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Applicants\UpdateApplicantRequest;

it('can send a request to list applicants and get a successful response', function () {
    $reapitRequest = ListApplicantsRequest::build();
    expect($reapitRequest->send()->successful())->toBeTrue();

});

it('can send a request to list applicants and get a successful response with content', function () {
    $results  = ListApplicantsRequest::build()->send()->json();
    $applicants = $results['_embedded'] ?? [];
    expect(count($applicants))->toBeGreaterThan(0);

});

it('can get a single applicant', function () {
    $results  = ListApplicantsRequest::build()->send()->json();
    $applicants = $results['_embedded'] ?? [];
    $applicant = $applicants[0] ?? [];
    $id = $applicant['id'] ?? '';

    $applicant = GetApplicantRequest::build()->withId($id)->send()->json();

    expect($applicant['id'])->toBe($id);

});

it('can create an applicant', function () {

    $faker = fake('en_GB');
    
    $applicant = [
      "marketingMode"=> "buying",
      "currency"=> "GBP",
      "active"=> true,
      "notes"=> $faker->text(),
      "statusId"=> null,
      "sellingStatus"=> "exchanged",
      "sellingPosition"=> "renting",
      "lastCall"=> $faker->date(),
      "nextCall"=> $faker->date(),
      "departmentId"=> "G",
      "solicitorId"=> "OXF18000012",
      "potentialClient"=> false,
      "type"=> [
        "house",
        "maisonette",
        "cottage"
      ],
      "related" =>
        [
          "associatedId" => "OXF20000001",
          "associatedType" => "contact"
        ]
    ];
    
    $request = CreateApplicantRequest::fake()->withData($applicant)->send();

    expect($request->successful())->toBeTrue();

});

it('can update an applicant', function () {

    $faker = fake('en_GB');
    $fakeId = 'RPT20000001';

    $applicant = [
      "marketingMode"=> "buying",
      "currency"=> "GBP",
      "active"=> true,
      "notes"=> $faker->text(),
      "statusId"=> null,
      "sellingStatus"=> "exchanged",
      "sellingPosition"=> "renting",
      "lastCall"=> $faker->date(),
      "nextCall"=> $faker->date(),
      "departmentId"=> "G",
      "solicitorId"=> "OXF18000012",
      "potentialClient"=> false,
      "type"=> [
        "house",
        "maisonette",
        "cottage"
      ],
      "related" =>
        [
          "associatedId" => "OXF20000001",
          "associatedType" => "contact"
        ]
    ];

    $request = UpdateApplicantRequest::fake()->withId($fakeId)->withData($applicant)->send();

    expect($request->successful())->toBeTrue();

});