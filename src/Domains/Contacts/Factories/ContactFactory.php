<?php

declare(strict_types=1);

namespace Domains\Contacts\Factories;

use Domains\Contacts\ValueObjects\ContactValueObject;

final class ContactFactory
{
    /**
     * @param array<string ,string> $attributes
     *
     * @return ContactValueObject
     */
    public static function make(array $attributes): ContactValueObject
    {
        //Passing the request coming from the form to the ContactValueObjects
        return new ContactValueObject(
            title:        strval(data_get($attributes, key: 'title')),  //strval()
            firstName:     strval(data_get($attributes, key: 'name.first')),
            middleName:    strval(data_get($attributes, key: 'name.middle')),
            lastName:      strval(data_get($attributes, key: 'name.last')),
            preferredName: strval(data_get($attributes, key: 'name.preferred')),
            email:         strval(data_get($attributes, key: 'email')),
            phone:         strval(data_get($attributes, key: 'phone')),
            pronouns:      strval(data_get($attributes, key: 'pronouns')),
        );
    }
}
