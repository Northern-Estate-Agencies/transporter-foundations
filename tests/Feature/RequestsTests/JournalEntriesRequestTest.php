<?php

use Illuminate\Support\Facades\Config;
use TransporterFoundations\Transporter\Requests\Reapit\Applicants\ListApplicantsRequest;
use TransporterFoundations\Transporter\Requests\Reapit\JournalEntries\ListJournalEntriesRequest;

//use function Pest\Laravel\mock;
//use Mockery;

it('can send a request to list journal entries and get a successful response', function () {
    $reapitRequest = ListJournalEntriesRequest::build();
    expect($reapitRequest->send()->successful())->toBeTrue();
});

it('can send a request to list journal entries and get a successful response with content', function () {
    $results  = ListJournalEntriesRequest::build()->send()->json();
    $jorunalEntries = $results['_embedded'] ?? [];
    expect(count($jorunalEntries))->toBeGreaterThan(0);
});
