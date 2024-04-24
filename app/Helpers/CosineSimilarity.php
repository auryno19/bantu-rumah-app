<?php

namespace App\Helpers;

use Sastrawi\Stemmer\StemmerFactory;
use Sastrawi\Tokenizer\TokenizerFactory;

class CosineSimilarity
{
    private $stemmer;
    private $tokenizer;

    public function __construct()
    {
        $this->stemmer = StemmerFactory::createStemmer();
        $this->tokenizer = TokenizerFactory::createTokenizer();
    }

    public function calculateSimilarity($query, $document)
    {
        // Preprocess the query and document
        $query = $this->preprocessText($query);
        $document = $this->preprocessText($document);

        // Tokenize the query and document
        $queryTokens = $this->tokenizer->tokenize($query);
        $documentTokens = $this->tokenizer->tokenize($document);

        // Stem the tokens
        $queryStems = array_map([$this->stemmer, 'stem'], $queryTokens);
        $documentStems = array_map([$this->stemmer, 'stem'], $documentTokens);

        // Calculate the dot product of the two vectors
        $dotProduct = 0;
        foreach ($queryStems as $stem) {
            if (in_array($stem, $documentStems)) {
                $dotProduct++;
            }
        }

        // Calculate the magnitudes of the two vectors
        $queryMagnitude = sqrt(count($queryStems));
        $documentMagnitude = sqrt(count($documentStems));

        // Calculate the cosine similarity
        $cosineSimilarity = $dotProduct / ($queryMagnitude * $documentMagnitude);

        return $cosineSimilarity;
    }

    private function preprocessText($text)
    {
        // Convert the text to lowercase
        $text = strtolower($text);

        // Remove punctuation and special characters
        $text = preg_replace("/[^\w\s]/", "", $text);

        // Remove stopwords
        $stopwords = [
            'yang', 'untuk', 'pada', 'ke', 'para', 'namun', 'menurut', 'antara', 'dia', 'dua',
            'ia', 'seperti', 'jika', 'jika', 'sehingga', 'kembali', 'dan', 'tidak', 'ini', 'karena',
            'kepada', 'oleh', 'saat', 'harus', 'sementara', 'setelah', 'belum', 'kami', 'sekitar',
            'bagi', 'serta', 'di', 'dari', 'telah', 'sebagai', 'masih', 'hal', 'ketika', 'adalah',
            'itu', 'dalam', 'bisa', 'bahwa', 'atau', 'hanya', 'kita', 'dengan', 'akan', 'juga',
            'ada', 'mereka', 'sudah', 'saya', 'terhadap', 'secara', 'agar', 'lain', 'anda',
            'begitu', 'mengapa', 'kenapa', 'yaitu', 'yakni', 'daripada', 'itulah', 'lagi', 'maka',
            'tentang', 'demi', 'dimana', 'kemana', 'pula', 'sambil', 'sebelum', 'sesudah', 'supaya',
            'guna', 'kah', 'pun', 'sampai', 'sedang', 'selagi', 'sementara', 'tetapi', 'apakah',
            'kecuali', 'sebab', 'selain', 'seolah', 'seraya', 'terus', 'tanpa', 'agak', 'boleh',
            'dapat', 'dsb', 'dst', 'dll', 'dahulu', 'dulunya', 'anu', 'demikian', 'tapi', 'ingin',
            'juga', 'nggak', 'mari', 'nanti', 'melainkan', 'oh', 'ok', 'seharusnya', 'sebetulnya',
            'setiap', 'setidaknya', 'sesuatu', 'pasti', 'saja', 'toh', 'ya', 'walau', 'tolong',
            'tentu', 'amat', 'apalagi', 'bagaimanapun','nih','aku', 'kok', 'di', 'dan', 'atau', 
            'tolong', 'kan', 'itu', 'sini', 'agar', 'ini', 'mati','nih','dong','ada','apa', 'adalah',
            'sudah','untuk', 'dengan', 'kurang', 'jadi','maka','kapan','dimana','siapa','akan','dengan','supaya','jadinya','deh','yang'
        ];
        $textWords = explode(" ", $text);
        $text = "";
        foreach ($textWords as $word) {
            if (!in_array($word, $stopwords)) {
                $text .= $word . " ";
            }
        }

        return $text;
    }
}