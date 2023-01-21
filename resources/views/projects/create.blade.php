@extends('layouts.app')

@section('title', 'إنشاء مشروع جديد')


@section('content')

    <div class="row justify-content-center text-right">
        <div class="col-8">
            <div class="card p-5">
                <h3 class="text-center pb-5 font-weight-bold">
                    مشروع جديد
                </h3>

                <form action="/projects" method="post" dir="rtl">
                    @csrf
                    {{-- @include('projects.form' , ['project' => new App\Models\Project();]) you can pass the variable this way but i used compact in the project controller and passed it to the view it is passed automaticly to the include --}}
                    @include('projects.form')

                    <div class="form-group d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary">إنشاء</button>
                        <a href="/projects" class="btn btn-light">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
