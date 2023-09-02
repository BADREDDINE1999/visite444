@extends('layouts.master')

@section('title', 'manage rapports')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
       <!-- <li class="breadcrumb-item active">Dashboard</li>  -->
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <section class="articles">
                <article>
                    <div class="article-wrapper">
                        <figure>
                            <img src="https://fastly.picsum.photos/id/3/5000/3333.jpg?hmac=GDjZ2uNWE3V59PkdDaOzTOuV3tPWWxJSf4fNcxu4S2g" alt="" />
                        </figure>
                        <div class="article-body">
                            <h2>L'espace des clients</h2>
                            <p>
                                ...
                            </p>
                            <a class="nav-link" href="{{url('admin/client')}}">
                                Liste des clients
                                <span class="sr-only">about clients</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            </section>
        </div>

        <div class="col-md-4">
            <section class="articles">
                <article>
                    <div class="article-wrapper">
                        <figure>
                            <img src="https://fastly.picsum.photos/id/60/1920/1200.jpg?hmac=fAMNjl4E_sG_WNUjdU39Kald5QAHQMh-_-TsIbbeDNI" alt="" />
                        </figure>
                        <div class="article-body">
                            <h2>L'espace des produits</h2>
                            <p>
                                ...
                            </p>
                            <a class="nav-link" href="{{url('admin/produit')}}">
                                Liste des produits
                                <span class="sr-only">about products</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            </section>
        </div>

        <div class="col-md-4">
            <section class="articles">
                <article>
                    <div class="article-wrapper">
                        <figure>
                            <img src="https://fastly.picsum.photos/id/180/2400/1600.jpg?hmac=Ig-CXcpNdmh51k3kXpNqNqcDYTwXCIaonYiBOnLXBb8" alt="" />
                        </figure>
                        <div class="article-body">
                            <h2>L'espace des rapports</h2>
                            <p>
                                ...
                            </p>
                            <a class="nav-link" href="{{url('admin/rapport')}}">
                                Liste des rapports
                                <span class="sr-only">about reports</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </div>
</div>
@endsection
