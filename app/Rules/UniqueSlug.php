<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueSlug implements Rule
{
    public function __construct()
    {
        // Initialization if needed
    }

    public function passes($attribute, $value)
    {
        // Check for slug in the 'services' table
        $existsInServices = DB::table('services')->where('slug', $value)->exists();

        // Check for slug in the 'products' table
        $existsInCaseStudies = DB::table('case_studies')->where('slug', $value)->exists();

        // Check for slug in the 'products' table
        $existsInArticles = DB::table('articles')->where('slug', $value)->exists();

        // The slug must not exist in either table
        return !$existsInServices && !$existsInCaseStudies && !$existsInArticles;
    }

    public function message()
    {
        return 'The :attribute has already been taken.';
    }
}
