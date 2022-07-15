<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kris\LaravelFormBuilder\Form;

class UserSettingsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('password', 'password',[
                'rules' => 'required|min:6|max:16|confirmed'
            ])
            ->add('password_confirmation', 'password');
    }
}
