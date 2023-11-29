<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdate extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $input = $this->all();

        if (isset($input['title'])) {
            $input['title'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $input['title']);
            $input['title'] = trim($input['title']);
        }

        if (isset($input['description'])) {
            $input['description'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $input['description']);
            $input['description'] = trim($input['description']);
        }

        $this->replace($input);
    }

    public function rules(): array
    {
        // dd($this->route('task')->id);
         return [
            'title' => 'required|unique:tasks,title,' . $this->route('task')->id,
            'description' => 'required|min:10|string',
            'status'=> 'required|in:in-progress,pending,complete',
            'due_date'=> 'required|date'
        ];
    }
}
