<?php

use Illuminate\Support\Facades\Config;
use TransporterFoundations\Transporter\Requests\Reapit\Applicants\ListApplicantsRequest;
use TransporterFoundations\Transporter\Requests\Reapit\JournalEntries\CreateJournalEntryRequest;
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

it('can create a journal entry', function () {

    $journalEntry = [
        "typeId" => "MI",
        "propertyId" => "OXF190022",
        "associatedType" => "applicant",
        "associatedId" => "OXF190001",
        "description" => "Mr John Smith contacted us via live chat regarding 62 Test Road",
        "negotiatorId" => "JAS"
    ];
    
    $request = CreateJournalEntryRequest::fake()->withData($journalEntry)->send();

    expect($request->successful())->toBeTrue();

});