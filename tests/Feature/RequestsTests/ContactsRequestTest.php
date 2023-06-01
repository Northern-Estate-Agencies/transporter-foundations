<?php

use TransporterFoundations\Transporter\Requests\Reapit\Contacts\CreateContactRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Contacts\GetContactRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Contacts\ListContactsRequest;


it('can send a request to list contacts and get a successful response', function () {
    $reapitRequest = ListContactsRequest::build();
    expect($reapitRequest->send()->successful())->toBeTrue();
});

it('can send a request to list contacts and get a successful response with content', function () {
    $results  = ListContactsRequest::build()->send()->json();
    $contacts = $results['_embedded'] ?? [];
    expect(count($contacts))->toBeGreaterThan(0);
});

it('can get a single contact', function () {
    $results  = ListContactsRequest::build()->send()->json();
    $contacts = $results['_embedded'] ?? [];
    $contact = $contacts[0] ?? [];
    $id = $contact['id'] ?? '';

    $contact = GetContactRequest::build()->withId($id)->send()->json();

    expect($contact['id'])->toBe($id);
});

it('can create a contact', function () {
    $contact = [
        'title' => 'Mr',
        'forename' => 'E Z',
        'surname' => 'Neag',
        'dateOfBirth' => '1980-01-01',
        'active' => true,
        'marketingConsent' => 'NotAsked',
        'identityCheck' => 'NotAsked',
        'source' => 'NotAsked',
        'homePhone' => '01234567890',
        'workPhone' => '01234567890',
        'mobilePhone' => '01234567890',
        'email' => 'neag101@test.com'
    ];


    $request = CreateContactRequest::fake()->withData($contact)->send();

    expect($request->successful())->toBeTrue();

   });
