<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Birthday extends Model
{
    public $timestamps = false;

    public function month() {
        return date("F", mktime(0, 0, 0, $this->month, 1));
    }

    public function monthNumber() {
        return $this->month;
    }
}
