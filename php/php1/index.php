<!DOCTUPE html>
    <html>
        <head>
            <title>php1</title>
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
                <a href="#">Регистрация</a>
                </div>
				
            <?php $login = "name"; $pwd = "12345";
				if(!isset($_POST['pwd']))
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
				else if($_POST['username'] == $login && $_POST['pwd'] == $pwd)
				{
					echo 'Privet '.$login;
					echo '<a href="./index.php">Выход </a>';
				}
				else if($_POST['username'] != $login || $_POST['pwd'] != $pwd)
				{
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
			
				</div></form>
				
            </div>';
				}
				?>
		</div>
    </body>
</html>
