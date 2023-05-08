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
                                <td @if (!$day['currentMonth']) class="text-muted fw-light" @endif>
                                    <span @if ($calendar->isCurrentDate($day['dayNumber'])) class="text-primary" @endif>
                                        {{ $day['dayNumber'] }}
                                    </span>
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