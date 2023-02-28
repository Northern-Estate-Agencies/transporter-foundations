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
        public bool $consentsToMarketing = false,
    ) {
    }

    /**
     * @param  array<string, array<string, string>|string>  $data
     */
    public static function fromPayload(array $data): self
    {
        return new self(
            id: strval($data['ID']),
            title: strval($data['title']),
            forename: strval($data['forename']),
            surname: strval($data['surname']),
            email: strval($data['email']),
            consentsToMarketing : ($data['marketingConsent'] === "given")
        );
    }
}
