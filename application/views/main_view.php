<a href="/AddTask"><button type="button" class="btn btn-warning">Добавить задачу</button></a>
</br>
<div class="row">
   <div class="col-lg-12">
      <table class="table">
         <thead>
            <tr>
               <th>Имя пользователя
                  <a href="/main/index/sort_name=up"> <button style="color:green;" type="button" class="btn btn-default btn"><span class=" glyphicon glyphicon-circle-arrow-up"></span> </button> </a>
                  <a href="/main/index/sort_name=down"> <button style="color:red;" type="button" class="btn btn-default btn"><span class=" glyphicon glyphicon-circle-arrow-down"></span> </button> </a>
               </th>
               <th>Email
                  <a href="/main/index/sort_email=up"> <button style="color:green;" type="button" class="btn btn-default btn"><span class=" glyphicon glyphicon-circle-arrow-up"></span> </button> </a>
                  <a href="/main/index/sort_email=down"> <button style="color:red;" type="button" class="btn btn-default btn"><span class=" glyphicon glyphicon-circle-arrow-down"></span> </button> </a>
               </th>
               <th style="min-width:150px;">Текст задачи</th>
               <th>Картинка</th>
               <th style="min-width:100px;">Статус
                  <a href="/main/index/sort_status=yes"> <button style="color:green;" type="button" class="btn btn-default btn"><span class="glyphicon glyphicon-ok-circle"></span> </button> </a>
                  <a href="/main/index/sort_status=no"> <button style="color:red;" type="button" class="btn btn-default btn"><span class="glyphicon glyphicon-ban-circle"></span> </button> </a>
               </th>
               <?php
                  if(isset($_COOKIE['user'])) print "
                            <th>Отметить</th>
                              <th>Действие</th>";
                  
                  ?>
            </tr>
         </thead>
         <tbody>
            	

<?php

foreach($model as $item)
	{
	$checked = ($item['status'] != 0) ? "checked " : "";
	$status = ($item['status'] != 0) ? "выполнено " : "в работе";
	$img = ($item['image'] != '') ? $img = "<img style='width:320px;' src='/application/images/{$item['image']}'>" : " не загружено";
	print "
                        <tr>
                          
                         <td>{$item['user']}</td>
                         <td>{$item['email']}</td>
                         <td>{$item['text']}</td>
                         <td>{$img}</td>
                         <td id='s_{$item['id']}'>{$status}</td>
                       ";
	if (isset($_COOKIE['user'])) print "
                         <td><input type='checkbox' {$checked}   id='checkbox' value='{$item['id']}'> </td>
                         <td><a href='/main/update/id={$item['id']}'><button type='button' class='btn btn-success'>Редактировать</button></a></td>
                         
                       </tr>
                        
                        ";
	}

?>

         </tbody>
      </table>
      </br>
      <ul class="pagination">
        	

 <?php
$count = round(Model_Tasks::count() / 3);

for ($i = 1; $i <= $count; $i++)
	{
	print '<li><a href="/main/index/pag=' . $i . '">' . $i . '</a></li>';
	}

?>
      </ul>
   </div>
</div>
<script>
    $(document).ready(function() {
        $("input:checkbox").change(function() {
            var result;
            var status;
            var checked = this.checked;
            result = this.checked + "_" + $(this).val();
            status = "s_" + $(this).val();
            $.ajax({
                type: "POST",
                url: "/main/updateStatus",
                data: "checkbox=" + result,
                success: function() {
                    if (checked) {
                        $('#' + status).text("выполнено");
                    } else {
                        $('#' + status).text("в работе");
                    }
                }
            });
        })
    });
</script>