{{ include('layouts\\header.php') }}

<div class="mb-3 d-flex justify-content-center btn-group">
    <a class="btn btn-primary" href="?c=user&a=user">Пользователь</a>
    <a class="btn btn-primary" href="?c=user&a=users">Пользовательи</a>
    <a class="btn btn-primary" href="?c=good&a=goods">Товары</a>
</div>
<div class="content row justify-content-around">{{ include('good.php') }}</div>

{{ include('layouts\\footer.php') }}

