<!DOCTUPE html>
    <html>
        <head>
            <title>php2</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="style.css">
        </head>
		<body>
        <div class="glavnaya">
            <div class="levaya">
                <img src="pc_2.png" height="80px">
                <p>Добро пожаловать!</p>
            <p>Введите правильные имя<br> пользователя и пароль<br> для входа на сайт!</p>
                <br>
                <a href="index2.php">Регистрация</a>
                </div>
				
            <?php
				if(!isset($_POST['login']) && !isset($_POST['pass']))
				{
					echo '<div>
				<h2>Вход</h2>
                <form method="POST">
            <div class="registraciya">
                <div class="imya">
                    <b>Имя пользователя</b>
                <input id="username" maxlength="20" name="username">
                    </div>
                <div class="parol">
                    <b>Пароль</b><br>
                <input type="password" name="pwd">
                </div>
                <input class="button" type="submit" name="auth" value="Вход">
            </div></form>
			
            </div>';
			}
			else
			{
            $file = fopen("login.txt", "r");
            while(!feof($file))
            {
                $line = fgets($file);// Проверка логина, затем проверка пароля, после вывод каких-то данных. echo @$arr[1].'=='.$_POST['pwd'];
                $arr = explode('|', $line);
                if(@$arr[0] == $_POST['login'] && @$arr[1] == $_POST['pass'])
                {
                  echo '<p style="margin-left:380px; margin-top: 50px;font-size:25px;">Privet </p>';
                  echo '<a href="./index.php"><p style="margin-left:380px; margin-top: 150px;font-size:25px;">Выход</p> </a>';
                  break;
                }
                if(feof($file))
                {
                  echo '<p style="margin-left:300px;font-size:30px;color:red;">Вы ввели неправельные данные</p>';
                  echo '<div>
				<h2>Вход</h2>
                <form method="POST">
            <div class="registraciya">
                <div class="imya">
					<p>Вы ввели неправельные данные</p>
                    <b>Имя пользователя</b>
					<input id="username" maxlength="20" name="username">
                    </div>
					
					<div class="parol">
                    <b>Пароль</b><br>
                <input type="password" name="pwd">
					</div>
				
                <input class="but" type="submit" value="Вход">
                      <br><br>
        								</div>
        						</form>
        					</div>';
                  break;
                }
            }
            fclose($file);
        }

				?>
		</div>
    </body>
</html>
