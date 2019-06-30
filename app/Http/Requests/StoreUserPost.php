<?php

namespace App\Http\Requests;

use App\ValueObjects\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $name_between = User\Name::MIN_LENGTH . ',' . User\Name::MAX_LENGTH;
        $pass_between = User\Password::MIN_LENGTH . ',' . User\Password::MAX_LENGTH;
        return [
            'name' => 'required|string|between:' . $name_between,
            'email' => 'required|unique:users|email',
            'password' => 'required|string|between:' . $pass_between,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required', ['attribute' => 'ユーザ名']),
            'name.string' => trans('validation.string', ['attribute' => 'ユーザ名']),
            'name.between'  => trans('validation.between', [
                'attribute' => 'ユーザ名',
                'min' => User\Name::MIN_LENGTH,
                'max' => User\Name::MAX_LENGTH
            ]),
            'email.required' => trans('validation.required', ['attribute' => 'メールアドレス']),
            'email.unique' => trans('validation.unique', ['attribute' => 'メールアドレス']),
            'email.email'  => trans('validation.email'),
            'password.required'  => trans('validation.required', ['attribute' => 'パスワード']),
            'password.string' => trans('validation.string', ['attribute' => 'パスワード']),
            'password.between'  => trans('validation.between', [
                'attribute' => 'パスワード',
                'min' => User\Password::MIN_LENGTH,
                'max' => User\Password::MAX_LENGTH
            ]),
        ];
    }
}
