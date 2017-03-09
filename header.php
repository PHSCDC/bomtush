      <a class="navbar-brand" href="/bomtush">
        <h1>
          <?php
            $bomtush = array('b','o','m','t','u','s','h');
            foreach ($bomtush as $letter) {
              if (rand(1,50) == 1) {
                $letter = chr(ord($letter) + rand(-5,5));
              }
              echo $letter;
            }
          ?>
        </h1>
      </a>
