<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Menu;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category = 'laravel', $title = 'test1')
    {

        $posts = Post::where([
            ['category', 'like', $category],
            ['title', 'like', $title]
        ])->first()->content;
        $posts = htmlspecialchars_decode($posts);

        return view('posts.posts', compact('posts'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create-post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->category = $request->category;
        $post->content = $request->content;
        $post->save();

        $menu = new Menu();
        $menu->title = $request->title;
        $menu->category = $request->category;
        $menu->save();


        return redirect("/post/$request->category/$request->title")->with('success', 'Пост успешно создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}





        // $menu = Menu::all();
        // вынести в функцию и проверить еще раз
        // и это нужно не тут сделать в чтобы в layout шло.
        // разве это нужно вынести не в модели?
        // $new_menu = [];
        // for ($i=0; $i < sizeof($menu); $i++) {
        //     if (!$i) {
        //         $new_menu[$i] = ['category' => $menu[$i]['category'], 'title' => [$menu[$i]['title']]];
        //     } else {
        //         $status = 0;
        //         for ($b=0; $b < sizeof($new_menu); $b++) {
        //             if ($new_menu[$b]['category'] == $menu[$i]['category']) {
        //                 $new_menu[$b]['title'][sizeof($new_menu)] = $menu[$i]['title'];
        //                 $status = 1;
        //                 break;
        //             }
        //         }
        //         if (!$status) {
        //             $new_menu[sizeof($new_menu)] = ['category' => $menu[$i]['category'], 'title' => [$menu[$i]['title']]];
        //         }
        //     }
        // }
