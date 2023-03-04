<?php
      $db = mysqli_connect ('localhost','kosw0709','Oppidum12!','kosw0709');

      $idx = $_POST["idx"];
      $input_pw = $_POST["input_pw"];
      $query = "select * from oppidum where idx =".$idx.";";
      $result = mysqli_query($db, $query);
      $row = mysqli_fetch_assoc($result);
      $password = $row["password"];

      if($input_pw == $password){

      echo '<script type="text/javascript">alert("게시글을 삭제했습니다.");</script>';

      $query = "DELETE FROM oppidum WHERE idx='".$idx."';";
      mysqli_query($db, $query);

      mysqli_close($db);
      echo "<script>location.href='./main.php'</script>";
    }

      else{
        echo '<script type="text/javascript">alert("비밀번호가 일치하지 않습니다.");</script>';

        mysqli_close($db);
        echo "<script>location.href='view.php?idx=".$row['idx']."'</script>";
      }


 ?>
