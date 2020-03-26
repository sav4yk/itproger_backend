    <header class="masthead mb-auto">

        <div class="inner">

                <a href="/"><h3 class="masthead-brand">Сокращатель</h3></a>


            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="/">Главная</a>
                <a class="nav-link" href="/">Про нас</a>
                <a class="nav-link" href="/home/contact">Контакты</a>
                <?php if (isset($data['user']) && $data['user']!=''): ?>
                    <a class="nav-link" href="/user/dashboard">Личный кабинет</a>
                <?php else: ?>
                    <a class="nav-link" href="/user/auth">Войти</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
