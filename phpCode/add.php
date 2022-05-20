<?
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$connect = mysqli_connect('localhost','root','','library');
$title = $_POST['title'];
$auther = $_POST['auther'];
$content = $_POST['content'];
$sql = "INSERT INTO `books1` (`title`, `auther`,`content`) VALUES ('$title', '$auther','$content ');";
if ($title && $content && $auther) {
  $run_sql = mysqli_query($connect,$sql);
  if ($run_sql) {
    echo '<p style="color:#008000;">Вы успешно добавили книгу!</p>';
  }
}
else
{
  echo '<p style="color:red;">Заполните поля!</p>';
}
}
