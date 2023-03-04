<link rel="stylesheet" href="./style/view.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding&display=swap" rel="stylesheet">

<div class="header-par">
  <div class="header">
    <a href="./main.php"><img src="./img/logo.png" width="256px"></a>
    <h3> <a href="./write.html">글 쓰기<img src="./img/pencil.png" height='15px'> </a></h3>
  </div>
</div>
<div class="content-par">
  <div class="content">
<?php
$idx = $_GET["idx"];

$db = mysqli_connect ('localhost','kosw0709','Oppidum12!','kosw0709');

$query = "select * from oppidum where idx =".$idx.";";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

if (empty($_COOKIE[$idx])){
  setcookie($idx,"YES", time()+60*60*24);

  $query="update oppidum set view_count=view_count+1 where idx=".$idx;
  mysqli_query($db, $query);

  echo "<script>location.reload();</script>";
}
echo "<h4>{$row["title"]} </h4>";
echo "작성자:{$row["writer"]}&nbsp;&nbsp;&nbsp;&nbsp;";
echo "작성일:{$row["write_date"]}&nbsp;&nbsp;&nbsp;&nbsp;";
echo "조회수:{$row["view_count"]}<br><br>";

echo "<hr>";
echo "<div class='inner-text'>";
echo "{$row["contents"]}";
echo "</div>";
?>
  </div>
</div>
<script>
    var idx = '<?= $idx ?>';

    function send(){
    document.getElementById('idx').value = idx;
}
  function checkNumber(event) {
    if(event.key === '.'
      || event.key === '-'
      || event.key >= 0 && event.key <= 9) {
        return true;
      }

    else{
      alert('숫자만 입력 가능합니다.')
    }

    return false;
}
</script>

<hr>
<div class="nav-par">
  <div class="nav">
    <form action="./delete.php" method="POST" name="delete">
      <input type="hidden" name="idx" id="idx" value="">
      <input type="password" name="input_pw" id="input_pw" size="10" maxlength="4" onkeypress='return checkNumber(event)' placeholder="비밀번호">
      <input type="submit" value="삭제" onclick="send()" id="submit">
    </form>
    <a href="./main.php">메인화면으로 가기</a>
  </div>
</div>
