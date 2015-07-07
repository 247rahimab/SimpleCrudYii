<h2>Admin Manage Page</h2>
<hr>
<table style="border:2px solid #212121">
    <tr>
        
        <td>
            <?php // echo CHtml::link('+Add User Here',array('CrudApp/Test')); ?>
            <a href="index.php?r=CrudApp/Test">+Add User Here</a>
        </td>
    
    </tr>
    <hr>
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Status</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
    <tr>
<?php
//print_r($model);
foreach($model as $data){
    
       echo"<td>"; 
        echo $data['username'];
       echo"</td>";
       echo"<td>"; 
        echo $data['password'];
       echo"</td>";
       echo"<td>"; 
        echo $data['status'];
       echo"</td>";
       echo"<td>"; 
        echo $data['role'];
       echo"</td>";
       ?>
    <td> 
       
        <!--<a href="index.php?r=CrudApp/Updatebyid&data=<?php// echo $data['id']; ?>&username=<?php //echo $data['username']; ?>&password=<?php //echo $data['password']; ?>&role=<?php //echo $data['role']; ?>&status=<?php //echo $data['status']; ?>">Edit</a> ||<a href="index.php?r=CrudApp/delete&data=<?php //echo $data['id']; ?>">Delete</a>;-->
        <a href="index.php?r=CrudApp/Updatebyid&data=<?php echo $data['id']; ?>">Edit</a> ||<a href="index.php?r=CrudApp/delete&data=<?php echo $data['id']; ?>" onclick="return checkDelete()">Delete</a>||
		<?php
			if($data['status'] == 0){
		?>
			<a href="index.php?r=CrudApp/Approvebyid&data=<?php echo $data['id']; ?>&status=<?php echo $data['status']; ?>">Approve</a>
		<?php	
			}
			else
			{
		?>
			<a href="index.php?r=CrudApp/Approvebyid&data=<?php echo $data['id']; ?>&status=<?php echo $data['status']; ?>">UnApprove</a>
		
		<?php
			} 
		?>
    </td>
    </tr>
       <?php
    }
?>
</table>

<script>
   function checkDelete(){ 
       var mess = confirm("Are you sure to delete item");
       if(mess){
           return true;
       }else
           return false;
    }
</script> 

<style>
    tr{border:2px solid #555;}
</style>    