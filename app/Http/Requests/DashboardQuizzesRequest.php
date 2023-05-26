<?php

namespace App\Http\Requests;

use App\Models\Course;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DashboardQuizzesRequest extends FormRequest
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
        $time_minutes = $this->request->has('time_minutes') ? $this->request->get('time_minutes') : 0;
        $time_hours = $this->request->has('time_hours') ? $this->request->get('time_hours') : 0;
        $time_limit = ($time_minutes * 60) + ($time_hours * 3600);
        $this->request->set('time_limit', $time_limit);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'unique:quizzes'],
            'time_limit' => ['required', 'numeric'],
            'course_id' => ['required', Rule::in(Course::pluck('id')->all())],
        ];

        // For PUT or PATCH method.
        if (request()->routeIs('quizzes.update') && $this->request->get('name') == $this->quiz->name) {
            $rules['name'] = 'required';
        }

        return $rules;
    }

    /**
     * Show the messages for request validation.
     */
    public function messages(): array
    {
        $messages = [
            'name.required' => 'Nama quiz harus diisi.',
            'name.unique' => 'Quiz ini sudah ada.',
            'time_limit.required' => 'Time limit tidak boleh kosong.',
            'time_limit.numeric' => 'Time limit harus berupa angka.',
            'course_id.required' => 'Course harus dipilih.',
            'course_id.in' => 'Anda belum memilih course.',
        ];

        return $messages;
    }
}
