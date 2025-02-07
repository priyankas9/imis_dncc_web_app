<?php
// Last Modified Date: 10-04-2024
// Developed By: Innovative Solution Pvt. Ltd. (ISPL)    
namespace App\Http\Requests\Fsm;

use Illuminate\Foundation\Http\FormRequest;

class TreatmentPlantTestRequest extends FormRequest
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


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'treatment_plant_id.required' => 'Treatment Plant is required.',
            'date.required' => 'Sample Date is required.',
            'temperature.integer' => 'Temperature °C must be number',
            'ph.integer' => 'pH must be number',
            'cod.integer' => 'COD (mg/l) must be number',
            'bod.integer' => 'BOD (mg/l) must be number',
            'tss.integer' => 'TSS (mg/l) must be number',
            'ecoli.integer' => 'Ecoli must be an integer',
            'cod.required' => 'COD (mg/l) is required.',
            'ph.required' => 'pH is required.',
            'bod.required' => 'BOD (mg/l) is required.',
            'tss.required' => 'TSS (mg/l) is required.',
            'ecoli.required' => 'Ecoli is required.',
            'temperature.required' => 'Temperature °C is required.',
        ];
    }

    public function rules()
    {

        $rules = ($this->isMethod('POST') ? $this->store() : $this->update());
        return $rules;
    }



    public function store()
    {
        $rules = [
            'treatment_plant_id' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'temperature' => 'required|numeric|min:0',
            'ph' => 'required|numeric|between:0,14',
            'cod' => 'required|numeric|min:0',
            'bod' => 'required|numeric|min:0',
            'tss' => 'required|numeric|min:0',
            'ecoli' => 'required|integer|min:0'
        ];

        return $rules;
    }




    public function update()
    {
        return [
            'treatment_plant_id' => 'required',
            'date' => 'required',
            'temperature' => 'required|numeric|min:0',
            'ph' => 'required|numeric|between:0,14',
            'cod' => 'required|numeric|min:0',
            'bod' => 'required|numeric|min:0',
            'tss' => 'required|numeric|min:0',
            'ecoli' => 'required|integer|min:0'
        ];
    }
}
