<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{

    use Notifiable;

    /**
     *  Table name that associated to this model
     *
     * @param string
     */
    protected $table = 'admins';

    /**
     *  Guarded attributes for this model
     *
     * @return array
     */
    protected $guarded = [];
}
