<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Concerns\belongsToMany;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function Categories()
	{
		return $this->belongsToMany('App\Category');
	}

    public function presentPrice(){
      //return money_format('RS%i',$this->price);
      return 'RS '.number_format($this->price);
    }
}
