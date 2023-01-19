@extends('layouts.app')

@section('title', 'الملف الشخصي')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="text-center">
                    <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="" width="82px" height="82px">
                    <h3>{{ auth()->user()->name }}</h3>
                </div>
                <div class="card-body text-right">
                    <form action="/profile" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" name="name" id="name" class="form-control text-right"
                                value="{{ auth()->user()->name }}">

                            @error('name')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" name="email" id="email" class="form-control text-right"
                                value="{{ auth()->user()->email }}">

                            @error('email')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input type="password" name="password" id="password" class="form-control text-right">

                            @error('password')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirmation">تأكيد كلمة المرور</label>
                            <input type="password" name="password-confirmation" id="password-confirmation"
                                class="form-control text-right">

                            @error('password-confirmation')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">تغيير الصورة الشخصية</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label text-left" id="image-label" for="image"
                                    data-browse="استعرض"></label>
                            </div>
                            @error('image')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group d-flex mt-5">
                            <button type="submit" class="btn btn-primary mr-2">حفظ التعديلات</button>
                            <button type="submit" class="btn btn-light" form="logout">تسجيل الخروج</button>
                        </div>

                    </form>

                    <form action="/logout" method="post" id="logout">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- to make the image name appear in the felid when user upload it --}}
    <script>
        document.getElementById('image').onchange = uploadOnChange;

        function uploadOnChange() {
            var filename = this.value;
            var lastIndex = filename.lastIndexOf("\\");
            if (lastIndex >= 0) {
                filename = filename.substring(lastIndex + 1);
            }
            document.getElementById('image-label').innerHTML = filename;
        }
    </script>
@endsection
