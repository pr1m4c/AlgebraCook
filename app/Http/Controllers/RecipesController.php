<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recipe;
use App\Ingredient;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', ['recipes' => Recipe::get()]);
    }


    public function add()
    {
        //return "Prikaz web obrazca za unos recepta";
        return view('add');
    }
	
	public function save (Request $request)
	{
		
        $data = $request->all();
        $noviRecept = new Recipe;
        $noviRecept->name = $data['name'];
        $noviRecept->creator_id = 1;
        $noviRecept->description = $data['opis'];

        if ($noviRecept->save())
        {
            foreach ($data['ingredient'] as $key => $value) 
            {
                $sastojak = new Ingredient;
                $sastojak->name = $value;
                $sastojak->recipe_id = $noviRecept->id;
                $sastojak->save();
            }
        }


        return redirect()->action('RecipesController@index');

	}


    public function store(Request $request)
    {
        // $request->nameInputa = vrijednostInputa
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        return view('view')->with('recipe', Recipe::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return "Promjena recepta s ID: " . $id; //Prikaz web obrasca
        return view('edit')->with('recipe', Recipe::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return "Spremanje promjena recepta ID: ";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return "Brisanje recepta iz baze ID: " . $id;
    }
}
