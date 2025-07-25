<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\People\StorePersonImageRequest;
use App\Models\Person;
use App\Models\User;
use App\Policies\V1\UserPolicy;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadPersonImageController extends ApiController
{
    protected $policyClass = UserPolicy::class;

    /**
     * Uploading a photo for a person
     */
    public function __invoke(StorePersonImageRequest $request, Person $person)
    {
        if($person->load("user"))
        {
            if(!$this->isAble('update',  Auth::user()))
            {
                return $this->notAuthorized('You Are Not Authorized');
            }
            unset($person->user);
        }

        if($request->hasFile("personImage"))
        {
            $personImage = $request->file("personImage");
            $imagePath = str()->uuid() . '.' . $personImage->extension();
            $personImage = Storage::disk('public')
                ->putFileAs('/',
                    $personImage,
                    $imagePath);
            $person->update([
                'imagePath' => $imagePath,
            ]);
            return $this->ok('Image Uploaded successfully.', 200);
        }

    }
}
