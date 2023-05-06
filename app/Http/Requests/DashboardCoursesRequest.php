<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DashboardCoursesRequest extends FormRequest
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
        $this->request->set('slug', Str::slug($this->request->get('title')));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'unique:courses'],
            'slug' => ['required', 'unique:courses'],
            'cover' => ['image', 'file', 'max:5120', 'required'],
            'desc' => 'required',
            'body' => 'required',
            'submit' => 'required',
            'category_id' => ['required', Rule::in(Category::pluck('id')->all())],
        ];

        // For PUT or PATCH method.
        if (request()->routeIs('courses.update')) {
            if ($this->request->get('title') == $this->course->title) {
                $rules['title'] = 'required';
            }
            if ($this->request->get('slug') == $this->course->slug) {
                $rules['slug'] = 'required';
            }
            if (!DashboardCoursesRequest::hasFile('cover')) {
                $rules['cover'] = 'sometimes';
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
            'title.required' => 'Judul course harus diisi.',
            'title.unique' => 'Course ini sudah ada.',
            'slug.required' => 'Judul course belum diisi.',
            'slug.unique' => 'Slug tidak tersedia, silahkan cari judul lain.',
            'cover.required' => 'Cover harus dipilih.',
            'cover.image' => 'File tidak didukung.',
            'cover.max' => 'Ukuran file max 5mb.',
            'desc.required' => 'Deskripsi harus diisi.',
            'body.required' => 'Materi harus diisi.',
            'category_id.required' => 'Mata pelajaran harus dipilih.',
            'category_id.in' => 'Mata pelajaran tidak tersedia, silahkan tambahkan terlebih dahulu.',
        ];

        return $messages;
    }
}
