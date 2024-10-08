<header>
  <nav>
    <ul>
      <li><a href="index.php?route=posts" id="logo"><strong>Journal</strong></a></li>
    </ul>
    <ul>
      <li>
        <?php if (isset($_SESSION['user'])): ?>
          <details class="dropdown">
            <summary>
              <?= ucfirst($_SESSION['user']['username']) ?>
            </summary>
            <ul dir="rtl">
              <li><a href="index.php?route=dashboard">Dashboard</a></li>
              <li><a href="index.php?route=logout">Logout</a></li>
            </ul>
          </details>
        <?php else: ?>
          <button onclick="window.location = 'index.php?route=login'">LOG IN</button>
        <?php endif ?>
      </li>
    </ul>
  </nav>
  <hr>
</header>