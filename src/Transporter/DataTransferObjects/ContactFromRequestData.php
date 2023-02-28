<?php

namespace TransporterFoundations\Transporter\DataTransferObjects;

class ContactFromRequestData
{

    public function __construct(
        public string $id,
        public string $title,
        public string $forename,
        public string $surname,
        public string $email,
        public string $eTag,
        public bool $consentsToMarketing = false,
    ) {
    }

    /**
     * @param  array<mixed>  $data
     */
    public static function fromContactListPayload(array $data):?self
    {

        if(!is_array( $data['_embedded'])){
            return null;
        }

        $mainPayload = $data['_embedded'][0] ?? null;

        if(!$mainPayload){
            return null;
        }

        return self::fromPayload($mainPayload);

    }


    /**
     * @param  array<string, array<string, string>|string>  $data
     */
    public static function fromPayload(array $data): self
    {
        return new self(
            id: strval($data['id']),
            title: strval($data['title']),
            forename: strval($data['forename']),
            surname: strval($data['surname']),
            email: strval($data['email']),
            eTag: strval($data['_eTag']),
            consentsToMarketing : ($data['marketingConsent'] === "given")
        );
    }
}
