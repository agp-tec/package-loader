<?php


namespace App\Form\Filter;


use Kris\LaravelFormBuilder\Filters\FilterInterface;

class MoedaFormFilter implements FilterInterface
{
    public function filter($value, $options = [])
    {
        // TODO: Implement filter() method.
    }

    public function getName()
    {
        return "moeda_form_filter";
    }
}
