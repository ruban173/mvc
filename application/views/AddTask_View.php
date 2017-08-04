<div class="container">
   <div class="row">
      <div class="col-md-6 col-md-offset-2">
         <form id="addtask" enctype="multipart/form-data" role="form"  method="post" action="<?=$_SERVER['REQUEST_URI']?>" >
            <div class="form-group">
               <label for="name">Имя</label>
               <input name="user" type="text" class="form-control" id="name" placeholder="имя" required>
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input name="email"  class="form-control" id="email" placeholder="email"  type="email" required>
            </div>
            <div class="form-group">
               <label for="text">Текст</label>
               <textarea id="text" name="text" class="form-control" rows="5"  required></textarea>
            </div>
            <div class="form-group">
               <label for="image">Картинка</label>
               <input name="image" type="file" id="image">
            </div>
            <button for="addtask" name="add" type="submit" class="btn btn-default">Отправить</button>
            <button type="button" class="btn btn-primary open-modal">Просмотреть</button>
         </form>
      </div>
   </div>
</div>
<div id="myModal" class="modal fade" >
   <div class="modal-dialog modal-lg" >
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Предварительный просмотр</h4>
         </div>
         <div class="modal-body">
            <table class="table">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Имя пользователя</th>
                     <th>Email</th>
                     <th>Текст задачи</th>
                     <th>Картинка</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>1</td>
                     <td id="name"></td>
                     <td id="email"></td>
                     <td id="text"></td>
                     <td id="image">
                        <div id="preview"></div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
         </div>
      </div>
   </div>
</div>
<script>
    $(document).ready(function() {
        $('.open-modal').click(function() {
            $('table tr #name').text($('#name').val());
            $('table tr #email').text($('#email').val());
            $('table tr #text').text($('#text').val());
            $('#myModal').modal('show');
        });

        function renderImage(file) {
            var reader = new FileReader();
            reader.onload = function(event) {
                the_url = event.target.result$('table tr #image #preview').html("<img style='max-width:320px; max-height:240px;' class='img-responsive' src='" + the_url + "' />")
            }
            reader.readAsDataURL(file);
        }
        $("#image").change(function() {
            renderImage(this.files[0])
        });
    });
</script>