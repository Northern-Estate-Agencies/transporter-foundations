<?php

use TransporterFoundations\Transporter\Requests\Reapit\Applicants\GetApplicantRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Applicants\ListApplicantsRequest;

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
