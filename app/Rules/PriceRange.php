<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PriceRange implements Rule
{
    private $minPrice;
    private $maxPrice;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($minPrice, $maxPrice)
    {
        $this->minPrice = $minPrice;
        $this->maxPrice = $maxPrice;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!is_null($this->minPrice) && !is_null($this->maxPrice)) {
            return $this->minPrice <= $this->maxPrice;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Max Price has to be bigger than Min Price.';
    }
}
