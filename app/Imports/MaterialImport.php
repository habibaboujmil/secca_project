<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Material;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MaterialImport implements ToModel, WithHeadingRow
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {  
        if (isset($row['prix'])) {
            $price = $row['prix'];
        }else  $price = 0 ;
        return new Material([
            'reference'     => $row['reference'],
            'designation'    => $row['designation'], 
            'quantity' => $row['quantite'],
            'unit_price' => $price,
            'brand_id'=> $this->brand_id,
        ]);
    }
}
