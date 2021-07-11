<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  use HasFactory;

  protected $table = 'contacts';
  protected $guarded = array('id');
  public static $rules = array(
    'familyname' => 'required',
    'firstname' => 'required',
    'gender' => 'required',
    'email' => 'required',
    'postcode' => 'required|min:8|max:8',
    'address' => 'required',
    'building' => '',
    'opinion' => 'required|max:120'
  );
  public $timestamps = true;
}
