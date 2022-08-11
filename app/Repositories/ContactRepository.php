<?php

namespace App\Repositories;

use App\Helpers\ApiResponse;
use App\Helpers\ResponseCode;
use App\Models\Contact;

class ContactRepository
{
    public function getAllContactRepositories()
    {
        $contact = Contact::orderBy('name')
            ->where('active', '=', 1)
            ->where('number', 'LIKE', '+%')
            ->get()
            ->map(function ($contact){
                return $this->format($contact);
            });

        return $contact;
    }

    public function findContactByIdRepository($id)
    {
            $contact = Contact::find($id);

            return $this->format($contact);

    }

    protected function format($contact)
    {
        return [
            'contact_id' => $contact->id,
            'name' => $contact->name,
            'number' => $contact->number,
            'active' => $contact->active ? 'active' : 'inactive'
        ];
    }
}
