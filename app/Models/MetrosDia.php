<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetrosDia extends Model
{
    use HasFactory;

    protected $table = 'metros_dia';

    public function getSalary()
    {
        $salary = $this->cantidad * $this->precio_metro;

        return $salary;
    }
}