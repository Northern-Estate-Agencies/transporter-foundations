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
        "description" => "We are delighted to offer for sale this EXTENDED THREE BEDROOMED SEMI DETACHED PROPERTY situated in a much sought after residential location of Greasby, having the benefits of two separate entertaining rooms, morning room, extended kitchen. To the first floor there are three bedrooms, spacious family bathroom, gas central heating gardens front and rear and off road parking.",
        "summary" => null,
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
        "councilTax" => "A",
        "internetAdvertising" => true,
        "viewingArrangements" => "Accompanied viewings after 3PM only",
        "videoUrl" => "https =>//www.example.com/property/123/videoTour",
        "videoCaption" => "Virtual property tour",
        "video2Url" => "https =>//www.example.com/property/123/3dVideoTour",
        "video2Caption" => "3d virtual property tour",
        "notes" => "Property was on the market previously with another agent but struggled to get much interest",
        "longDescription" => "The ground floor accommodation comprises of a spacious reception hall with a wet bar, a grand drawing room, master bedroom suite and a further bedroom suite. The lower floor comprises of an eat in kitchen leading to converted vaults which could be used as staff accommodation or a study. There is also separate dining room and a further bedroom suite.",
        "boardStatus" => "FS",
        "boardNotes" => "Include 'sold in a week' slip",
        "boardUpdated" => "2021-07-02",
        "valuation" => "2021-04-05",
        "epc" => [
          "exempt" => false,
          "eer" => 45,
          "eerPotential" => 71,
          "eir" => 53,
          "eirPotential" => 81
        ],
        "externalArea" => [
          "type" => "acres",
          "min" => 1,
          "max" => 2
        ],
        "internalArea" => [
          "type" => "squareFeet",
          "min" => 1500,
          "max" => 2000
        ],
        "rural" => [
          "buildingsDescription" => "2 barns and a stable",
          "landDescription" => "400 acres of mixed arable"
        ],
        "selling" => [
          "instructed" => "2018-11-18",
          "price" => 250000,
          "reservationFee" => 0,
          "qualifier" => "askingPrice",
          "status" => "underOffer",
          "disposal" => "privateTreaty",
          "completed" => "2019-08-27",
          "exchanged" => "2019-08-15",
          "accountPaid" => "2019-08-29",
          "tenure" => [
            "type" => "leasehold",
            "expiry" => "2019-05-01"
          ],
          "sellingAgency" => "ownToSell",
          "agencyId" => null,
          "agreementExpiry" => "2019-01-20",
          "fee" => [
            "type" => "percentage",
            "amount" => 2.5
          ],
          "recommendedPrice" => 250000,
          "valuationPrice" => null,
          "decoration" => [
            "good",
            "veryGood"
          ],
          "sharedOwnership" => [
            "sharedPercentage" => 55.44,
            "rent" => 1250.55,
            "rentFrequency" => "weekly"
          ]
        ],
        "letting" => [
          "instructed" => "2018-11-18",
          "availableFrom" => "2018-12-26",
          "availableTo" => "2019-03-23",
          "agreementSigned" => null,
          "rent" => 750,
          "rentFrequency" => "monthly",
          "rentIncludes" => null,
          "furnishing" => [
            "furnished",
            "partFurnished"
          ],
          "agentRole" => "managed",
          "term" => "long",
          "status" => "toLet",
          "landlordId" => "LLD210001",
          "worksOrderNote" => "Please arrange access to property directly with the tenant",
          "minimumTerm" => 12,
          "managementFee" => [
            "type" => "fixed",
            "amount" => 150
          ],
          "lettingFee" => [
            "type" => "percentage",
            "amount" => 1.3
          ],
          "qualifier" => "askingRent",
          "utilities" => [
            "hasGas" => true,
            "gasCompanyId" => "OXF21000001",
            "gasMeterPoint" => "123",
            "electricityCompanyId" => "OXF21000003",
            "electricityMeterPoint" => "789",
            "waterCompanyId" => "OXF21000002",
            "waterMeterPoint" => "456",
            "telephoneCompanyId" => "OXF21000006",
            "internetCompanyId" => "OXF21000004",
            "cableTvCompanyId" => "OXF21000005"
          ],
          "deposit" => [
            "type" => "months",
            "amount" => 1
          ]
        ],
        "regional" => null,
        "type" => [
          "house"
        ],
        "style" => [
          "detached"
        ],
        "situation" => [
          "garden",
          "land",
          "patio"
        ],
        "parking" => [
          "secure",
          "doubleGarage"
        ],
        "age" => [
          "period"
        ],
        "locality" => [
          "rural",
          "village"
        ],
        "rooms" => [
          [
            "name" => "Kitchen",
            "dimensions" => "4.5m x 5.2m",
            "description" => "The breakfast kitchen, with utility, comprises a matching range of wall and base units with ceramic hob and eye level double oven. A side door leads to the front courtyard area."
          ],
          [
            "name" => "Lounge",
            "dimensions" => "6.5m x 7.8m",
            "description" => "The lounge, with a brick feature fireplace housing a Clearview stove, provides an ideal space to relax and unwind, whilst enjoying views over the Golf Course."
          ],
          [
            "name" => "Dining Room",
            "dimensions" => "5.1m x 6.2m",
            "description" => "The formal dining room is the perfect space to entertain and provides access to the useful study."
          ]
        ],
        "roomDetailsApproved" => false,
        "negotiatorId" => "JAS",
        "officeIds" => [
          "OXF",
          "SOL"
        ],
        "areaId" => "BRM",
        "url" => "https =>//www.example.com/property/15-example-street/OXF200008",
        "urlCaption" => "View Property on Website",
        "groundRent" => 24,
        "groundRentComment" => "Payable in two bi-annual instalments",
        "groundRentReviewDate" => "2021-10-05",
        "groundRentIncrease" => 42.66,
        "serviceCharge" => 24,
        "serviceChargeComment" => "Payable in two bi-annual instalments",
        "metadata" => [
          "CustomField1" => "CustomValue1",
          "CustomField2" => true
        ]
      ];
    
    $request = CreatePropertyRequest::fake()->withData($property)->send();

    expect($request->successful())->toBeTrue();

});

