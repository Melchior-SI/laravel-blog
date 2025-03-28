<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Main\IndexController as MainIndex;
use App\Http\Controllers\Admin\Main\IndexController as AdminIndex;

use App\Http\Controllers\Admin\Post\{
    IndexController as PostIndex,
    CreateController as PostCreate,
    StoreController as PostStore,
    ShowController as PostShow,
    EditController as PostEdit,
    UpdateController as PostUpdate,
    DeleteController as PostDelete
};

use App\Http\Controllers\Admin\Tag\{
    IndexController as TagIndex,
    CreateController as TagCreate,
    StoreController as TagStore,
    ShowController as TagShow,
    EditController as TagEdit,
    UpdateController as TagUpdate,
    DeleteController as TagDelete
};

use App\Http\Controllers\Admin\Category\{
    IndexController as CategoryIndex,
    CreateController as CategoryCreate,
    StoreController as CategoryStore,
    ShowController as CategoryShow,
    EditController as CategoryEdit,
    UpdateController as CategoryUpdate,
    DeleteController as CategoryDelete
};

use App\Http\Controllers\Admin\User\{
    IndexController as UserIndex,
    CreateController as UserCreate,
    StoreController as UserStore,
    ShowController as UserShow,
    EditController as UserEdit,
    UpdateController as UserUpdate,
    DeleteController as UserDelete
};


Route::group(["as" => "main."], function () {
    Route::get('/', MainIndex::class)->name('index');
});

Route::group(["as" => "admin.", "prefix" => "admin", "middleware" => ["auth", "admin", "verified"]], function () {
    Route::group(["as" => "main."], function () {
        Route::get('/', AdminIndex::class)->name('index');
    });

    Route::group(["as" => "post.", "prefix" => "posts"], function () {
        Route::get('/', PostIndex::class)->name('index');
        Route::get('/create', PostCreate::class)->name('create');
        Route::post('/', PostStore::class)->name('store');
        Route::get('/{post}', PostShow::class)->name('show');
        Route::get('/{post}/edit', PostEdit::class)->name('edit');
        Route::patch('/{post}', PostUpdate::class)->name('update');
        Route::delete('/{post}', PostDelete::class)->name('delete');
    });

    Route::group(["as" => "category.", "prefix" => "categories"], function () {
        Route::get('/', CategoryIndex::class)->name('index');
        Route::get('/create', CategoryCreate::class)->name('create');
        Route::post('/', CategoryStore::class)->name('store');
        Route::get('/{category}', CategoryShow::class)->name('show');
        Route::get('/{category}/edit', CategoryEdit::class)->name('edit');
        Route::patch('/{category}', CategoryUpdate::class)->name('update');
        Route::delete('/{category}', CategoryDelete::class)->name('delete');
    });

    Route::group(["as" => "tag.", "prefix" => "tags"], function () {
        Route::get('/', TagIndex::class)->name('index');
        Route::get('/create', TagCreate::class)->name('create');
        Route::post('/', TagStore::class)->name('store');
        Route::get('/{tag}', TagShow::class)->name('show');
        Route::get('/{tag}/edit', TagEdit::class)->name('edit');
        Route::patch('/{tag}', TagUpdate::class)->name('update');
        Route::delete('/{tag}', TagDelete::class)->name('delete');
    });

    Route::group(["as" => "user.", "prefix" => "users"], function () {
        Route::get('/', UserIndex::class)->name('index');
        Route::get('/create', UserCreate::class)->name('create');
        Route::post('/', UserStore::class)->name('store');
        Route::get('/{user}', UserShow::class)->name('show');
        Route::get('/{user}/edit', UserEdit::class)->name('edit');
        Route::patch('/{user}', UserUpdate::class)->name('update');
        Route::delete('/{user}', UserDelete::class)->name('delete');
    });
});

Auth::routes(["verify" => true]);

