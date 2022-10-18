<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
  {
$title=$_POST['title'];
$brand=$_POST['brandname'];
$overview=$_POST['overview'];
$price=$_POST['price'];
$type=$_POST['type'];
$color=$_POST['color'];
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
$id=$_GET['id'];
$query = mysqli_query($dbh, "UPDATE tblproducts SET Title = '$title', Brand='$brand', Overview='$overview', Price='$price', Type='$type', color='$color',garantia='$garantia',skidka='$skidka',dostavka='$dostavka',othercolors='$othercolors',ustanovka='$ustanovka',dopolnenie='$dopolnenie',izseri='$izseri',podarok='$podarok',bonus='$bonus',odin='$odin',production='$production' WHERE id='$id' ");
if($query)
{
$msg="Товар успешно изменен";
}
else 
{
$error="Something went wrong. Please try again";
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
	
	<title>Портал | Админ Настройка Информации О Продукте</title>

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
					
						<h2 class="page-title">Изменить Товар</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Основная Информация</div>
									<div class="panel-body">
										 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>


<?php 
$id=$_GET['id'];
$sql ="SELECT tblproducts.*,tblbrands.BrandName,tblbrands.id as bid from tblproducts join tblbrands on tblbrands.id=tblproducts.Brand where tblproducts.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label"> Название <span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="title" class="form-control" value="<?php echo htmlentities($result->Title)?>" required>
</div>
<label class="col-sm-2 control-label">Выберите Группу <span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="brandname" required>
<option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->BrandName); ?> </option>
<?php $ret="select id,BrandName from tblbrands";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
if($results->BrandName==$bdname)
{
continue;
} else{
?>
<option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->BrandName);?></option>
<?php }}} ?>

</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Описание товара <span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="overview" rows="3" required><?php echo htmlentities($result->Overview);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Цена<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="price" class="form-control" value="<?php echo htmlentities($result->Price);?>" required>
</div>
<label class="col-sm-2 control-label">Выбрать Тип<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="type" required>
<option value="<?php echo htmlentities($results->Type);?>"> <?php echo htmlentities($result->Type);?> </option>

<option value="Основной">Основной</option>
<option value="Второстепенный">Второстепенный</option>
<option value="Декоративный">Декоративный</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Цвет<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="color" class="form-control" value="<?php echo htmlentities($result->color);?>" required>
</div>

</div>
<div class="hr-dashed"></div>								
<div class="form-group">
<div class="col-sm-12">
<h4><b> Фотографии</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1 <img src="img/productsimages/<?php echo htmlentities($result->Vimage1);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id)?>">Изменить Фото 1</a>
</div>
<div class="col-sm-4">
Image 2<img src="img/productsimages/<?php echo htmlentities($result->Vimage2);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id)?>">Изменить Фото 2</a>
</div>
<div class="col-sm-4">
Image 3<img src="img/productsimages/<?php echo htmlentities($result->Vimage3);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage3.php?imgid=<?php echo htmlentities($result->id)?>">Изменить Фото 3</a>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 4<img src="img/productsimages/<?php echo htmlentities($result->Vimage4);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage4.php?imgid=<?php echo htmlentities($result->id)?>">Изменить Фото 4</a>
</div>
<div class="col-sm-4">
Image 5
<?php if($result->Vimage5=="")
{
echo htmlentities("File not available");
} else {?>
<img src="img/productsimages/<?php echo htmlentities($result->Vimage5);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage5.php?imgid=<?php echo htmlentities($result->id)?>">Изменить Фото 5</a>
<?php } ?>
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
<div class="panel-heading">Действуют</div>
<div class="panel-body">


<div class="form-group">
<div class="col-sm-3">
<?php if($result->garantia==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="garantia" name="garantia" checked value="1">
<label for="garantia"> Гарантия </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="garantia" name="garantia" value="1">
<label for="garantia"> Гарантия </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->skidka==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox2" name="skidka" checked value="1">
<label for="inlineCheckbox2"> Скидка </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-success checkbox-inline">
<input type="checkbox" id="inlineCheckbox2" name="skidka" value="1">
<label for="inlineCheckbox2">Скидка </label>
</div>
<?php }?>
</div>
<div class="col-sm-3">
<?php if($result->dostavka==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox3" name="dostavka" checked value="1">
<label for="inlineCheckbox3"> Доставка</label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox3" name="dostavka" value="1">
<label for="inlineCheckbox3"> Доставка </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->othercolors==1)
{
	?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox3" name="othercolors" checked value="1">
<label for="inlineCheckbox3"> Другие цвета </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox3" name="othercolors" value="1">
<label  for="inlineCheckbox3"> Другие цвета </label>
</div>
<?php } ?>
</div>

<div class="form-group">
<?php if($result->ustanovka==1)
{
	?>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="ustanovka" checked value="1">
<label for="inlineCheckbox1">Установка </label>
</div>
<?php } else {?>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="ustanovka" value="1">
<label for="inlineCheckbox1"> Установка </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->dopolnenie==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox2" name="dopolnenie" checked value="1">
<label for="inlineCheckbox2">Дополнение</label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox2" name="dopolnenie" value="1">
<label for="inlineCheckbox2">Дополнение</label>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->dopolnenie==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="izseri" name="izseri" checked value="1">
<label for="izseri">Из серии </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="izseri" name="izseri" value="1">
<label for="izseri">Из серии </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->podarok==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="podarok" name="podarok" checked value="1">
<label for="podarok">Подарок </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="podarok" name="podarok" value="1">
<label for="podarok">Подарок </label>
</div>
<?php } ?>
</div>


<div class="form-group">
<div class="col-sm-3">
<?php if($result->bonus==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="bonus" checked value="1">
<label for="inlineCheckbox1">Бонусы </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="bonus" value="1">
<label for="inlineCheckbox1">Бонусы </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->odin==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox3" name="odin" checked value="1">
<label for="inlineCheckbox3">Один экземпляр </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox3" name="odin" value="1">
<label for="inlineCheckbox3">Один экземпляр </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->odin==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="production" checked value="1">
<label for="inlineCheckbox1">Другое производство </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="production" value="1">
<label for="inlineCheckbox1">Другое производство </label>
</div>
<?php } ?>
</div>
</div>

<?php }} ?>


											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2" >
													
													<button class="btn btn-primary" name="update" type="submit" style="margin-top:4%">Сохранить Изменения</button>
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