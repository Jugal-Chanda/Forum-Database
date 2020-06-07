<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', [
  'uses' => 'ForumController@index',
  'as' => 'forum'
]);

Route::get('discussion/{slug}/show',[
  'uses' => 'DiscussionController@show',
  'as' => 'discussion.show'
]);

Route::get('channel/{slug}/discussions',[
  'uses' => 'ForumController@channel',
  'as' => 'channel.discussions.show'
]);


Route::group(['middleware'=>'auth'],function(){

  Route::resource('channels','ChannelsController');

  Route::get('discussion/{id}/watch',[
    'uses' => 'WatcherController@watch',
    'as' => 'discussion.watch'
  ]);

  Route::get('discussion/{id}/unwatch',[
    'uses' => 'WatcherController@unwatch',
    'as' => 'discussion.unwatch'
  ]);

  Route::get('discussion/create',[
    'uses' => 'DiscussionController@create',
    'as' => 'discussion.create'
  ]);

  Route::post('discussion/store',[
    'uses' => 'DiscussionController@store',
    'as' => 'discussion.store'
  ]);

  Route::get('discussion/{slug}/edit',[
    'uses' => 'DiscussionController@edit',
    'as' => 'discussion.edit'
  ]);

  Route::post('discussion/{slug}/update',[
    'uses' => 'DiscussionController@update',
    'as' => 'discussion.update'
  ]);

  Route::post('discussion/{id}/reply',[
    'uses' => 'DiscussionController@reply',
    'as' => 'discussion.reply'
  ]);

  Route::get('reply/{id}/edit',[
    'uses' => 'ReplyController@edit',
    'as' => 'reply.edit'
  ]);

  Route::post('reply/{id}/update',[
    'uses' => 'ReplyController@update',
    'as' => 'reply.update'
  ]);

  Route::get('reply/{id}/like',[
    'uses' => 'ReplyController@like',
    'as' => 'reply.like'
  ]);

  Route::get('reply/{id}/unlike',[
    'uses' => 'ReplyController@unlike',
    'as' => 'reply.unlike'
  ]);

  Route::get('reply/{id}/best_answer',[
    'uses' => 'ReplyController@bestAnswer',
    'as' => 'reply.best_answer'
  ]);


});
