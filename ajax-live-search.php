<?php
  require_once "db.php";
 //$_POST['query']="";
  if (isset($_POST['query'])) {
      $query = "SELECT * FROM verbs WHERE name LIKE '{$_POST['query']}%' OR whitney LIKE '{$_POST['query']}%' OR translate LIKE '{$_POST['query']}%'";
  }
  else
  {
	       $query = "SELECT * FROM verbs";
  }	  
	  
  if($_POST['query']==""||!$_POST['query'])
	{
		      $query = "SELECT * FROM verbs";
	}
	  

	  $_POST['query']="";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
    while ($res = mysqli_fetch_array($result)) {
    
    $omonim=$res['omonim'];
		
		$omonim_text="";
		if($omonim)
		{
			$omonim_text=" $omonim ";
		}
			
		$answer.="<tr><td><a href='generator.php?verbs=".$res['id']."'>".$res['name']. "$omonim_text</a></td><td>".$res['ryad']. "</td><td>".$res['whitney']. "</td><td>".$res['setnost']. "</td><td>".$res['type']. "</td><td>".$res['pada']. "</td><td>".$res['prs']. "</td><td>".$res['aos']. "</td><td>".$res['translate']. " ".$res['comments']. "</td></tr>";
      }
	  
	  $itog='<table class="table table-bordered"><thead><tr><th scope="col">Корень</th><th scope="col">Ряд</th><th scope="col">Корень по Whitney</th><th scope="col">seṭ-aniṭ</th><th scope="col">Тип</th>
	  <th scope="col">P/Ā</th><th scope="col">PrS</th><th scope="col">AoS</th><th scope="col">Перевод / Комментарии</th></tr></thead><tbody>'.$answer.'</tbody></table>';
	  echo $itog;
	  
    } else {
      echo "
      <div class='alert alert-danger mt-3 text-center' role='alert'>
          Не найдено
      </div>
      ";
    }
  
  
  
?>