<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'town',
        'country',
         'post_code'
    ];


    //
  public function contact()
    {
        return $this->belongsTo(Contact::class);
    }


}
