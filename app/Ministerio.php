<?php

namespace crm;

use Illuminate\Database\Eloquent\Model;

class Ministerio extends Model
{
    protected $table ="ministerios";

    public $timestamps = false;

    protected $fillable = ['nombre'];
}
