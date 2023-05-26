<?php

namespace App\Http\Requests;

use App\Models\Quiz;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DashboardQuizQuestionsRequest extends FormRequest
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

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'quiz_id' => ['required', 'numeric', Rule::in(Quiz::pluck('id')->all())],
            'question' => ['required'],
            'explanation' => ['required'],
            'answers' => ['required', 'array'],
            'is_correct' => ['required', 'numeric'],
        ];

        // For PUT or PATCH method.
        if (request()->routeIs('quizzes.updateQuestions')) {
            unset($rules['quiz_id']);
            unset($rules['question']);
            unset($rules['explanation']);
            unset($rules['answers']);
            $rules['oldQuestion'] = ['required'];
            $rules['oldExplanation'] = ['required'];
            $rules['oldAnswers'] = ['required', 'array'];
        }

        return $rules;
    }

    /**
     * Show the messages for request validation.
     */
    public function messages(): array
    {
        $messages = [
            'quiz_id.required' => 'Quiz ID tidak ditemukan.',
            'quiz_id.in' => 'Quiz ID tidak ditemukan.',
            'question.required' => 'Pertanyaan harus diisi.',
            'explanation.required' => 'Penjelasan harus diisi.',
            'oldQuestion.required' => 'Pertanyaan harus diisi.',
            'oldExplanation.required' => 'Penjelasan harus diisi.',
            'answers.required' => 'Jawaban harus diisi.',
            'answers.array' => 'Jawaban tidak valid.',
            'oldAnswers.required' => 'Jawaban harus diisi.',
            'oldAnswers.array' => 'Jawaban tidak valid.',
            'is_correct.required' => 'Jawaban yang benar belum ditentukan.',
            'is_correct.array' => 'Value is_correct tidak valid.',
        ];

        return $messages;
    }
}
