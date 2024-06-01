@extends('layouts.main')

@section('container')
    <div class="py-3">
        <small>
            <a href="/" class="text-decoration-none text-secondary">Home</a>
            /
            <a href="/learning-material" class="text-decoration-none text-secondary">Learning Material</a>
            /
            <a href="/learning-material/nouns" class="text-decoration-none text-secondary">Nouns</a>
        </small>
    </div>
    <div class="d-flex flex-column">
        <h1 class="pb-3">Nouns</h1>
        <article>
            Noun merupakan kata untuk menamai sesuatu seperti orang &#40;person&#41; , tempat &#40;place&#41; , benda &#40;thing&#41;, bahkan ide &#40;idea&#41;.<br>
            Contoh:
            <ul>
                <li>
                    Person &#40;Susan, singer, aunt, mother, grandfather&#41;.
                </li>
                <li>
                    Place &#40;city, Jakarta, restaurant&#41;.
                </li>
                <li>
                    Thing &#40;book, pencil, table&#41;.
                </li>
                <li>
                    Idea &#40;sadness, hapiness&#41;.
                </li>
            </ul>
        </article>
        <article>
            <strong class="fs-3">Common Noun and Proper Noun</strong>
            <div class="border-top border-3 border-dark-subtle pt-3">
                Common Noun merupakan kata umum dari suatu kategori.<br>
                Contoh: Girl, country, boy.<br>
                <br>
                Proper Noun merupakan kata yang lebih spesifik dibandingkan dengan Common Noun.<br>
                Contoh: Indonesia, Susan, John, Jakarta.
            </div>
            <br>
        </article>
        <article>
            <strong class="fs-3">Countable and Uncountable Noun</strong>
            <div class="border-top border-3 border-dark-subtle pt-3">
                Countable Noun merupakan kata benda yang bisa dihitung atau dikuantitaskan walaupun kemungkinan jumlahnya banyak.<br>
                Contoh:
                <ul>
                    <li>
                        Memiliki kata dengan berupa angka <em>one</em>, <em>two</em>, <em>three</em>, dan seterusnya.<br>
                        Contoh: one melon, two melons, three melons.
                    </li>
                    <li>
                        Memiliki kata awalan <em>a</em> &#40;untuk noun berawalan huruf konsonan&#41; atau <em>an</em> &#40;jika noun berawalan huruf vokal&#41;.<br>
                        Contoh: an avocado, an orange, a banana.
                    </li>
                    <li>
                        Bentuk plural &#40;jamak&#41; noun berakhiran <em>-s</em> dan <em>-es</em>.<br>
                        Contoh: table &#8594; tables, chair &#8594; chairs, box &#8594; boxes.
                    </li>
                </ul>
            </div>
            <div>
                Uncountable noun adalah sesuatu yang tidak bisa dihitung atau tidak memungkinkan untuk dihitung,meskipun jumlahnya banyak namun jenis noun ini akan selalu dianggap singular.<br>
                Contoh: Anger, happiness, sadness, dan seterusnya.
            </div>
        </article>
    </div>
@endsection