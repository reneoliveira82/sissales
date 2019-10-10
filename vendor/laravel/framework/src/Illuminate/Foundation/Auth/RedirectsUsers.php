<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Support\Facades\Auth;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        //return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';

        if (Auth::user()->ativo == 'S'){
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
        }else{
            //return property_exists($this, 'redirectTo') ? $this->redirectTo : '/inactive';
            return '/inactive';
        }
    }
}
