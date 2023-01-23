<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportEmployee implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'emp_id' => $row[0],
            'emp_name' => $row[1],
            'emp_designation' => $row[2],
            'emp_joindate' => $row[3],
        ]);
    }
}
