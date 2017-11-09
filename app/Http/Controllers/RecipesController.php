<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recipe;
use App\Ingredient;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RecipesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $noviRecept->creator_id = auth()->user()->id;
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
        $recipe = Recipe::find($id);
         if ($recipe->creator_id !== auth()->user()->id)
            return redirect()->action('RecipesController@index');
       
        return view('edit')->with('recipe', $recipe);
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
       // return "Spremanje promjena recepta ID: ";

        $data = $request->all();
        $recipe = Recipe::find($data['id']);

       

        foreach ($recipe->ingredients as $ingredient) 
        {
            $ingredient->delete();
        }

        $recipe->name = $data['name'];
        $recipe->description = $data['opis'];

        if ( $recipe->save() )
        {
            foreach ($data['ingredient'] as $key => $value)
            {
                $sastojak = new Ingredient;
                $sastojak->name = $value;
                $sastojak->recipe_id = $recipe->id;
                $sastojak->save();
            }
        }

        return redirect()->action('RecipesController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //brisanje
        Recipe::find($id)->delete();

        //vraćanje na početnu
        return redirect()->action('RecipesController@index');
        
    }

    public function viewsastojak()
    {
        return view('viewsastojci', array('ingredient' => Ingredient::get()) );
    }
}
