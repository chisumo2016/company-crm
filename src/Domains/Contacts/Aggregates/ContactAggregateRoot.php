<?php

declare(strict_types=1);

namespace Domains\Contacts\Aggregates;

use Domains\Contacts\Events\ContactWasCreated;
use Domains\Contacts\Events\ContactWasUpdated;
use Domains\Contacts\ValueObjects\ContactValueObject;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class ContactAggregateRoot extends AggregateRoot
{
    /**
     * @param ContactValueObject $object
     * @return $this
     */
    public function createContact(ContactValueObject $object): self
    {
        $this->recordThat(
            domainEvent: new ContactWasCreated( //goes to events ContactWasCreated
                object: $object
            )
        );

        return $this;
    }

    /**
     * @param ContactValueObject $object
     * @param string  $uuid
     * @return $this
     */
    public function updateContact(ContactValueObject $object, string $uuid): self
    {
        $this->recordThat(
            domainEvent: new ContactWasUpdated( //goes to events ContactWasCreated
               object: $object,
                uuid: $uuid
            )
        );
        return $this;
    }
}
