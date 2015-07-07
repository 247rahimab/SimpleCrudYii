<?php
class resultdb{
    public  function insert($username,$role,$password,$status){
        $con = Yii::app()->db;
        $sql ="INSERT INTO user VALUES(null,'$username','$role','$password','$status')";
        $command = $con->CreateCommand($sql);
        $command->execute();
    }
    public function getDataById($id){
        $con = Yii::app()->db;
        $sql ="SELECT * FROM user WHERE id='$id'";
        $data = $con->CreateCommand($sql)->queryAll();
        return $data;
        
    }
    
    
    public function getData(){
        $con = Yii::app()->db;
        $sql ="SELECT * FROM user";
        $data = $con->CreateCommand($sql)->queryAll();
        return $data;
        
    }
    public function updateData($id,$status,$role,$username,$password){
        $con = Yii::app()->db;
        $sql ="UPDATE user SET username='$username',role='$role',password='$password',status='$status' WHERE id=$id";
        $command = $con->CreateCommand($sql);
        $command->execute(); 
    }
    public function delete($id){
        $con = Yii::app()->db;
        $sql ="DELETE FROM user WHERE id=$id";
        $command = $con->CreateCommand($sql);
        $command->execute();  
    }
	public function approve($id,$status){
        $con = Yii::app()->db;
        $sql ="UPDATE user SET status='$status' WHERE id='$id'";
        $command = $con->CreateCommand($sql);
        $command->execute();  
    }
}
