<div class="container">
   <div class="row">
      <div class="col-md-4 col-md-offset-4">
         <form id="av" role="form"  method="post" action="<?=$_SERVER['REQUEST_URI']?>">
            <div class="form-group">
               <label for="exampleInputEmail1">Логин</label>
               <input name="login" type="text" class="form-control" id="exampleInputEmail1" placeholder="Логин" required>
            </div>
            <div class="form-group">
               <label for="exampleInputPassword1">Пароль</label>
               <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль" required>
            </div>
            <button for="av" name="autorization" type="submit" class="btn btn-default">Войти</button>
         </form>
      </div>
   </div>
</div>