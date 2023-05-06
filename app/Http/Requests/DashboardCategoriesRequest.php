<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class DashboardCategoriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Do something before validator validate the request.
     */
    protected function prepareForValidation(): void
    {
        $this->request->set('name', ucwords($this->request->get('name')));
        $this->request->set('slug', Str::slug($this->request->get('name')));
        $this->request->set('code', strtoupper($this->request->get('code')));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'unique:categories'],
            'slug' => ['required', 'unique:categories'],
            'code' => ['required', 'unique:categories', 'alpha:ascii'],
        ];

        // For PUT or PATCH method.
        if (request()->routeIs('categories.update')) {
            foreach ($rules as $name => $validation) {
                $rules[$name] = $this->request->get($name) == $this->category->$name ? 'required' : $validation;
            }
        }

        return $rules;
    }

    /**
     * Show the messages for request validation.
     */
    public function messages(): array
    {
        $messages = [
            'name.required' => 'Nama mata pelajaran harus diisi.',
            'name.unique' => 'Mata pelajaran ini sudah ada.',
            'slug.required' => 'Nama mata pelajaran belum diisi.',
            'slug.unique' => 'Slug tidak tersedia, silahkan cari mata pelajaran lain.',
            'code.required' => 'Code untuk mata pelajaran ini belum diisi.',
            'code.unique' => 'Code untuk mata pelajaran ini sudah terpakai, silahkan cari code lain.',
            'code.alpha' => 'Code harus berupa huruf.',
        ];

        return $messages;
    }
}
