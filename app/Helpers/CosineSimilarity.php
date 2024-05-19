<?php

namespace App\Helpers;

use Sastrawi\Stemmer\StemmerFactory;

class CosineSimilarity
{
    private $stemmer;

    public function __construct()
    {
        // Membuat instance dari Stemmer, bukan StemmerFactory
        $stemmerFactory = new StemmerFactory();
        $this->stemmer = $stemmerFactory->createStemmer();
    }

    public function calculateSimilarity($query, $document)
    {
        // dd($document);
        // Preprocess the query and document
        $query = $this->preprocessAndTokenize($query);
        $document = $this->preprocessAndTokenize($document);


        // Stem the tokens dengan menggunakan fungsi anonim
        $queryStems = array_map(function($word) {
            return $this->stemmer->stem($word);
        }, $query);
        $documentStems = array_map(function($word) {
            return $this->stemmer->stem($word);
        }, $document);

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
        $cosineSimilarity = 0;
        if ($queryMagnitude != 0 && $documentMagnitude != 0) {
            $cosineSimilarity = $dotProduct / ($queryMagnitude * $documentMagnitude);
        }

        return $cosineSimilarity;
    }

    private function preprocessAndTokenize($text)
    {
        // Mengubah teks menjadi huruf kecil
        $text = strtolower($text);

        // Menghilangkan tanda baca dan karakter khusus
        $text = preg_replace("/[^\w\s]/", "", $text);

        // Mendefinisikan stopwords
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
        // Memisahkan teks menjadi token berdasarkan spasi
        $tokens = preg_split("/[\s]+/", $text);

        // Menghilangkan stopwords dari token
        $filteredTokens = array_filter($tokens, function($token) use ($stopwords) {
            return !in_array($token, $stopwords);
        });

        return array_values($filteredTokens); // Mengembalikan token sebagai array numerik
    }

}
