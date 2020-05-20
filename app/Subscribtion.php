<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribtion extends Model
{
    public static function check_add_subscription($email) {
        $subscriptions = Subscribtion::all();
        if($subscriptions->where('email', $email)->first()) {
            return false;
        } else {
            $sub = new Subscribtion();
            $sub->email = $email;
            $sub->save();
            return true;
        }
    }
}
