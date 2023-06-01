<?php

use TransporterFoundations\Transporter\Requests\Reapit\Contacts\CreateContactRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Contacts\GetContactRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Contacts\ListContactsRequest;
use TransporterFoundations\Transporter\Requests\Reapit\Contacts\UpdateContactRequest;

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
    
    $faker = fake('en_GB');
    
    $contact = [
        'title' => $faker->title(),
        'forename' => $faker->firstname(),
        'surname' => $faker->lastname(),
        'dateOfBirth' => $faker->date(),
        'active' => true,
        'marketingConsent' => 'NotAsked',
        'identityCheck' => 'NotAsked',
        'source' => 'NotAsked',
        'homePhone' => $faker->phoneNumber(),
        'workPhone' => $faker->phoneNumber(),
        'mobilePhone' => $faker->phoneNumber(),
        'email' => $faker->email(),
    ];
    $request = CreateContactRequest::fake()->withData($contact)->send();

    expect($request->successful())->toBeTrue();

   });

   it('can update a contact', function () {

    $faker = fake('en_GB');

    $fakeId = 'RPT20000001';

    $contact = [
        'title' => $faker->title(),
        'forename' => $faker->firstname(),
        'surname' => $faker->lastname(),
        'dateOfBirth' => $faker->date(),
        'active' => true,
        'marketingConsent' => 'NotAsked',
        'identityCheck' => 'NotAsked',
        'source' => 'NotAsked',
        'homePhone' => $faker->phoneNumber(),
        'workPhone' => $faker->phoneNumber(),
        'mobilePhone' => $faker->phoneNumber(),
        'email' => $faker->email(),
    ];


    $request = UpdateContactRequest::fake()->withId($fakeId)->withData($contact)->send();

    expect($request->successful())->toBeTrue();

   });
