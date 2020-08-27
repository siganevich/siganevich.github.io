<?php
    $isfirst =(isset($_POST['isfirst']))?false:true;

    $category =(isset($_POST['category']))?$_POST['category']:"_";
    $theme =(isset($_POST['theme']))?$_POST['theme']:"_";
    $izd =(isset($_POST['izd']))?$_POST['izd']:"_";

    if (!$isfirst)
    {
        require_once("selbooks.php");
        $data_table = new sel_books($category, $theme, $izd);
    }

    require_once("sel_data_combobox.php");
    $data = new sel_data_combobox($category, $theme, $izd);
?>
<!DOCTYPE html>
<html lang="RU">
<head style>
    <meta charset="UTF-8">
    <title>form1</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid" style="width: 50%; margin-top: 20px;">
        <form action="page_choise.php" method="POST">
            <div class="form-group">
                <label for="category">Категория:</label> 
                <select id="category" name='category' class="form-control form-control-sm">
                    <option value="all" selected="<?= $isfirst ?>" >Все категории</option>
                    <?php echo  $data->__getCategory(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="theme">Тема:</label>
                <select id="theme" name="theme" class="form-control form-control-sm">
                    <option value="all" selected="<?= $isfirst ?>">Все темы</option>
                    <?php echo  $data->__getTheme(); ?>
                </select>
            </div>
             <div class="form-group">
                <label for="izd">Издательство:</label> 
                <select id="izd" name="izd" class="form-control form-control-sm">
                    <option value="all" selected="<?= $isfirst ?>">Все издательсва</option>
                    <?php echo $data->__getIzd(); ?>
                </select>
            </div>
            <input type="hidden" name="isfirst" value="0">
            <button type="submit" class="btn btn-primary btn-sm">Показать</button>
        </form>
    </div>
    <div class="container-fluid" style="width: 90%; margin-top: 20px;">
            <?php 
                if (!$isfirst)
                {
                	$table_code = $data_table->sel_choise_books();
                	if ($data_table->__getCount() != 0)
                	{

            ?>
            		<h3> Результаты(<?= $data_table->__getCount() ?>): </h3>
            		<table class="table table-hover table-secondary table-striped" style="font-size: 12px;">
						<thead class="thead-dark" style='font-size: 14px; font-weight: bold;'>
							<tr>
								<td scope='col' style='width: 5%;'>id</td>
								<td scope='col' style='width: 20%;'>name</td>
								<td scope='col' style='width: 10%;'>price</td>
								<td scope='col' style='width: 15%;'>izd</td>
								<td scope='col' style='width: 5%;'>npages</td>
								<td scope='col' style='width: 5%;'>format</td>
								<td scope='col' style='width: 10%;'>dateizd</td>
								<td scope='col' style='width: 5%;'>pressrun</td>
								<td scope='col' style='width: 15%;'>themes</td>
								<td scope='col' style='width: 10%;'>category</td>
							</tr>
						</thead>
						<tbody>
            <?php
                    echo $table_code;
            ?>
            			</tbody>
            		</table>
            <?php
        			}
        			else
        				echo "<h3>Результатов не найдено!</h3>";
                }
            ?>
        
    </div>
</body>
</html>
