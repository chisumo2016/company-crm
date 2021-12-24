<?php

namespace Domains\Contacts\Actions;

use Infrastructure\Contracts\ValueObjectContract;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;

final  class  CreateNewContact
{
    /**
     * @param ValueObjectContract $object
     * @return Model
     */
      public static  function  handle(ValueObjectContract $object): Model
      {

        return  Contact::query()->create(
            attributes: $object->toArray(),
        );
      }
}
