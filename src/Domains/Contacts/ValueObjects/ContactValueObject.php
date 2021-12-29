<?php

declare(strict_types=1);

namespace Domains\Contacts\ValueObjects;

use Infrastructure\Contracts\ValueObjectContract;

final class ContactValueObject implements ValueObjectContract
{
    /**
     * @param string|null $title
     * @param string      $firstName
     * @param string|null $middleName
     * @param string|null $lastName
     * @param string|null $preferredName
     * @param string|null $email
     * @param string|null $phone
     * @param string      $pronouns
     */
    public function __construct(
        public  null|string $title,
        public  string $firstName,
        public  null|string $middleName,
        public  null|string $lastName,
        public  null|string $preferredName,
        public  null|string $email,
        public  null|string $phone,
        public  string $pronouns,
    ) {
    }

    /**
     * @return array
     */
    public function toArray(): array  //stored in the database  col=>property name
    {
        return [
            'title'          => $this->title,
            'first_name'     => $this->firstName,
            'middle_name'    => $this->middleName,
            'last_name'      => $this->lastName,
            'preferred_name' => $this->preferredName,
            'email'          => $this->email,
            'phone'          => $this->phone,
            'pronouns'       => $this->pronouns,
        ];
    }
}
