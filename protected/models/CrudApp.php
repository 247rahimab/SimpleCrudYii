<?php

class CrudApp extends CFormModel{
    public $username;
    public $password;
    public $role;
    public $status;
    
    public function rules(){
        return array(
            ['username,password,role,status','required'],
            
            
        );
        
    }
}
