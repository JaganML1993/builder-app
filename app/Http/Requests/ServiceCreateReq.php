<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCreateReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
            'banner_title' => 'required|string|max:255',
            'banner_description' => 'required|string',
            // 'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'body_content' => 'required|string',
            // 'service_list_description' => 'required|string',
            // 'related_service' => 'required|string|max:255',
            // 'professional_service_content' => 'required|string',
            // 'professional_service_logo' => 'required|array|min:1',
            // 'professional_service_title' => 'required|array|min:1',
            // 'professional_service_description' => 'required|array|min:1',
            // 'professional_service_steps' => 'required|string',
            // 'industries_we_serve' => 'required|string',
        ];
    }
}
