<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use App\Models\Salary;

class Worker extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'trabajador';
    public $timestamps = false;

    public function getGroupName()
    {
        $group = Group::findOrFail($this->grupo_id);

        return $group->nombre;
    }

    public function getSalary()
    {
        $group = Group::findOrFail($this->grupo_id);

        $salary = Salary::firstWhere('grupo_id', $group->id);

        return $salary->cantidad;
    } 
}
