@extends("admin.layouts.main")
@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <a href="{{ route("admin.category.index") }}" class="col-1 btn-lg"><i class="fas fa-arrow-left"></i></a>
                        <h1 class="m-0 align-self-center">Редактирование категории</h1>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route("admin.main.index") }}">Главная</a></li>
                        <li class="breadcrumb-item active">Категории</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <form action="{{ route("admin.category.update", $category->id) }}" method="POST" class="w-25">
                        @csrf
                        @method("PATCH")
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Название категории"
                            value="{{ $category->title }}">
                            @error("title")
                                <div class="text-danger">Заполните поле, пожалуйста</div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
