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

                    echo ' <div class="card">' . 
                            '<div class="title">' .
                                '<p>' . $reminderTitle . '</p>' .
                                '</div>' .
                            '<div class="time">' .
                                '<div><p>' . $reminderDate . '</p></div>' .
                                '<div><p>' . $reminderTime . '</p></div>' .
                            '</div>' .
                            '<div style="padding: 1em; padding-left: 0em;">' .
                                '<button onclick="showDetails(\'' . $reminderTitle . '\', \'' . $reminderDescription . '\')" class="details">Show Details</button>' .
                            '</div>' .
                            '<div class="buttons">' .
                                '<form method="post" action="delete-reminder.php"> <input type="hidden" name="id" value="' . $reminderId . '"> <button onclick="deleteCard()" class="button1" type="submit">Delete</button></form>' .
                                '<form method="post" action="done-reminder.php"> <input type="hidden" name="id" value="' . $reminderId . '"> <button onclick="doneCard()" class="button2" type="submit">Done</button></form>' .
                            '</div>' .
                        '</div>';
                }
            ?>