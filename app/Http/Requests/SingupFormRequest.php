<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SingupFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'nom' => 'required',
            'email' => 'required|email|unique:users', /// DESIGNER QUE L"EMAIL DOIT ETRE UNIQUE DONC UNE SEUL MAIL
           
            'password' => 'required|min:5|same:confirmpass',  // confirmed
            'confirmpass' =>'min:5'  
        ];
    }

    public function messages()
    {
        return[
            'nom.required' => 'Le champ nom est requis',
            'email.required' => 'Le champ email est requis',
            'email.unique' => 'le mail existe déjà ', 
            'password.required' => 'Le champ password est requis ',
            'password.min' => 'Le mot de passe doit contenir au moins 5 caracteres',
            'password.confirmed' => 'Le mot de passe n\'est pas la meme',
            'password.same' => 'Le mot de passe n\'est pas la meme',
            
        ];
    }
}
