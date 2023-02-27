<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\JournalEntries;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class ListJournalEntriesRequest extends ReapitRequest
{
    protected string $method = 'GET';

    protected string $path = '/journalEntries';
}
