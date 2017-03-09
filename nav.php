        <?php if (isset($_COOKIE['sess_user'])): ?>
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link" href="postpage.php">write a post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">logout</a>
            </li>
          </ul>
        <?php else: ?>
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link" href="loginpage.php">login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registerpage.php">register</a>
            </li>
          </ul>
        <?php endif; ?>
