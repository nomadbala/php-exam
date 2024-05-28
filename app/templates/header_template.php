<header id="header">
    <a href="http://localhost:8080/itstep/exam/home">
        <svg class="main-logo">
            <use href="app/assets/icons.svg#main-logo" />
        </svg>
    </a>
    <menu class="header_nav">
        <li><a href="http://localhost:8080/itstep/exam/books">Books</a></li>
        <li><a href="http://localhost:8080/itstep/exam/authors">Authors</a></li>
        <li><a href="http://localhost:8080/itstep/exam/aboutus">About us</a></li>
    </menu>
    <menu class="header_menu">
        <menu class="header_menu-toggles">
            <!-- <button href=>
                <svg class="icon-24">
                    <use href="app/assets/icons.svg#magnifying-glass" />
                </svg>
            </button> -->
            <button>
                <svg class="icon-24">
                    <use href="app/assets/icons.svg#book" />
                </svg>
            </button>
        </menu>
        <?php if (!isset($_SESSION["currentUser"])): ?>
            <a class="header_menu-loginbtn" href="http://localhost:8080/itstep/exam/authorize">Register</a>
            <a class="header_menu-loginbtn" href="http://localhost:8080/itstep/exam/login">Login</a>
        <?php else: ?>
            <a href="http://localhost:8080/itstep/exam/profile" class="header_menu-loginbtn">
                <svg class="user-logo">
                    <use href=" app/assets/icons.svg#user-logo" />
                </svg>
            </a>
        <?php endif; ?>
    </menu>
</header>