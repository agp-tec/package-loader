<?php


namespace App\Form;


use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Kris\LaravelFormBuilder\Form;

class BaseForm extends Form
{
    protected $clientValidationEnabled = false;

    public function submit()
    {
        $this->redirectIfNotValid();
        return $this->getFieldValues();
    }
}
