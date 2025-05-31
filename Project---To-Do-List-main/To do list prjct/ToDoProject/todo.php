<?php
session_start();
if(!isset($_SESSION["userId"])){
  header("Location:auth.php");
  die();
}
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "finalproject";

    $conn = new mysqli($servername, $username, $password, $dbName);
    if($conn->connect_error){
        //ka ndodhur nje error gjate lidhjes me databaze
        echo "Could not connect ot the database!";
        header("Location:auth.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>To Do List</title>
  </head>
  <body>
    <div class="nav">
      <div class="tbl-btn">
        <form class="btn" action="logout.php">
          <input type="submit" class="logout" value="Log Out">
        </form>
      </div>
    </div>

    <div class="container">
      <div class="todoList">
        <div class="wrapper">
          <div class="header">
            <h1 class="toDoHeading">To Do</h1>
            <button onclick="AddTask()" class="addBtn">
              <img class="plus" src="img/plus-solid.svg" alt="" />
            </button>
          </div>

          <?php

$userId = $_SESSION["userId"];
$getAllToDo = $conn->prepare("SELECT * FROM `reminders` WHERE `done` = 0 AND `user_id` = ? ORDER BY `deadline` ASC");
$getAllToDo->bind_param("i", $userId);
$getAllToDo->execute();
$allToDo = $getAllToDo->get_result();                     

while($row = $allToDo->fetch_assoc()) {
    $reminderTitle = $row["title"];
    $time = new DateTime($row["deadline"]);
    $reminderDate = $time->format('j.n.Y');
    $reminderTime = $time->format('H:i');
    $reminderDescription = $row["description"];
    $reminderId = $row["id"];

    echo 


'<div class="tasks">'.
'<h1>'.$reminderTitle.'</h1>'.
'<div class="timeAndSeeMore">'.
'<div class="time">'.
'<div class="day">'.$reminderDate.'</div>'.
'<div class="timestamp">'.$reminderTime.'</div>'.
'</div>'.
'<div class="seeMore">'.
'<button
  onclick="seeMoreDetails(\'seeMoreBtn_' . $reminderId . '\', \'detailsTxt_' . $reminderId. '\')"
  class="seeMoreBtn"
  id="seeMoreBtn_' . $reminderId . '"
>'.
 'See more details'.
'</button>'.
'</div>'.
'</div>'.
'<p class="detailsTxt" id="detailsTxt_' . $reminderId . '">'. $reminderDescription .
'</p>'.


'<div class="buttons">'.
'<form method="POST" action="delete-reminder.php"><input type="hidden" name="id" value="' . $reminderId . '"><button  class="deleteBtn">Delete</button></form>'.
'<form method="POST" action="done-reminder.php"><input type="hidden" name="id" value="' . $reminderId . '"><button class="doneBtn">Done</button></form>'.
'</div>'.
'</div>';
}
?>
        </div>
      </div>
      <div class="doneList">
        <div class="wrapper">
          <div class="header">
            <h1 class="toDoHeading">Done</h1>
            <!-- <button onclick="AddTask()" class="addBtn">
              <img class="plus" src="/img/plus-solid.svg" alt="" />
            </button> -->
          </div>

          <?php

$userId = $_SESSION["userId"];
$getAllToDo = $conn->prepare("SELECT * FROM `reminders` WHERE `done` = 1 AND `user_id` = ? ORDER BY `deadline` ASC");
$getAllToDo->bind_param("i", $userId);
$getAllToDo->execute();
$allToDo = $getAllToDo->get_result();                     

while($row = $allToDo->fetch_assoc()) {
    $reminderTitle = $row["title"];
    $time = new DateTime($row["deadline"]);
    $reminderDate = $time->format('j.n.Y');
    $reminderTime = $time->format('H:i');
    $reminderDescription = $row["description"];
    $reminderId = $row["id"];

    echo 


'<div class="tasks">'.
'<h1>'.$reminderTitle.'</h1>'.
'<div class="timeAndSeeMore">'.
'<div class="time">'.
'<div class="day">'.$reminderDate.'</div>'.
'<div class="timestamp">'.$reminderTime.'</div>'.
'</div>'.
'<div class="seeMore">'.
'<button
  onclick="seeMoreDetails(\'seeMoreBtn_' . $reminderId . '\', \'detailsTxt_' . $reminderId. '\')"
  class="seeMoreBtn"
  id="seeMoreBtn_' . $reminderId . '"
>'.
 'See more details'.
'</button>'.
'</div>'.
'</div>'.
'<p class="detailsTxt" id="detailsTxt_' . $reminderId . '">'. $reminderDescription .
'</p>'.


'<div class="buttons">'.
'<form method="POST" action="delete-reminder.php"><input type="hidden" name="id" value="' . $reminderId . '"><button  class="deleteBtn">Delete</button></form>'.
'</div>'.
'</div>';
}
?>
        </div>
      </div>

      <div class="form-Add">
        <form class="form" method="POST" action="create-reminder.php">
          <button onclick="exitTask()" class="exitBtn">
            <img class="exitForm" src="/img/xmark-solid.svg" alt="" />
          </button>

          <label class="createText">Create New ToDo</label>
          <input class="create title" type="text" placeholder="Title" name="title" />
          <input class="create date" type="datetime-local" name="date" />
          <textarea
          name="details"
            class="create details"
            cols="30"
            rows="10"
            style="resize: none"
          ></textarea>
          <input type="submit" class="submitBtn" value="Submit">
</form>
      </div>
    </div>

    <script>
      function AddTask() {
        document.querySelector(".form-Add").style.display = "flex";
      }

      function exitTask() {
        document.querySelector(".form-Add").style.display = "none";
      }

      function seeMoreDetails(btnId, descId) {
        if (document.getElementById(descId).style.height != "auto") {
          document.getElementById(descId).style.height = "auto";
          document.getElementById(btnId).innerHTML = "Hide Details";
        } else {
          document.getElementById(descId).style.height = "0";
          document.getElementById(btnId).innerHTML = "See More Details";
        }
      }

      function deleteTask(id) {}
      function doneTask(id) {}

    </script>
  </body>
</html>
