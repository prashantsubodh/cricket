<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'team_id_home' => 'required',
            'team_id_away' => 'required|different:team_id_home',
        ];
    }

    public function messages()
{
    return [
        'team_id_home.required'  => 'Team Home is required.',
        'team_id_away.required'  => 'Team Away is required.',
        'team_id_away.different'  => 'Both Team cannot be same.',
    ];
}
}
