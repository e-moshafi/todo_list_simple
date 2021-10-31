<?php
include "config.php";
if (isset($_POST['data'])) {
    try {
        $stmt = $conn->prepare("INSERT INTO todo_list (title,date) VALUES (?,?)");
        $stmt->execute(array($_POST['data'], date('Y-m-d')));
        echo "successfully";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}elseif(isset($_POST['delete_event'])){
    try {
        $stmt = $conn->prepare("DELETE FROM todo_list where id=?");
        $stmt->execute(array($_POST['delete_event']));
        echo "delete successfully";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}elseif(isset($_POST['checked_event'])){
    try {
        $stmt = $conn->prepare("UPDATE todo_list SET checked=1 where id=?");
        $stmt->execute(array($_POST['checked_event']));
        echo "checked successfully";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    try {
        $stmt = $conn->prepare("SELECT * FROM todo_list");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
?>
            <div class="event shadow-sm">
                <div class="row">
                    <div class="col-sm">
                        <h4 class="float-left"><?php echo $row['title'];?></h4>
                    </div>
                    <div class="col-sm">
                        <span class="float-left"><?php echo $row['date'];?></span>
                    </div>
                    <div class="col-sm">
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" onclick="checked_event('<?php echo $row['id']; ?>', 'ajax.php','.events-border')" <?php if($row['checked']==1){ echo "checked"; } ?> />
                                    <label class="form-check-label">
                                    </label>
                                </div>
                            </div>
                            <div class="col"><i class="fa fa-times times" onclick="delete_event('<?php echo $row['id']; ?>', 'ajax.php','.events-border')"></i></div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