it('can update a property', function () {

    $fakeId = 'RPT20000001';

    $property = [
        "marketingMode" => "sellingAndLetting",
        "departmentId" => "G",
        "strapline" => null,
        "description" => "We are delighted to offer for sale this EXTENDED THREE BEDROOMED SEMI DETACHED PROPERTY situated in a much sought after residential location of Greasby, having the benefits of two separate entertaining rooms, morning room, extended kitchen. To the first floor there are three bedrooms, spacious family bathroom, gas central heating gardens front and rear and off road parking.",
        "summary" => null,
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
        "councilTax" => "A",
        "internetAdvertising" => true,
        "viewingArrangements" => "Accompanied viewings after 3PM only",
        "videoUrl" => "https =>//www.example.com/property/123/videoTour",
        "videoCaption" => "Virtual property tour",
        "video2Url" => "https =>//www.example.com/property/123/3dVideoTour",
        "video2Caption" => "3d virtual property tour",
        "notes" => "Property was on the market previously with another agent but struggled to get much interest",
        "longDescription" => "The ground floor accommodation comprises of a spacious reception hall with a wet bar, a grand drawing room, master bedroom suite and a further bedroom suite. The lower floor comprises of an eat in kitchen leading to converted vaults which could be used as staff accommodation or a study. There is also separate dining room and a further bedroom suite.",
        "boardStatus" => "FS",
        "boardNotes" => "Include 'sold in a week' slip",
        "boardUpdated" => "2021-07-02",
        "valuation" => "2021-04-05",
        "epc" => [
          "exempt" => false,
          "eer" => 45,
          "eerPotential" => 71,
          "eir" => 53,
          "eirPotential" => 81
        ],
        "externalArea" => [
          "type" => "acres",
          "min" => 1,
          "max" => 2
        ],
        "internalArea" => [
          "type" => "squareFeet",
          "min" => 1500,
          "max" => 2000
        ],
        "rural" => [
          "buildingsDescription" => "2 barns and a stable",
          "landDescription" => "400 acres of mixed arable"
        ],
        "selling" => [
          "instructed" => "2018-11-18",
          "price" => 250000,
          "reservationFee" => 0,
          "qualifier" => "askingPrice",
          "status" => "underOffer",
          "disposal" => "privateTreaty",
          "completed" => "2019-08-27",
          "exchanged" => "2019-08-15",
          "accountPaid" => "2019-08-29",
          "tenure" => [
            "type" => "leasehold",
            "expiry" => "2019-05-01"
          ],
          "sellingAgency" => "ownToSell",
          "agencyId" => null,
          "agreementExpiry" => "2019-01-20",
          "fee" => [
            "type" => "percentage",
            "amount" => 2.5
          ],
          "recommendedPrice" => 250000,
          "valuationPrice" => null,
          "decoration" => [
            "good",
            "veryGood"
          ],
          "sharedOwnership" => [
            "sharedPercentage" => 55.44,
            "rent" => 1250.55,
            "rentFrequency" => "weekly"
          ]
        ],
        "letting" => [
          "instructed" => "2018-11-18",
          "availableFrom" => "2018-12-26",
          "availableTo" => "2019-03-23",
          "agreementSigned" => null,
          "rent" => 750,
          "rentFrequency" => "monthly",
          "rentIncludes" => null,
          "furnishing" => [
            "furnished",
            "partFurnished"
          ],
          "agentRole" => "managed",
          "term" => "long",
          "status" => "toLet",
          "landlordId" => "LLD210001",
          "worksOrderNote" => "Please arrange access to property directly with the tenant",
          "minimumTerm" => 12,
          "managementFee" => [
            "type" => "fixed",
            "amount" => 150
          ],
          "lettingFee" => [
            "type" => "percentage",
            "amount" => 1.3
          ],
          "qualifier" => "askingRent",
          "utilities" => [
            "hasGas" => true,
            "gasCompanyId" => "OXF21000001",
            "gasMeterPoint" => "123",
            "electricityCompanyId" => "OXF21000003",
            "electricityMeterPoint" => "789",
            "waterCompanyId" => "OXF21000002",
            "waterMeterPoint" => "456",
            "telephoneCompanyId" => "OXF21000006",
            "internetCompanyId" => "OXF21000004",
            "cableTvCompanyId" => "OXF21000005"
          ],
          "deposit" => [
            "type" => "months",
            "amount" => 1
          ]
        ],
        "regional" => null,
        "type" => [
          "house"
        ],
        "style" => [
          "detached"
        ],
        "situation" => [
          "garden",
          "land",
          "patio"
        ],
        "parking" => [
          "secure",
          "doubleGarage"
        ],
        "age" => [
          "period"
        ],
        "locality" => [
          "rural",
          "village"
        ],
        "rooms" => [
          [
            "name" => "Kitchen",
            "dimensions" => "4.5m x 5.2m",
            "description" => "The breakfast kitchen, with utility, comprises a matching range of wall and base units with ceramic hob and eye level double oven. A side door leads to the front courtyard area."
          ],
          [
            "name" => "Lounge",
            "dimensions" => "6.5m x 7.8m",
            "description" => "The lounge, with a brick feature fireplace housing a Clearview stove, provides an ideal space to relax and unwind, whilst enjoying views over the Golf Course."
          ],
          [
            "name" => "Dining Room",
            "dimensions" => "5.1m x 6.2m",
            "description" => "The formal dining room is the perfect space to entertain and provides access to the useful study."
          ]
        ],
        "roomDetailsApproved" => false,
        "negotiatorId" => "JAS",
        "officeIds" => [
          "OXF",
          "SOL"
        ],
        "areaId" => "BRM",
        "url" => "https =>//www.example.com/property/15-example-street/OXF200008",
        "urlCaption" => "View Property on Website",
        "groundRent" => 24,
        "groundRentComment" => "Payable in two bi-annual instalments",
        "groundRentReviewDate" => "2021-10-05",
        "groundRentIncrease" => 42.66,
        "serviceCharge" => 24,
        "serviceChargeComment" => "Payable in two bi-annual instalments",
        "metadata" => [
          "CustomField1" => "CustomValue1",
          "CustomField2" => true
        ]
      ];

    $request = UpdatePropertyRequest::fake()->withId($fakeId)->withData($property)->send();

    expect($request->successful())->toBeTrue();

});