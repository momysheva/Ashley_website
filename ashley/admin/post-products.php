<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$title=$_POST['title'];
$brand=$_POST['brandname'];
$overview=$_POST['overview'];
$price=$_POST['price'];
$type=$_POST['type'];
$color=$_POST['color'];
$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];
$vimage4=$_FILES["img4"]["name"];
$vimage5=$_FILES["img5"]["name"];
$garantia=$_POST['garantia'];
$skidka=$_POST['skidka'];
$dostavka=$_POST['dostavka'];
$othercolors=$_POST['othercolors'];
$ustanovka=$_POST['ustanovka'];
$dopolnenie=$_POST['dopolnenie'];
$izseri=$_POST['izseri'];
$podarok=$_POST['podarok'];
$bonus=$_POST['bonus'];
$odin=$_POST['odin'];
$production=$_POST['production'];
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/productsimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/productsimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"img/productsimages/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"img/productsimages/".$_FILES["img4"]["name"]);
move_uploaded_file($_FILES["img5"]["tmp_name"],"img/productsimages/".$_FILES["img5"]["name"]);

$sql="INSERT INTO tblproducts(Title,Brand,Overview,Price,Type,color,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,garantia,skidka,dostavka,othercolors,ustanovka,dopolnenie,izseri,podarok,bonus,odin,production) VALUES(:title,:brand,:overview,:price,:type,:color,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:garantia,:skidka,:dostavka,:othercolors,:ustanovka,:dopolnenie,:izseri,:podarok,:bonus,:odin,:production)";
$query = $dbh->prepare($sql);
$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':overview',$overview,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':color',$color,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
$query->bindParam(':vimage4',$vimage4,PDO::PARAM_STR);
$query->bindParam(':vimage5',$vimage5,PDO::PARAM_STR);
$query->bindParam(':garantia',$garantia,PDO::PARAM_STR);
$query->bindParam(':skidka',$skidka,PDO::PARAM_STR);
$query->bindParam(':dostavka',$dostavka,PDO::PARAM_STR);
$query->bindParam(':othercolors',$othercolors,PDO::PARAM_STR);
$query->bindParam(':ustanovka',$ustanovka,PDO::PARAM_STR);
$query->bindParam(':dopolnenie',$dopolnenie,PDO::PARAM_STR);
$query->bindParam(':izseri',$izseri,PDO::PARAM_STR);
$query->bindParam(':podarok',$podarok,PDO::PARAM_STR);
$query->bindParam(':bonus',$bonus,PDO::PARAM_STR);
$query->bindParam(':odin',$odin,PDO::PARAM_STR);
$query->bindParam(':production',$production,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="?????????? ?????????????? ????????????????";
}
else 
{
$error="??????-???? ?????????? ???? ??????. ???????????????????? ???????????????????? ??????????";
}

}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>???????????? | ?????????? ???????????????? ??????????</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">???????????????? ??????????</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">???????????????? ????????????????????</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label"> ????????????????<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="title" class="form-control" required>
</div>
<label class="col-sm-2 control-label">?????????????? ????????????<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="brandname" required>
<option value=""> ?????????????? </option>
<?php $ret="select id,BrandName from tblbrands";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
<?php }} ?>

</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label"> ????????????????<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="overview" rows="3" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">????????<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="price" class="form-control" required>
</div>
<label class="col-sm-2 control-label">?????????????? ??????<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="type" required>
<option value=""> ?????????????? </option>

<option value="????????????????">????????????????</option>
<option value="??????????????????????????">????????????????????????????</option>
<option value="????????????????????????">????????????????????????</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">????????<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="color" class="form-control" required>
</div>
</div>
<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>???????????????? ????????????????????</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
</div>
<div class="col-sm-4">
Image 2<span style="color:red">*</span><input type="file" name="img2" required>
</div>
<div class="col-sm-4">
Image 3<span style="color:red">*</span><input type="file" name="img3" required>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 4<span style="color:red">*</span><input type="file" name="img4" required>
</div>
<div class="col-sm-4">
Image 5<input type="file" name="img5">
</div>

</div>
<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
							

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">??????????????????</div>
<div class="panel-body">


<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="garantia" name="garantia" value="1">
<label for="garantia"> ???????????????? </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="skidka" name="skidka" value="1">
<label for="skidka"> ???????????? </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="dostavka" name="dostavka" value="1">
<label for="dostavka"> ???????????????? </label>
</div></div>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="othercolors" name="othercolors" value="1">
<label for="othercolors">???????????? ?????????? </label>
</div>
</div>



<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="ustanovka" name="ustanovka" value="1">
<input type="checkbox" id="ustanovka" name="ustanovka" value="1">
<label for="inlineCheckbox5">?????????????????? </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="dopolnenie" name="dopolnenie" value="1">
<label for="dopolnenie">????????????????????</label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="izseri" name="izseri" value="1">
<label for="izseri"> ???? ?????????? </label>
</div></div>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="podarok" name="podarok" value="1">
<label for="podarok">?????????????? </label>
</div>
</div>


<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="bonus" name="bonus" value="1">
<label for="bonus">???????????? </label>
</div>
</div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="odin" name="odin" value="1">
<label for="odin">???????? ?????????????????? </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="production" name="production" value="1">
<label for="production">???????????? ???????????????????????? </label>
</div>
</div>
</div>




											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">????????????????</button>
													<button class="btn btn-primary" name="submit" type="submit">??????????????????</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>