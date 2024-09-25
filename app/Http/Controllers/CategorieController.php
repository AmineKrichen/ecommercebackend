<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categorie=Categorie::all(); //ijib les données
            return response()->json($categorie); //iraja3 lil users
        } catch (\Exception $e) {
            return response()->json("probléme de recupération de la liste des catégories");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//post
    {
        try {
            $categorie=new categorie([
                "nomcategorie"=>$request->nomcategorie,
                "imagecategorie"=>$request->imagecategorie
            ]);
            $categorie->save();
            return response()->json($categorie);



        } catch (\Exception $e) {
            return response()->json("insertion impossible");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $categorie=categorie::findOrFail($id);
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json("probléme de récuperation des données");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $categorie=categorie::findOrFail($id);
            $categorie->update($request->all());
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json("probléme de modification");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $categorie=categorie::findOrFail($id);
            $categorie->delete();
            return response()->json("catégories supprimée avec succées");
          }  catch (\Exception $e) {
                return response()->json("probléme de suppression de catégorie");
            }
    }
}
