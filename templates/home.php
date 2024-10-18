<?php
    require_once '../db/dbConnect.php'; 

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>To-Do List</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <div class="main-section">
       <div class="add-section">
       <form action="/auth_module/assets/add.php" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" name="title" style="border-color: #ff6666" placeholder="This field is required" />
                <button type="submit">Add &nbsp; <span>&#43;</span></button>
             <?php }else{ ?>
              <input type="text" name="title" placeholder="What do you need to do?" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>
             <?php } ?>
          </form>
       </div>
       <?php 
          $todos = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
       ?>
           <div class="show-todo-section">
                <?php if($todos->rowCount() <= 0){ ?>
                    <div class="todo-item">
                        <div class="empty"><p>Add Tasks</p></div>
                    </div>
                <?php } ?>
    
                <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="todo-item">
                        <span id="<?php echo $todo['id']; ?>"class="remove-to-do">x</span>
                        <?php if($todo['checked']){ ?> 
                            <input type="checkbox"
                                   class="check-box"
                                   data-todo-id ="<?php echo $todo['id']; ?>"
                                   checked />
                            <h2 class="checked"><?php echo $todo['title'] ?></h2>
                        <?php }else { ?>
                            <input type="checkbox"data-todo-id ="<?php echo $todo['id']; ?>"
                                   class="check-box" />
                            <h2><?php echo $todo['title'] ?></h2>
                        <?php } ?>
                        <br>
                        <small>created: <?php echo $todo['date'] ?></small> 
                    </div>
                <?php } ?>
           </div>
        </div>
        <script src="../js/script.js"></script>
    </body>
    </html>