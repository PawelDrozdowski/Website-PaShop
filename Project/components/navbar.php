<header class="header">
    <nav class="first-nav">
      <ul class="first-nav-list">
        <li class="first-nav-item">
          <a href="#" class="first-nav-link">
            <i class="fas fa-search"></i>
            About Us
          </a>
        </li>
        <!-- Dropdown -->
        <li class="first-nav-item dropdown-li">
          <a href="products_gallery.php" class="first-nav-link">
            Products
          </a>
          <ul class="dropdown">
            <li class="dropdown-item">
              <a href="products_gallery.php" class="dropdown-link">
                Men
              </a>
            </li>

            <li class="dropdown-item">
              <a href="products_gallery.php" class="dropdown-link">
                Women
              </a>
            </li>
          </ul>
        </li>
        <!-- End of Dropdown -->
        <li class="first-nav-item">
          <a href="cart.php" class="first-nav-link">
            <i class="fas fa-shopping-cart"></i>
            <?php
              $pAmount = 0;
              if(isset($_SESSION['products'])){
                $pAmount = count($_SESSION['products']);
              }
              echo "(<span id='cart-navbar-items-count'>$pAmount</span>)"
            ?>
          </a>
        </li>
      </ul>
    </nav>

</header>