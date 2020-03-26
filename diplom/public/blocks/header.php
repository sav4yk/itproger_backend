    <header class="masthead mb-auto">

        <div class="inner">

                <a href="/"><h3 class="masthead-brand">Сокращатель</h3></a>


            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link <?php if (!isset($data['page']) && $data['page']=='') echo 'active'; ?>" href="/">Главная</a>
                <a class="nav-link <?php if (isset($data['page']) && $data['page']=='about') echo 'active'; ?>" href="/home/about">О нас</a>
                <a class="nav-link <?php if (isset($data['page']) && $data['page']=='contact') echo 'active'; ?>" href="/home/contact">Контакты</a>
                <?php if (isset($_COOKIE['login'])): ?>
                    <a class="nav-link <?php if (isset($data['page']) && $data['page']=='dashboard') echo 'active'; ?>" href="/user/dashboard">Личный кабинет</a>
                <?php else: ?>
                    <a class="nav-link <?php if (isset($data['page']) && $data['page']=='auth') echo 'active'; ?>" href="/user/auth">Войти</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
