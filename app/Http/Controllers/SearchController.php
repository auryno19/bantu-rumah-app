<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\CosineSimilarity;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $documents = // retrieve documents from database or storage

        $cosineSimilarity = new CosineSimilarity();

        $results = [];
        foreach ($documents as $document) {
            $similarity = $cosineSimilarity->calculateSimilarity($query, $document->content);
            $results[] = [
                'document' => $document,
                'similarity' => $similarity,
            ];
        }

        // Sort the results by similarity in descending order
        usort($results, function ($a, $b) {
            return $b['similarity'] <=> $a['similarity'];
        });

        return view('search.results', compact('results'));
    }
}
