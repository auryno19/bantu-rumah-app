<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\CosineSimilarity;
use App\Models\Asistant;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // dd($request);
        // $query = $request->input('query');
        // $documents = Asistant::all();

        // $cosineSimilarity = new CosineSimilarity();

        // $results = [];
        // foreach ($documents as $document) {
        //     $similarity = $cosineSimilarity->calculateSimilarity($query, $document->content);
        //     $results[] = [
        //         'document' => $document,
        //         'similarity' => $similarity,
        //     ];
        // }

        // // Sort the results by similarity in descending order
        // usort($results, function ($a, $b) {
        //     return $b['similarity'] <=> $a['similarity'];
        // });

        // dd($results);

        // return view('search.results', compact('results'));
        $query = $request->input('search');

        // Retrieve all asistants from the database
        $asistants = Asistant::all();

        $results = [];

        // Calculate the cosine similarity between the query and the description of each asistant
        foreach ($asistants as $asistant) {
            $similarity = (new CosineSimilarity())->calculateSimilarity($query, $asistant->description);

            // Add the asistant and similarity score to the results array
            $results[] = [
                'asistant' => $asistant,
                'similarity' => $similarity,
            ];
        }

        // Sort the results by similarity in descending order
        usort($results, function ($a, $b) {
            return $b['similarity'] <=> $a['similarity'];
        });

        dd($results);
        // Return the search results to the view
        return view('search.results', compact('results'));
    }
}
