<link rel="stylesheet" href="./style/main.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding&display=swap" rel="stylesheet">
<div class="header-par">
  <div class="header">
    <a href="./main.php"><img src="./img/logo.png" width="256px"></a>
    <h3> <a href="./write.html">글 쓰기<img src="./img/pencil.png" height='15px'> </a></h3>
  </div>
</div>
<?php
$db = mysqli_connect ('localhost','kosw0709','Oppidum12!','kosw0709');
$query = "select * from oppidum order by idx desc;";
$result = mysqli_query($db, $query);
?>
<div class="content-par">
  <div class="content">
      <table border = 0>
        <tr class='list_top'><th>제목</th> <th>작성자</th> <th>작성일</th> <th> 조회수</th></tr>
  <?php
    while($row = mysqli_fetch_assoc($result)){
      echo "<tr><td class='title'>
            <a href ='./view.php?idx=".$row['idx']."'>{$row['title']} </a></td>
            <td> {$row['writer']} </td>
            <td> {$row['write_date']} </td> <td>{$row['view_count']}</td> </tr>";
    }

  mysqli_close($db);
  ?>
  </table>
  </div>
</div>
