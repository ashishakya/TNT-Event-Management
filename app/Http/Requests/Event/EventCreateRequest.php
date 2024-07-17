<?php

namespace App\Http\Requests\Event;

use App\Constants\DbTables;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"        => ["required", Rule::unique(DbTables::EVENTS, "name")],
            "date"        => ["required", "date:format:Y-m-d", 'after_or_equal:today'],
            "destination" => ["required"],
            "description" => ["required"],
        ];
    }

    public function messages(): array
    {
        return [
            "date.format" => "Event date must be in format Y-m-d",
        ];
    }
}
