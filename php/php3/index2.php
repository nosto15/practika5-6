<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>php3</title>
    	<link rel="stylesheet" href="style.css">
    </head>
      <body style="background-image: url(http://www.fonstola.ru/pic/201111/1600x900/fonstola.ru-55699.jpg)">
      <form method="post" align="center" class="regform">
        <label style="font-size: 35px;">Регистрация нового пользователя <br></label>
          <label>  ♥- обязательно для заполнения<br></label>
        <label>Логин ♥</label><br>
        <input type="text" name="log" required value="<? if(isset($_POST['log'])) echo $_POST['log']; ?>"><br><?php if(isset($login)) echo $login;?><br>
        <label>Пароль ♥</label><br>
        <input type="password" name="pwd" required value="<? if(isset($_POST['pwd'])) echo $_POST['pwd']; ?>"><br><?php if(isset($password)) echo $password;?><br>
        <label>Повторите пароль ♥</label><br>
        <input type="password" name="pwd1" required value="<? if(isset($_POST['pwd1'])) echo $_POST['pwd1']; ?>"><br><?php if(isset($password)) echo $password;?><br>
        <label>Фамилия ♥</label><br>
        <input type="text" name="surname" required value="<? if(isset($_POST['surname'])) echo $_POST['surname']; ?>"><br><?php if(isset($surnname)) echo $surnname;?><br>
        <label>Имя ♥</label><br>
        <input type="text" name="name" required value="<? if(isset($_POST['name'])) echo $_POST['name']; ?>"><br><?php if(isset($nam)) echo $nam;?><br>
        <label>Отчество</label><br>
        <input type="text" name="midname" value="<? if(isset($_POST['midname'])) echo $_POST['midname']; ?>"><br><?php if(isset($mid)) echo $mid;?><br>
        <label>Пол ♥</label><br>
        <select name="sex" required>
          <option value="Мужской">
          Мужской
          </option>
          <option value="Женский">
          Женский
          </option>
        </select><br>
        <label>E-Mail ♥</label><br>
        <input type="email" name="email" required value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"><?php if(isset($poshta)) echo $poshta;?><br>
        <label>Возраст ♥</label><br>
        <input type="text" name="age" required value="<? if(isset($_POST['age'])) echo $_POST['age']; ?>"><?php if(isset($ag)) echo $ag;?><br>
        <label>Страна ♥</label><br>
        <select name="country" required>
          <option>
          Rus77
          </option>
          <option>
          Niderland
          </option>
          <option>
          Dubai
          </option>
          <option>
          Usa
          </option>
        </select><br>

        <label>О себе</label><br>
        <textarea style="resize: none;" rows="8" cols="35" name="about"><? if(isset($_POST['about'])) echo $_POST['about']; ?></textarea><br>
        <input type="submit" value="Регистрация"/>
        <input type="reset" value="Сброс"/>
        </form><br>
  <?
        if(isset($_POST['log']) && isset($_POST['pwd']) && isset($_POST['pwd1']) && isset($_POST['surname']) && isset($_POST['name'])
         && isset($_POST['sex']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['country'])
        && !empty($_POST['log']) && !empty($_POST['pwd']) && !empty($_POST['pwd1']) && !empty($_POST['surname']) && !empty($_POST['name'])
         && !empty($_POST['sex']) && !empty($_POST['email']) && !empty($_POST['age']) && !empty($_POST['country']))
        {
            if(!preg_match('/^[a-z0-9]{3,}+$/i',$_POST['log']))
            {
              echo '<span>Логин не соответсвует формату.<br>
                          Только английские буквы и цифры<br>
                          От 3 и более символов<br></span>';
            }
            else
                if(!preg_match('/^[A-Za-z0-9@!.#]{5,}+$/i',$_POST['pwd']))
            {
               echo '<span>Неправильно задан пароль.<br>
                          Используйте только английские буквы и эти симвалы @!.#.<br>
                        Длина пароль минимум 5 символов.<br></span>';
            }
            else
                	if($_POST['pwd'] != $_POST['pwd1'])
            {
               echo '<span>Пароли не совпадают.<br></span>';
            }
            else
                if(!preg_match('/^[А-ЯЁа-яё]{2,}+$/iu',$_POST['surname']))
            {
               echo '<span>Только русские символы.<br>
                          Длинна фамилии минимум 2 символа.<br></span>';
            }
            else
                if(!preg_match('/^[А-ЯЁа-яё]{3,}+$/iu',$_POST['name']))
            {
              echo '<span>Только русские символы.<br>
                         Длинна фамилии минимум 3 символа.<br></span>';
            }
            else
                if(!preg_match('/^[А-ЯЁа-яё]{5,}+$/iu',$_POST['midname']))
            {
              echo '<span>Только русские символы.<br>
                         Длинна фамилии минимум 3 символа.<br></span>';
            }
            else
                if(!preg_match('/^[A-Za-z0-9]+@[a-z0-9]+\.[a-z]/i',$_POST['email']))
            {
               echo '<span>Неправильно задана почта.<br>
                          Например: VlAd123@kait20.ru<br></span>';
             }
            else
                if(!preg_match('/^[0-9]{1,3}+$/',$_POST['age']))
            {
              echo '<span>Неправильно указал возраст<br>
                          Только цифры.<br></span>';
            }
            else
              {
                if($_POST['pwd'] == $_POST['pwd1'])//Совпадение паролей
                {
                  $pd = false;
                  $file = fopen("logins.txt", "r");
                  while(!feof($file))//Пока в файле
                  {
                    $line = fgets($file);
                    $arr = explode('|', $line);
                    if(@$arr[0] == $_POST['log']) $pd = true;
                  }
                  fclose($file);
                  if($pd == false)//Если логина не нашли
                  {
                    $str = $_POST['log'].'|'.$_POST['pwd'].'|'.$_POST['surname'].'|'.$_POST['name'].'|'.$_POST['midname'].'|'.$_POST['sex'].'|'.$_POST['email'].'|'.$_POST['age'].'|'
                    .$_POST['country'].'|'.$_POST['about'];
                    $file = file_put_contents('logins.txt', $str.PHP_EOL , FILE_APPEND | LOCK_EX);
                    header("Refresh: 3;  url=index.php");
                    echo '<span>Регистрация успешна!<br></span>';
                  }
                  else echo' <span>Логин уже занят.<br></span>';
              }
              else echo '<span>Пароли не совпадают.<br></span>';
            }
          }
            else if(isset($_POST['country'])) echo '<span>Введены не все данные.<br></span>';
          ?>

        <input class="knonka" type="submit" value="Регистрация"/>
        <input class="knonka" type="reset" value="Сброс"/>
        </form><br>

  </body>
</html>
