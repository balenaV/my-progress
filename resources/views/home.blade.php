@extends('layouts.app')

@section('title', 'My Progress — Sua biblioteca de conhecimento')

@section('content')
    <section class="mx-auto grid max-w-7xl gap-12 px-6 py-20 lg:grid-cols-2 lg:py-28">
        <div class="self-center">
            <span class="inline-flex rounded-full bg-primary-50 px-3 py-1 text-sm font-semibold text-primary-800">
                Seu conhecimento, no seu ritmo
            </span>

            <h1 class="mt-6 text-5xl font-semibold tracking-tight text-neutral-900">
                Transforme vídeos em conhecimento que continua com você.
            </h1>

            <p class="mt-6 max-w-xl text-lg leading-8 text-neutral-600">
                Organize cursos, acompanhe seus estudos e construa sua biblioteca
                pessoal de conhecimento.
            </p>

            <div class="mt-8">
                <a href="/admin"
                    class="inline-flex rounded-xl bg-primary-800 px-5 py-3 font-semibold text-white transition hover:bg-primary-900">
                    Organizar conteúdo
                </a>
            </div>
        </div>

        <div class="rounded-3xl bg-primary-50 p-8">
            <p class="text-sm font-semibold text-primary-600">
                Sua jornada
            </p>

            <h2 class="mt-3 text-2xl font-semibold">
                Aprenda, organize e evolua
            </h2>

            <div class="mt-8 space-y-4">
                <div class="rounded-2xl bg-white p-5">
                    <h3 class="font-semibold">Cursos organizados</h3>
                    <p class="mt-2 text-sm text-neutral-600">
                        Conteúdos divididos em módulos e aulas.
                    </p>
                </div>

                <div class="rounded-2xl bg-white p-5">
                    <h3 class="font-semibold">Progresso contínuo</h3>
                    <p class="mt-2 text-sm text-neutral-600">
                        Retome seus estudos de onde parou.
                    </p>
                </div>

                <div class="rounded-2xl bg-white p-5">
                    <h3 class="font-semibold">Conhecimento pesquisável</h3>
                    <p class="mt-2 text-sm text-neutral-600">
                        Base preparada para notas, busca e inteligência artificial.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
