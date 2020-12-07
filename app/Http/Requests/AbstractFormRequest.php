<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

abstract class AbstractFormRequest extends FormRequest {


    public function newResponse($errors) {
        return new JsonResponse(['message'=>$errors], 400);
    }

    protected function failedValidation(Validator $validator) {
        throw new ValidationException($validator, $this->newResponse(
            $validator->errors()->first()
        ));
    }



}