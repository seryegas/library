<?php
    session_start();
    include '/OpenServer/domains/library/vendor/controllers/categories-loader.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css" /> 
  <link rel="stylesheet" href="/assets/css/pc.css" type="text/css" />
  <title>АИС библиотека</title>
</head>

<body>
  <header>
    <div class="logo">
      <a href="index.php"><h1>Электронная библиотека</h1></a>
    </div>

    <div class="sign_in">
      <?php
        $path = "profile";
        if ($_SESSION['user']['user_avatar'] == 1)
        {
          $path = $_SESSION['user']['user_id'];
        }
        if ($_SESSION['user'])
        {
          echo '
            <a href="user-profile.php"><button><p class="clip"><img src="/uploads/database/user-profile-photo/' . $path 
            . '.jpg" class="profile-icon">' . $_SESSION['user']['user_login'] . '</p></button></a>
          ';
        }
        else
        {
          echo '
          <a href="login.php"><button>Войти</button></a>
          ';
        }
      ?>
    </div>
  </header>

  <div class="main-content">
    <aside>
      <nav>
        <div>
          <?php
            foreach ($categories as $cat => $categoryNum)
            {
              echo '<a href="index.php?category_id=' . $categoryNum[0] . '"><div class="category">' . $categoryNum[1] . '</div></a>';
            }
          ?>
        </div>
      </nav>
    </aside>
    <section>
      <div class="col-md-8 products">
        <div class="row">
          <?php
            if ($booksToDisplay) 
            {
              for ($i = 0; $i < count($booksToDisplay); $i++)
              {
                echo '
                <div class="col-sm-4">
                  <div class="product">
                    <div class="product-img">
                      <a href="#"><img src="uploads/database/book-covers/' . $booksToDisplay[$i][0] . '.jpg" alt=""></a>
                    </div>
                    <p class="product-title">
                      <a href="book-page.php?book_id=' . $booksToDisplay[$i][0] . '">' . $booksToDisplay[$i][1] . '</a>
                    </p>
                    <p class="product-price">' . $booksToDisplay[$i][2] . '</p>
                  </div>
                </div>';
              }
            }
            else
            {
              echo '<p>По вашему запросу не найдено ни одной книги</p>';
            }
            ?>
        </div>
      </div>
    </section>
  </div>

  <footer></footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>