<?php

namespace App\Imports;

use App\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportEmployee implements ToCollection, WithHeadingRow
{
    public function  __construct($id)
    {
        $this->id= $id;
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Employee::create([
                'name' => $row['nama'],
                'email' => $row['email'],
                'company' => $this->id,
            ]);
        }
    }

    public function chunkSize(): int
    {
        return 10;
    }
}
