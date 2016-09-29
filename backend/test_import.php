<html>
<head>
	<style type="text/css">
	body
	{
		margin: 0;
		padding: 0;
		background-color:#D6F5F5;
		text-align:center;
	}
	.top-bar
		{
			width: 100%;
			height: auto;
			text-align: center;
			background-color:#FFF;
			border-bottom: 1px solid #000;
			margin-bottom: 20px;
		}
	.inside-top-bar
		{
			margin-top: 5px;
			margin-bottom: 5px;
		}
	.link
		{
			font-size: 18px;
			text-decoration: none;
			background-color: #000;
			color: #FFF;
			padding: 5px;
		}
	.link:hover
		{
			background-color: #9688B2;
		}
	</style>
	

</head>

<body>

<?php
	include ("connection.php");
	

if(isset($_POST['Import']))
{


echo $filename=$_FILES['file']['tmp_name'];
//echo $ext=substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));


 if($_FILES['file']['size'] > 0)
 {

  $file = fopen($filename, 'r');
  $count = 0;   
         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
         {
		    $count++;
            print_r($emapData);
			 if($count>1){  
            $sql = "INSERT into test_import(first_name,last_name) values('$emapData[0]','$emapData[1]')";
            mysql_query($sql);
			}
         }
         fclose($file);
         echo "CSV File has been successfully Imported";
 }
 else
 echo "Invalid File:Please Upload CSV File";

}
?>
    

    <div style="border:1px dashed #333333; width:300px; margin:0 auto; padding:10px;">
    
	<form  method="post" enctype="multipart/form-data">
    	<input type="file" name="file" /><br />
        <input type="submit" name="Import" value="Submit" />
    </form>
      </div>
 
</body>
</html>