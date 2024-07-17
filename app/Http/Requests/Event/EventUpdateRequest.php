<?php

namespace App\Http\Requests\Event;

use App\Constants\DbTables;
use App\Models\Event;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventUpdateRequest extends FormRequest
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
            "name" => [
                "required",
                Rule::unique(DbTables::EVENTS, "name")->ignoreModel($this->event),
            ],
            "date"        => ["required", "date:format:Y-m-d"],
            "destination" => ["required"],
            "description" => ["required"],
            "status"      => ["required", Rule::in(Event::VALID_STATUS)],

        ];
    }

    public function messages(): array
    {
        return [
            "date.format" => "Event date must be in format Y-m-d",
        ];
    }
}
