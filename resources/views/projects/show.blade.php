@extends('layouts.app')


@section('content')
    <header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
        <div class="h6 text-dark">
            <a href="/projects">المشاريع / {{ $project->title }}</a>
        </div>

        <div>
            <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary px-4" role="button">تعديل المشروع</a>
        </div>
    </header>

    <section class="row text-right" dir="rtl">
        <div class="col-lg 4">
            {{-- project details --}}
            <div class="card text-right">
                <div class="card-body">
                    <div class="status">
                        @switch($project->status)
                            @case(1)
                                <span class="text-success">مكتمل</span>
                            @break

                            @case(2)
                                <span class="text-danger">ملغي</span>
                            @break

                            @default
                                <span class="text-warning">قيد التنفيذ</span>
                        @endswitch

                        <h5 class="font-wight-bold card-title">
                            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                        </h5>

                        <div class="card-text mt-4">
                            {{ $project->description }}
                        </div>

                        @include('projects.footer')
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="/projects/{{ $project->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="custom-select" onchange="this.form.submit()">
                            <option value="0" {{ $project->status == 0 ? 'selected' : '' }}>قيد الإنجاز</option>
                            <option value="1" {{ $project->status == 1 ? 'selected' : '' }}>مكتمل</option>
                            <option value="2" {{ $project->status == 2 ? 'selected' : '' }}>ملغي</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg 8">
            @foreach ($project->tasks as $task)
                <div class="card">
                    {{-- if the checkbox is checked make a line through muted make it gray --}}
                    <div class={{ $task->done ? 'checked muted' : '' }}>
                        {{ $task->body }}
                    </div>

                    <div>
                        <form action="/projects/{{ $project->id }}/tasks/{{ $task->id }}" method="post">
                            @method('PATCH')
                            @csrf
                            <input type="checkbox" name="done" class="form-control ml-4"
                                {{ $task->done ? 'checked' : '' }} onchange="this.form.submit()">
                            {{-- the checkbox return "on" if clicked else return nothing --}}
                        </form>

                    </div>
                </div>
            @endforeach
            <div class="card">
                <form action="/projects/{{ $project->id }}/tasks" method="POST">
                    @csrf
                    <input type="text" name="body" class="form-control p-2 ml-2" placeholder="أضف مهمة جديدة">
                    <button type="submit" class="btn btn-primary">إضافة</button>
                </form>
            </div>
        </div>
    </section>
@endsection
