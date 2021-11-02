<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sreesubh | Admin</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap');
    *{
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
    header{
      padding: 10px 20px;
      display: flex;
      align-items: baseline;
      justify-content: space-between;
    }
    header nav{
      display: flex;
      justify-content: space-between;
      width: 50%;
    }
    header nav a{
      text-decoration: none;
      font-size: 1.2rem;
      font-family: 'Noto Sans', sans-serif;
      text-transform: capitalize;
      font-weight: 500;
      color: rgb(16, 24, 16);
    }
    .active{
        color: red;
    }
  </style>
</head>
<body>
  <header>
    <img src="./images/logo.png">
    <nav>
      <div class="menu"><a href="#" class="active">Employee Admin</a></div>
      <div class="menu"><a href="attandance.php">Attandance</a></div>
      <div class="menu"><a href="fule.php">fuel consumption</a></div>
      <div class="menu"><a href="#">Leave Notice</a></div>
    </nav>

  </header>
</body>
</html>