<?php



?>
<aside class="main-sidebar elevation-4 sidebar-light-primary">
    <a href="/admin/" class="brand-link">
        <span class="brand-text font-weight-light">Адмін панель</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="/admin/user" class="nav-link <?= Yii::$app->controller->id == 'user' ? 'active' : '' ?>">

                        <p>
                           Адміни
                        </p>
                    </a>
                    <a href="/admin/category" class="nav-link <?= Yii::$app->controller->id == 'category' ? 'active' : '' ?>">

                        <p>
                            Матеріали
                        </p>
                    </a>
                    <a href="/admin/employee" class="nav-link <?= Yii::$app->controller->id == 'employee' ? 'active' : '' ?>">

                        <p>
                           Працівники
                        </p>
                    </a>
                    <a href="/admin/weekend" class="nav-link <?= Yii::$app->controller->id == 'weekend' ? 'active' : '' ?>">

                        <p>
                            Відпустки
                        </p>
                    </a>
                    <a href="/admin/work" class="nav-link <?= Yii::$app->controller->id == 'work' ? 'active' : '' ?>">

                        <p>
                            Тип заробітку
                        </p>
                    </a>
                    <a href="/admin/zarplata" class="nav-link <?= Yii::$app->controller->id == 'zarplata' ? 'active' : '' ?>">

                        <p>
                           Заробітня платня
                        </p>
                    </a>

                </li>
            </ul>
        </nav>
    </div>
</aside>

