<?php include("../template/header.php")?>

<?php 
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtService=(isset($_POST['txtService']))?$_POST['txtService']:"";
$txtImage=(isset($_FILES['txtImage']['name']))?$_FILES['txtImage']['name']:"";
$action=(isset($_POST['action']))?$_POST['action']:"";

include("../config/db.php");

switch ($action) {
    case"add":        
        $statementSQL= $conection->prepare("INSERT INTO services (service, image) VALUES (:service, :image);");
        $statementSQL->bindParam(':service',$txtService);

        $date= new DateTime();
        $fileName=($txtImage!="") ? $date->getTimestamp()."_".$_FILES["txtImage"]["name"]:"image.jpg";
        
        $tmpImage=$_FILES["txtImage"]["tmp_name"];

        if($tmpImage!="") {
            move_uploaded_file($tmpImage,"../../img/".$fileName);

        }

        $statementSQL->bindParam(':image',$fileName);
        $statementSQL->execute();

        header("Location:services.php");
        break;

    case"change":
        $statementSQL=$conection->prepare("UPDATE services SET service=:service WHERE id=:id");
        $statementSQL->bindParam(':service',$txtService);
        $statementSQL->bindParam(':id',$txtID);
        $statementSQL->execute();

        if($txtImage!=""){       

            $date= new DateTime();
            $fileName=($txtImage!="") ? $date->getTimestamp()."_".$_FILES["txtImage"]["name"]:"image.jpg";
            $tmpImage=$_FILES["txtImage"]["tmp_name"];

            move_uploaded_file($tmpImage,"../../img/".$fileName);

            $statementSQL=$conection->prepare("SELECT image FROM services WHERE id=:id");
            $statementSQL->bindParam(':id',$txtID);
            $statementSQL->execute();
            $service=$statementSQL->fetch(PDO::FETCH_LAZY);

            if(isset($service['image'])&&($service['image']!="image.jpg")){

                if(file_exists("../../img/".$service["image"])){

                    unlink("../../img/".$service["image"]);
                }
            }

            $statementSQL=$conection->prepare("UPDATE services SET image=:image WHERE id=:id");
            $statementSQL->bindParam(':image',$fileName);
            $statementSQL->bindParam(':id',$txtID);
            $statementSQL->execute();             
        }
        header("Location:services.php");
        break;    
    case"remove":
        header("Location:services.php");
        break;

    case"select":
        $statementSQL=$conection->prepare("SELECT * FROM services WHERE id=:id");
        $statementSQL->bindParam(':id',$txtID);
        $statementSQL->execute();
        $service=$statementSQL->fetch(PDO::FETCH_LAZY);

        $txtService=$service['service'];
        $txtImage=$service['image'];
        break;    

    case"delete":
        $statementSQL=$conection->prepare("SELECT image FROM services WHERE id=:id");
        $statementSQL->bindParam(':id',$txtID);
        $statementSQL->execute();
        $service=$statementSQL->fetch(PDO::FETCH_LAZY);

        if(isset($service['image'])&&($service['image']!="image.jpg")){

            if(file_exists("../../img/".$service["image"])){

                unlink("../../img/".$service["image"]);
            }
        }

        $statementSQL=$conection->prepare("DELETE FROM services WHERE id=:id");
        $statementSQL->bindParam(':id',$txtID);
        $statementSQL->execute();
        
        header("Location:services.php");
        break;          
}

$statementSQL=$conection->prepare("SELECT *FROM services");
$statementSQL->execute();
$serviceList=$statementSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="col-md-5">

    <div class="card">

        <div class="card-header">
            Service information
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class = "form-group">
                    <label for="txtID">ID</label>
                    <input type="text" value="<?php echo $txtID; ?>" required readonly class="form-control" name="txtID" id="txtID" placeholder="ID">
                </div>

                <div class = "form-group">
                    <label for="txtService">Service:</label>
                    <input type="text" required value="<?php echo $txtService; ?>" class="form-control" name="txtService" id="txtService" placeholder="Service">
                </div>

                
                <div class = "form-group">
                    <label for="txtImage">Image:</label>

                    <br/>

                    <?php if($txtImage!=""){ ?>

                        <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImage;?>" width="50" alt="">

                    <?php }?>

        


                    <input type="file" value="<?php echo $txtImage; ?>" class="form-control" name="txtImage" id="txtImage" placeholder="Image">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="action" <?php echo ($action=="select") ? "disabled" :""; ?> value="add" class="btn btn-success">Add</button>
                    <button type="submit" name="action" <?php echo ($action!="select") ? "disabled" :""; ?> value="change" class="btn btn-warning">Change</button>
                    <button type="submit" name="action" <?php echo ($action!="select") ? "disabled" :""; ?> value="remove" class="btn btn-primary">Remove</button>
                </div>
            </form>
        </div>        
    </div>   
</div>

<div class="col-md-7">
    <table class="table table-info">
        <thead>
            <tr>
                <th>ID</th>
                <th>Service</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach ($serviceList as $service) { ?>
            <tr>
                <td><?php echo $service['id']?></td>
                <td><?php echo $service['service']?></td>
                <td>
                    <img class="img-thumbnail rounded" src="../../img/<?php echo $service['image'];?>" width="50" alt="">
                
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $service['id']?>">

                        <input type="submit" name="action" value="select" class="btn btn-primary" />

                        <input type="submit" name="action" value="delete" class="btn btn-danger" />
                    </form>

                
                </td> 
            </tr>
           <?php } ?>
        </tbody>
    </table>
</div>

<?php include("../template/footer.php")?>