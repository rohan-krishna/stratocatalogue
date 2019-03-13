<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    protected $guarded = ['id'];

    public function parentCategory() {

        if($this->parent_id && $this->parent_id !== 0) {
            $parent = ProductCategory::find($this->parent_id);
            return $parent;
        } else {
            return "-";
        }

    }
}
