@extends('layouts.app')

@section('title', 'إنشاء مشروع جديد')


@section('content')

    <div class="row justify-content-center text-right">
        <div class="col-10">
            <h3 class="text-center pb-5 font-weight-bold">
                مشروع جديد
            </h3>

            <form action="/projects" method="post" dir="rtl">
                @csrf
                <div class="mb-3">
                    <label for="title">عنوان المشروع</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>

                <div class="mb-3">
                    <label for="description">وصف المشروع</label>
                    <textarea id="description" class="form-control" name="description"></textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">إنشاء</button>
                    <a href="/projects" class="btn btn-light">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
@endsection
