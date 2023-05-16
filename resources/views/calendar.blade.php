@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.sidebar')
        <div class="container mt-4">
            <table class="table table-bordered mt-4">
                <thead>
                    @foreach ($calendar->getDayLabels() as $dayLabel)
                        <th>{{ $dayLabel }}</th>
                    @endforeach
                </thead>
                <tbody>
                    @foreach ($calendar->getWeeks() as $week)
                        <tr class="fw-medium">
                            @foreach ($week as $day)
                                <td @if ($calendar->isCurrentDate($day['dayNumber'])) class="tabla-current" @endif>
                                    @if (!$day['currentMonth'])
                                        <span class="text-muted">{{ $day['dayNumber'] }}</span>
                                    @else
                                    @php
                                        $url = url()->current();
                                        $url = explode('/', $url);

                                        $month = last($url);
                                    @endphp
                                    <a href="{{ route('day', ['month' => $month, 'day' => $day['dayNumber']]) }}">
                                        <button id="day-button" data-toggle="modal" data-target="#my-modal"
                                            @if ($calendar->isCurrentDate($day['dayNumber'])) class="btn btn-primary-current" 
                                                @else class="btn btn-outline-primary" 
                                            @endif
                                            >
                                            {{ $day['dayNumber'] }}
                                        </button>
                                    </a>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
