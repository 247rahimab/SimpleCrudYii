<?php
class CrudAppController extends Controller{
 
	public function actionTest(){
        $model = new CrudApp();
        if(isset($_POST['CrudApp'])){
          //Yii::app()->user->setFlash('contact','Thank you for Submitting.');  
            $model->attributes = $_POST['CrudApp'];
            $data = new resultdb();
            $data->insert(
               $model->username,
               $model->password,
               $model->role,     
               $model->status
            );
            
            $model->unsetAttributes();
            $this->redirect("index.php?r=CrudApp/view");
        }
        
        $this->render("index",array("model"=>$model));
    }
    
    public function actionView(){
        $data = new resultdb();
        $val  = $data->getData();
       // print_r($val);
        $this->render('view',array('model'=>$val));
        
    }
    public function actionUpdate(){
        $data = new CrudApp();
        $value = $_GET['data'];
        $username = $_GET['username'];
        $role = $_GET['role'];
        $status = $_GET['status'];
        $password = $_GET['password'];
        
        //Yii::app()->user->setFlash('contact','Thank you for Submitting.');
        if(isset($_POST["CrudApp"])){
            //Yii::app()->user->setFlash('contact','Thank you for Updating.');
            $data->attributes = $_POST['CrudApp'];
            $dbupdate = new resultdb();
            $dbupdate->updateData(
                    $value, 
                    $data->status, 
                    $data->role, 
                    $data->username,
                    $data->password
            );
            
            Yii::app()->user->setFlash('contact','Thank you for Updating.');
            $this->redirect("index.php?r=CrudApp/view");
        }
        $this->render('edit',array('model'=>$data,'data'=>$value,'username'=>$username,'role'=>$role,'status'=>$status,'password'=>$password));
        
    }
    public function actionUpdatebyid(){
        $value = $_GET['data'];
        $dbdata = new resultdb();
        $val = $dbdata->getDataById($value);
       
        //echo $data['username'];
        //Yii::app()->user->setFlash('contact','Thank you for Submitting.');
        
         $dataModel = new CrudApp();
         if(isset($_POST["CrudApp"])){
            //Yii::app()->user->setFlash('contact','Thank you for Updating.');
            $dataModel->attributes = $_POST['CrudApp'];
            $dbdata->updateData(
                    $value, 
                    $dataModel->status, 
                    $dataModel->role, 
                    $dataModel->username,
                    $dataModel->password
            );
            
            Yii::app()->user->setFlash('contact','Thank you for Updating.');
            $this->redirect("index.php?r=CrudApp/view");
      }
//       $this->render('editbyid',array('model'=>$dataModel,'value'=>$val));
       $this->render('editbyid',array('model'=>$dataModel,'value'=>$val));
        
    }
    public function actionDelete(){
        $id = $_GET['data'];
        $dbdelete = new resultdb();
        $dbdelete->delete($id);
        $this->redirect("index.php?r=CrudApp/view");
        
    }
	public function actionApprovebyid(){
        $id = $_GET['data'];
        $status = $_GET['status'];
		//echo $id." ".$status;
		//exit();
		if($status==0) $status=1;
		else $status=0;
        $dbapprove = new resultdb();
        $dbapprove->approve($id,$status);
        $this->redirect("index.php?r=CrudApp/view");
    }
}
?>
