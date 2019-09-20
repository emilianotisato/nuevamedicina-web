<?php

Route::get('/', 'PagesController@home');

// Other pages
Route::get('articulos', 'PagesController@blog')->name('articles');
Route::get('articulos/{category}', 'PagesController@articleCategory')->name('articleCategory');
Route::get('articulos/{category}/{article}', 'PagesController@article')->name('article');
Route::get('suscripciones', 'PagesController@suscripciones');
Route::get('directorios', 'PagesController@directorios');
Route::get('contacto', 'PagesController@contacto');
Route::post('contacto', 'PagesController@sendContact');
Route::get('politica-de-privacidad', 'PagesController@privacidad');
Route::get('quienes-somos', 'PagesController@quienes');
Route::get('press', 'PagesController@press');
Route::get('gracias', 'PagesController@gracias');

// Search
Route::get('buscar', 'PagesController@search');

// Auth related
Route::get('dashboard', 'DashboardController@index');
Route::get('ingresar', 'Auth\LoginController@showLoginForm');
Route::post('ingresar', 'Auth\LoginController@login');
Route::get('salir', 'Auth\LoginController@logout');
Auth::routes();

// Sitemaps and SEO
Route::get('sitemap.xml', 'PagesController@index');
Route::get('sitemap_static.xml', 'PagesController@sitemap_static');
Route::get('sitemap_products.xml', 'PagesController@sitemap_products');
Route::get('sitemap_articles.xml', 'PagesController@sitemap_articles');
Route::feeds();

Route::group([

    'prefix' => 'admin',
    'middleware' => 'auth',

], function () {

    Route::get('', function () {

        return view('back.master');
    });

    Route::get('reportes', 'PagesController@report')->name('report');
    Route::get('abm-categorias', 'ProductController@abmCat')->name('abmCat');
    Route::post('abm-categorias', 'ProductController@storeCat');
    Route::post('abm-categorias/update', 'ProductController@updateCat');
    Route::post('abm-categorias/merge', 'ProductController@mergeCat');

    Route::group([

        'prefix' => 'usuario',
        'middleware' => ['permission:crudUsers'],

    ], function () {

        Route::get('', 'UserController@index')->name('userBack');
        Route::get('agregar', 'UserController@create')->name('addUser');
        Route::post('agregar', 'UserController@store');
        Route::get('{id}/editar', 'UserController@view')->name('editUser');
        Route::post('{id}/editar', 'UserController@edit');
        Route::post('{id}/borrar', 'UserController@destroy')->name('deleteUser');

    });

    Route::group([

        'prefix' => 'articulo',
        'middleware' => ['permission:crudArticles'],

    ], function () {

        Route::get('', 'ArticleController@index')->name('articleBack');
        Route::get('agregar', 'ArticleController@create')->name('addArticle');
        Route::post('agregar', 'ArticleController@store');
        Route::get('{id}/editar', 'ArticleController@view')->name('editArticle');
        Route::post('{id}/editar', 'ArticleController@edit');
        Route::post('{id}/borrar', 'ArticleController@destroy')->name('deleteArticle');

    });

    Route::group([

        'prefix' => 'revista',
        'middleware' => ['permission:crudArticles'],

    ], function () {

        Route::get('', 'MagazineController@index')->name('magazineBack');
        Route::get('agregar', 'MagazineController@create')->name('addMagazine');
        Route::post('agregar', 'MagazineController@store');
        Route::get('{id}/editar', 'MagazineController@view')->name('editMagazine');
        Route::post('{id}/editar', 'MagazineController@edit');
        Route::post('{id}/borrar', 'MagazineController@destroy')->name('deleteMagazine');

    });

    Route::group([

        'prefix' => 'slide',
        'middleware' => ['permission:crudSliders'],

    ], function () {

        Route::get('', 'SlideController@index')->name('slideBack');
        Route::get('agregar', 'SlideController@create')->name('addSlide');
        Route::post('agregar', 'SlideController@store');
        Route::get('{id}/editar', 'SlideController@view')->name('editSlide');
        Route::post('{id}/editar', 'SlideController@edit');
        Route::post('{id}/borrar', 'SlideController@destroy')->name('deleteSlide');

    });

    Route::group([

        'prefix'    =>  'images',

    ], function () {

        // Routes for handling images by ajax
        Route::get('{objectId}/all', 'ImageController@getImages');
        Route::post('{objectId}/add', 'ImageController@addImage');
        Route::get('{objectId}/update', 'ImageController@updateImage');
        Route::get('{objectId}/delete', 'ImageController@deleteImage');

    });

});