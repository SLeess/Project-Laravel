@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" name="search" id="search" class="form-control" placeholder="Procurar" @if($search) value="{{ $search }} @endif">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{$search}}</h2>
    @else
        <h2>Próximos Eventos</h2>
        <p class='subtitle'>Veja os eventos dos próximos dias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($events as $event)
            <div class="card col-md-3">
                <img src="
                @if($event->image)
                    /img/events/{{ $event->image }}
                @else
                    /img/template-img-event.jpg
                @endif
                " alt="{{ $event->title }}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($event->date))}}</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-participants">X Participantes</p>
                    <a href="/events/{{ $event->id  }}" class="btn-primary btn">Saber mais</a>
                </div>
            </div>
        @endforeach
        @if(count($events) == 0 && !$search)
            <p>Não há eventos disponíveis</p>
        @elseif(count($events) == 0 && $search)
            <p>Não foi possível encontrar nenhum evento com "{{$search}}"! <a href="/">Ver todos</a></p>
        @endif
    </div>
</div>
@endsection
